<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Policy;
use App\Privilege;
use Illuminate\Support\Facades\DB;

class FullAccessPolicy
{
    use HandlesAuthorization;

    public function fullAccess(User $user)
    {
        $policyId = DB::table('policies')->select('id')->where('policy' , 'fullAccess')->first();
        //dd($policyId);
        if ($policyId == null){
            $respuesta = true;
        }else{
            $roleNumber = DB::table('privileges')->select('role_header')->where('id' , $user->privilege_id)->first();
            //dd($roleNumber->role_header);
            $columnName = $roleNumber->role_header;
            $granted = DB::table('policies')->select($columnName." as column")->where('id',$policyId->id)->first();
            //dd($granted->column);
            $respuesta;

            if ($granted->column === 1){
                $respuesta = true;
            }else {
                $respuesta = false;
            }       
        }
        return $respuesta;
    }
}



