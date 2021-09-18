<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\ClientResource;
use App\Models\Client;
use App\Models\Business;
use App\Models\Permission;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Else_;
use App\Http\Controllers\Api\V1\FilterController;
use App\Models\Collection;
use App\Models\CollectionUpdate;
use App\Models\Company;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, FilterController $filter_controller)
    {

        // Specific Query (paginated)
        if($request->filled('search')){

            $filter = $request->filled('filter') ? $request->filter : 'razon_social';


            // Validate params
            if(!$filter_controller->validateSearch($filter, $request->search, 'clients')){

                return response()->json([
                    'error' => 'invalid-query',
                    'message' => 'La busqueda no es valida',
                ], 400);

            }


            // Query database
            if($filter === 'id_cliente'){

                return Client::select(['id_cliente', 'razon_social'])
                        ->where('id_cliente', intval($request->search))
                        ->paginate(20);

            } else if($filter === 'razon_social'){

                return Client::select(['id_cliente', 'razon_social'])
                        ->where('razon_social', 'LIKE', "%$request->search%")
                        ->paginate(20);

            } else {

                return Client::select(['id_cliente', 'razon_social', $filter])
                    ->where($filter, 'LIKE', "%$request->search%")
                    ->paginate(20);

            }

        } else {

            // Return all records (paginated)
            return Client::select(['id_cliente', 'razon_social'])
                ->paginate(20);

        }
    }
    



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // Truncate & Insert new data
        if ($request->hasFile('file') && $request->file('file')->isValid()) 
        {
            $upload = $request->file('file');
            $file_path = $upload->getRealPath();
            $handle = fopen($file_path, 'r');
            
            $line_number = 0;
            $header_array = [];
            $insert_array = [];

            $company_id = $request->company_data->company_id;

            while(!feof($handle))
            {
                $line = trim(fgets($handle));

                if( $line === '' ){
                    continue;
                }
                
                if( $line_number === 0 ){
                    $header_array = explode(';', strtolower($line));
                } else {
                    
                    $line_array = explode(';', $line);
                    $data = array_combine($header_array, $line_array);

                    // Money
                    $data['bonificacion'] = str_replace(',', '.', $data['bonificacion']);
                    $data['saldo'] = str_replace(',', '.', $data['saldo']);
                    //$data['limite_credito'] = str_replace(',', '.', $data['limite_credito']);

                    // Company
                    $data['company_id'] = $company_id;

                    array_push($insert_array, $data);
                }

                $line_number++;
            }


            // Truncate
            Client::truncate();

            // Insert
            Client::upsert($insert_array, ['id_cliente']);

            // Update collection updated_at timestamp
            $collection_update = CollectionUpdate::where('company_id', $company_id)
                ->where('collection_id', 1)
                ->first();
            $collection_update->updated_at = now();
            $collection_update->save();


            fclose($handle);

            return response()->json([
                'message' => 'success'
            ], 201);
            
        } else {
            return response()->json([
                'error' => 'invalid-file',
                'message' => 'El archivo no fue enviado o no es valido'
            ], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show($id_cliente, Request $request, FilterController $filter_controller)
    {
        // Validate params
        if(!$filter_controller->validateSearch('id_cliente', $id_cliente, 'clients')){

            return response()->json([
                'error' => 'invalid-query',
                'message' => 'El ID ingresado es invalido',
            ], 400);

        }
        
        $result = Client::where('id_cliente', $id_cliente)->first();
        
        if($result){
            return $result;
        } else {
            return response()->json([
                'error' => 'not-found',
                'message' => 'El registro no existe'
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        //
    }
}
