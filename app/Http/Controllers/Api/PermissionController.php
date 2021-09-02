<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Permission;

class PermissionController extends Controller
{
    public function getPermissions($user_id)
    {
        if($user_id){
            $permissions = Permission::where('user_id', $user_id)->get()->toArray();
            
            $result = [];
            
            foreach ($permissions[0] as $key => $value)
            {
                if($key!='user_id' && $value){
                    array_push($result, $key);
                }
            }

            return $result;
        } else {
            return [];
        }
    }
}
