<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Price;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
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

            $filter = $request->filled('filter') ? $request->filter : $filter_controller->defaultFilter('articulos');


            // Validate params
            if(!$filter_controller->validateSearch($filter, $request->search, 'articulos')){
                return response()->json($filter_controller->getError(), 400);
            }


            // Query database
            if($filter === 'id_articulo'){

                return Product::select(['id_articulo', 'descripcion'])
                        ->where('id_articulo', intval($request->search))
                        ->where('company_id', $this->company_id)
                        ->paginate(20)
                        ->withQueryString();

            } else if($filter === 'descripcion'){

                return Product::select(['id_articulo', 'descripcion'])
                        ->where('descripcion', 'LIKE', "%$request->search%")
                        ->where('company_id', $this->company_id)
                        ->paginate(20)
                        ->withQueryString();

            } else {

                return Product::select(['id_articulo', 'descripcion', $filter])
                    ->where($filter, 'LIKE', "%$request->search%")
                    ->where('company_id', $this->company_id)
                    ->paginate(20)
                    ->withQueryString();

            }

        } else {

            // Return all records (paginated)
            return Product::select(['id_articulo', 'descripcion'])
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
    public function show($id_articulo, Request $request, FilterController $filter_controller)
    {

        $this->company_id = $request->user()->company_id;

        // Validate params
        if(!$filter_controller->validateSearch('id_articulo', $id_articulo, 'articulos')){
            return response()->json($filter_controller->getError(), 400);
        }
        
        
        $result = Product::where('id_articulo', $id_articulo)
            ->where('company_id', $this->company_id)
            ->first();


        if(!$result){
            return response()->json([
                'error' => 'not-found',
                'message' => 'El registro no existe'
            ], 404);
        }


        $prices = Price::select(['precios.id_lista', 'precio', 'listas.lista', 'listas.incluye_iva'])
            ->join('listas', 'precios.id_lista', '=', 'listas.id_lista')
            ->where('precios.id_articulo', $id_articulo)
            ->where('precios.company_id', $this->company_id)
            ->where('listas.company_id', $this->company_id)
            ->get();
            
        $result['precio'] = $prices;


        return $result;
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
