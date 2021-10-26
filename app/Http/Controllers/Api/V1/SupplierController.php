<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
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

            $filter = $request->filled('filter') ? $request->filter : $filter_controller->defaultFilter('proveedores');


            // Validate params
            if(!$filter_controller->validateSearch($filter, $request->search, 'proveedores')){
                return response()->json($filter_controller->getError(), 400);
            }


            // Query database
            if($filter === 'id_proveedor'){

                return Supplier::select(['id_proveedor', 'razon_social'])
                        ->where('id_proveedor', intval($request->search))
                        ->where('company_id', $this->company_id)
                        ->paginate(20);

            } else if($filter === 'razon_social'){

                return Supplier::select(['id_proveedor', 'razon_social'])
                        ->where('razon_social', 'LIKE', "%$request->search%")
                        ->where('company_id', $this->company_id)
                        ->paginate(20);

            } else {

                return Supplier::select(['id_proveedor', 'razon_social', $filter])
                    ->where($filter, 'LIKE', "%$request->search%")
                    ->where('company_id', $this->company_id)
                    ->paginate(20);

            }

        } else {

            // Return all records (paginated)
            return Supplier::select(['id_proveedor', 'razon_social'])
                ->where('company_id', $this->company_id)
                ->paginate(20);

        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_proveerdor, Request $request, FilterController $filter_controller)
    {

        $this->company_id = $request->user()->company_id;

        // Validate params
        if(!$filter_controller->validateSearch('id_proveerdor', $id_proveerdor, 'proveedores')){
            return response()->json($filter_controller->getError(), 400);
        }
        
        $result = Supplier::where('id_proveerdor', $id_proveerdor)
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
