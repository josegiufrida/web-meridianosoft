<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\ClientResource;
use App\Models\Client;
use App\Models\Business;
use App\Models\Permission;
use Illuminate\Http\Request;


class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Verify permission
        if (!$request->user()->tokenCan('clientes')) {
            return response()->json([
                'message' => 'unauthorized'
            ], 401);
        }

        // Specific Query (paginated)
        if($request->filled('search')){

            if(strlen($request->search) >= 3)
            {
                return Client::select(['id_cliente', 'razon_social', 'domicilio', 'cuit'])
                    ->where('id_cliente', 'LIKE', "%$request->search%")
                    ->orWhere('razon_social', 'LIKE', "%$request->search%")
                    ->orWhere('domicilio', 'LIKE', "%$request->search%")
                    ->orWhere('cuit', 'LIKE', "%$request->search%")
                    ->paginate(20);

            } else {
                if(is_numeric($request->search))
                {
                    return Client::select(['id_cliente', 'razon_social'])
                        ->where('id_cliente', 'LIKE', "%$request->search%")
                        ->paginate(20);

                } else {
                    return response()->json([
                        'message' => 'search too short'
                    ], 400);    ##############################################################333
                }
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
        // Verify permission
        if (!$request->user()->tokenCan('clientes')) {
            return response()->json([
                'message' => 'unauthorized'
            ], 401);
        }

        // Truncate & Insert new data
        if ($request->hasFile('DB_clientes') && $request->file('DB_clientes')->isValid()) 
        {
            $upload = $request->file('DB_clientes');
            $file_path = $upload->getRealPath();
            $handle = fopen($file_path, 'r');
            
            $line_number = 0;
            $header_array = [];
            $insert_array = [];


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

                    array_push($insert_array, $data);
                }

                $line_number++;
            }


            // Truncate
            Client::truncate();

            // Insert
            Client::upsert($insert_array, ['id_cliente']);

            // Table update timestamp

            fclose($handle);

            return response()->json([
                'message' => 'success'
            ], 201);
            
        } else {
            return response()->json([
                'message' => 'file error'
            ], 401);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client, Request $request)
    {
        // Verify permission
        if (!$request->user()->tokenCan('clientes')) {
            return response()->json([
                'message' => 'unauthorized'
            ], 401);
        }

        return $client;
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
