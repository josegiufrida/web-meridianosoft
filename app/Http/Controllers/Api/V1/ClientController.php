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
use Throwable;

use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{

    private $company_id;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, FilterController $filter_controller)
    {

        $this->company_id = $request->user()->company_id;

        // Specific Query (paginated)
        if($request->filled('search')){

            $filter = $request->filled('filter') ? $request->filter : $filter_controller->defaultFilter('clientes');


            // Validate params
            if(!$filter_controller->validateSearch($filter, $request->search, 'clientes')){
                return response()->json($filter_controller->getError(), 400);
            }


            // Query database
            if($filter === 'id_cliente'){

                return Client::select(['id_cliente', 'razon_social'])
                        ->where('id_cliente', intval($request->search))
                        ->where('company_id', $this->company_id)
                        ->paginate(20)
                        ->withQueryString();

            } else if($filter === 'razon_social'){

                return Client::select(['id_cliente', 'razon_social'])
                        ->where('razon_social', 'LIKE', "%$request->search%")
                        ->where('company_id', $this->company_id)
                        ->paginate(20)
                        ->withQueryString();

            } else {

                return Client::select(['id_cliente', 'razon_social', $filter])
                    ->where($filter, 'LIKE', "%$request->search%")
                    ->where('company_id', $this->company_id)
                    ->paginate(20)
                    ->withQueryString();

            }

        } else {

            // Return all records (paginated)
            return Client::select(['id_cliente', 'razon_social'])
                ->where('company_id', $this->company_id)
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show($id_cliente, Request $request, FilterController $filter_controller)
    {

        $this->company_id = $request->user()->company_id;

        // Validate params
        if(!$filter_controller->validateSearch('id_cliente', $id_cliente, 'clientes')){
            return response()->json($filter_controller->getError(), 400);
        }
        
        $result = Client::where('id_cliente', $id_cliente)
            ->where('company_id', $this->company_id)
            ->first();
        

        if(!$result){
            $error = response()->json([
                'error' => 'not-found',
                'message' => 'El registro no existe'
            ], 404);
        }

        return $result ?? $error;
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
