<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FilterController extends Controller
{

    public $error;

    public function getError(){
        return $this->error;
    }



    public function validateSearch($filter, $search, $table){

        // Checkeo si el filtro corresponde a una columna
        if($this->validateFilter($table, $filter)){
            
            // Checkeo que la busqueda sea valida segun el filtro
            if($this->validateType($search, $filter)){
                return true;
            } else {
                return false;
            }

        } else {
            return false;
        }

    }


    public function validateFilter($table, $filter){

        $isValid = in_array($filter, $this->columns($table));
        
        if(!$isValid){
            $this->error = [
                'error' => 'invalid-query',
                'message' => "El filtro '$filter' no es valido",
            ];
        }

        return $isValid;

    }


    public function validateType($search, $filter){

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
            'saldo'        => '',
            'limite_credito' => '',
            'observacion'  => 'min:2|max:255',
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

        $tables = [ 'clients' ];

        return in_array($table, $tables);

    }



    public function columns($table){

        $columns = [
            
            'clients' => [
                'id_cliente', 'razon_social', 'domicilio', 'localidad', 'cp', 'provincia', 'telefono',
                'email', 'contacto', 'bonificacion', 'zona', 'vendedor', 'cuit', 'id_lista', 'lista', 'pago', 'saldo',
                'limite_credito', 'observacion'
            ]

        ];

        return $columns[$table];

    }



    public function defaultFilter($table){

        $default_filter = [
            
            'clients' => 'razon_social'

        ];

        return $default_filter[$table];

    }




    public function names($id){

        $names = [
            'id_cliente' => 'Codigo',
            'razon_social' => 'Razon Social',
            'domicilio' => 'Domicilio',
            'localidad' => 'Localidad',
            'cp' => 'CP',
            'provincia' => 'Provincia',
            'telefono' => 'Telefono',
            'email' => 'Email',
            'contacto' => 'Contacto',
            'bonificacion' => 'Bonificacion',
            'zona' => 'Zona',
            'vendedor' => 'Vendedor',
            'cuit' => 'CUIT',
            'id_lista' => 'Cod. Lista',
            'lista' => 'Lista',
            'pago' => 'Pago',
            'saldo' => 'Saldo',
            'limite_credito' => 'Limite credito',
            'observacion' => 'Observacion',
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
