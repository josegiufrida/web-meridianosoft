<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FilterController extends Controller
{

    private $error;

    public function getError(){
        return $this->error;
    }



    public function validateSearch($filter, $search, $table){

        // Check if filter exists
        if($this->validateFilter($table, $filter)){
            
            // Check if search value is valid (according to filter)
            if($this->validateType($search, $filter)){
                return true;
            } else {
                return false;
            }

        } else {
            return false;
        }

    }


    protected function validateFilter($table, $filter){

        $isValid = in_array($filter, $this->columns($table));
        
        if(!$isValid){
            $this->error = [
                'error' => 'invalid-query',
                'message' => "El filtro '$filter' no es valido",
            ];
        }

        return $isValid;

    }


    protected function validateType($search, $filter){

        $array = [
            $filter => $search
        ];

        $messages = [
            'numeric' => 'El valor debe ser numerico',
            'max' => 'El valor exede el rango maximo',
            'min' => 'La busqueda debe tener al menos 2 caracteres',
        ];

        $validator = Validator::make($array, [
            'id_cliente'   => 'numeric|max:1000000',
            'id_proveedor' => 'numeric|max:1000000',
            'id_articulo'  => 'numeric|max:1000000',

            'razon_social' => 'min:2|max:255',
            'domicilio'    => 'min:2|max:255',
            'localidad'    => 'min:2|max:255',
            'cp'           => 'numeric|max:30',
            'provincia'    => 'min:2|max:255',
            'telefono'     => 'min:2|max:255',
            'email'        => 'min:2|max:255',
            'contacto'     => 'min:2|max:255',
            'bonificacion' => 'min:2|max:255',
            'zona'         => 'min:2|max:255',
            'vendedor'     => 'min:2|max:255',
            'cuit'         => 'numeric|min:2|max:255',
            'id_lista'     => 'numeric',
            'lista'        => 'min:2|max:255',
            'pago'         => '',
            'saldo_final'  => '',
            'limite_credito' => '',
            'observacion'  => 'min:2|max:255',

            'descripcion'  => 'min:2|max:255',
            'id_grupo'     => 'numeric',
            'grupo'        => 'min:2|max:100',
            'id_subgrupo'  => 'numeric',
            'subgrupo'     => 'min:2|max:100',
            'iva'          => 'numeric',
            'codigo_barra' => 'max:50',
            'stock'        => 'numeric',

        ], $messages);

        if($validator->fails()){

            $this->error = [
                'error' => 'invalid-query',
                'message' => $validator->errors()->first(),
            ];

            return false;
            
        } else {
            return true;
        }

    }




    public function tables($table){

        $tables = [ 'clientes', 'proveedores', 'articulos' ];

        return in_array($table, $tables);

    }

    

    public function defaultFilter($table){

        $default_filter = [
            
            'clientes'    => 'razon_social',
            'proveedores' => 'razon_social',
            'articulos'   => 'descripcion'

        ];

        return $default_filter[$table];

    }




    protected function columns($table){

        $columns = [
            
            'clientes' => [
                'id_cliente', 'razon_social', 'domicilio', 'localidad', 'cp', 'provincia', 'telefono',
                'email', 'contacto', 'bonificacion', 'zona', 'vendedor', 'cuit', 'id_lista', 'lista', 'pago', 'saldo_final',
                'limite_credito', 'observacion'
            ],

            'proveedores' => [
                'id_proveedor', 'razon_social', 'domicilio', 'localidad', 'cp', 'provincia', 'telefono',
                'email', 'contacto', 'cuit', 'pago', 'saldo_final', 'observacion'
            ],

            'articulos' => [
                'id_articulo', 'descripcion', 'id_grupo', 'grupo', 'id_subgrupo', 'subgrupo', 'iva', 'codigo_barra', 'stock'
            ]

        ];

        return $columns[$table];

    }


    protected function names($id){

        $names = [

            'id_cliente'     => 'Codigo',
            'id_proveedor'   => 'Codigo',
            'id_articulo'    => 'Codigo',

            'razon_social'   => 'Razon Social',
            'domicilio'      => 'Domicilio',
            'localidad'      => 'Localidad',
            'cp'             => 'CP',
            'provincia'      => 'Provincia',
            'telefono'       => 'Telefono',
            'email'          => 'Email',
            'contacto'       => 'Contacto',
            'bonificacion'   => 'Bonificacion',
            'zona'           => 'Zona',
            'vendedor'       => 'Vendedor',
            'cuit'           => 'CUIT',
            'id_lista'       => 'Cod. Lista',
            'lista'          => 'Lista',
            'pago'           => 'Pago',
            'saldo_final'    => 'Saldo',
            'limite_credito' => 'Limite credito',
            'observacion'    => 'Observacion',

            'descripcion'    => 'Descripcion',
            'id_grupo'       => 'Cod. Grupo',
            'grupo'          => 'Grupo',
            'id_subgrupo'    => 'Cod. Subgrupo',
            'subgrupo'       => 'Subgrupo',
            'iva'            => 'IVA',
            'codigo_barra'   => 'Codigo de barra',
            'stock'          => 'Stock',
            
        ];

        return $names[$id];

    }


    public function getFilters($table){

        if($this->tables($table)){

            $response = [];

            foreach($this->columns($table) as $id){

                $array = [
                    'id' => $id,
                    'name' => $this->names($id)
                ];
	
                if($this->defaultFilter($table) === $id){
                    $array['default'] = true;
                }
	
                array_push($response, $array);

            }

            return response()->json($response);

        } else {

            return response()->json([
                'error' => 'not-found',
                'message' => 'La tabla no existe'
            ], 404);

        }
    }

}
