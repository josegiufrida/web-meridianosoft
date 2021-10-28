<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;

use App\Models\Client;
use App\Models\Price;
use App\Models\PriceList;
use App\Models\Product;
use App\Models\Supplier;

use App\Models\CollectionUpdate;
use Illuminate\Http\Request;

class UpdateController extends Controller
{

    private $company_id;
    private $invalid_file;
    private $collections = ['clientes' => 1, 'proveedores' => 2, 'articulos' => 3, 'precios' => 4, 'listas' => 5];


    public function update(Request $request){
        
        $this->company_id = $request->company_data->company_id;

        // Check TXTs
        if(!$this->allFilesValid($request)){
            return response()->json([
                'error' => 'invalid-file',
                'message' => "El archivo '$this->invalid_file' no es valido"
            ], 400);
        }


        foreach($this->collections as $collection_name => $collection_id){

            if($request->hasFile($collection_name)){
                $this->updateDatabase($request, $collection_name, $collection_id);
            }

        }

        return response()->json([
            'message' => 'success'
        ], 201);

    }



    // Check if there are any invalid TXT on Request
    private function allFilesValid($request){

        foreach($request->allFiles() as $file){

            if( $file->isValid() && $file->extension() === 'txt' && $file->getSize() > 0 ){
                return true;
            }

            $this->invalid_file = $file->getClientOriginalName();
            return false;

        }

    }



    // Update collection 
    private function updateDatabase($request, $collection_name, $collection_id){

        $upload = $request->file($collection_name);
        $file_path = $upload->getRealPath();
        $handle = fopen($file_path, 'r');
        
        $line_number = 0;

        // Array of columns names
        $columns_array = [];

        // Array to insert on database
        $insert_array = [];


        while(!feof($handle))
        {
            $line = trim(fgets($handle));

            if( $line === '' ){
                continue;
            }

            // Convert to UTF-8 (ñ)
            $line = mb_convert_encoding($line, 'UTF-8', 'UTF-8');
            
            if( $line_number === 0 ){
                $columns_array = explode(';', strtolower($line));
            } else {
                
                $line_array = explode(';', $line);

                // Replace &#59 (&#59 === ;)
                $line_array = str_replace('&#59', ';', $line_array);

                $data = array_combine($columns_array, $line_array);                

                switch ($collection_name){

                    case 'clientes' :
                        // Change money format (comma to dot)
                        $data['bonificacion'] = str_replace(',', '.', $data['bonificacion']);
                        $data['saldo_final'] = str_replace(',', '.', $data['saldo_final']);
                        $data['limite_credito'] = str_replace(',', '.', $data['limite_credito']) || null;
                        break;

                    case 'proveedores' :
                        // Change money format (comma to dot)
                        $data['saldo_final'] = str_replace(',', '.', $data['saldo_final']);
                        break;

                    case 'articulos' :
                        // Change money format (comma to dot)
                        $data['iva'] = str_replace(',', '.', $data['iva']);
                        $data['stock'] = str_replace(',', '.', $data['stock']);
                        break;

                    case 'precios' :
                        // Change money format (comma to dot)
                        $data['precio'] = str_replace(',', '.', $data['precio']);
                        break;

                }

                // Add Company ID
                $data['company_id'] = $this->company_id;

                array_push($insert_array, $data);

            }

            $line_number++;
        }
        

        switch ($collection_name){

            // Delete all old records from specific company_id
            // Insert new records for specific company_id

            case 'clientes' :
                Client::where('company_id', $this->company_id)->delete();
                Client::upsert($insert_array, []);  
                break;

            case 'proveedores' :
                Supplier::where('company_id', $this->company_id)->delete();
                Supplier::upsert($insert_array, []);
                break;

            case 'articulos' :
                Product::where('company_id', $this->company_id)->delete();
                Product::upsert($insert_array, []);
                break;

            case 'precios' :
                Price::where('company_id', $this->company_id)->delete();
                Price::upsert($insert_array, []);
                break;

            case 'listas' :
                PriceList::where('company_id', $this->company_id)->delete();
                PriceList::upsert($insert_array, []);
                break;

        }


        // Update collection updated_at timestamp
        $collection_update = CollectionUpdate::where('company_id', $this->company_id)
            ->where('collection_id', $collection_id)
            ->first();

        if($collection_update){
            $collection_update->updated_at = now();
            $collection_update->save();
        } else {
            // If record not exits
            CollectionUpdate::create([
                'company_id' => $this->company_id,
                'collection_id' => $collection_id,
                'updated_at' => now()
            ]);
        }
        

        fclose($handle);

        return;

    }

}
