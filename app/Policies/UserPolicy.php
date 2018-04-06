<?php

namespace App\Policies;

use App\User;
use App\Policy;
use App\Privilege;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\DB;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the index of products.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function index(User $user)
    {

        $policyId = DB::table('policies')->select('id')->where('policy' , 'indexUser')->first();
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

    /**
     * Determine whether the user can view the product.
     *
     * @param  \App\User  $user
     * @param  \App\Product  $product
     * @return mixed
     */
    public function view(User $user)
    {
        $policyId = DB::table('policies')->select('id')->where('policy' , 'readUser')->first();
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

    /**
     * Determine whether the user can create products.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {

        $policyId = DB::table('policies')->select('id')->where('policy' , 'createUser')->first();
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

    /**
     * Determine whether the user can update the product.
     *
     * @param  \App\User  $user
     * @param  \App\Product  $product
     * @return mixed
     */
    public function update(User $user)
    {
        $policyId = DB::table('policies')->select('id')->where('policy' , 'updateUser')->first();
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

    /**
     * Determine whether the user can delete the product.
     *
     * @param  \App\User  $user
     * @param  \App\Product  $product
     * @return mixed
     */
    public function delete(User $user)
    { 
        $policyId = DB::table('policies')->select('id')->where('policy' , 'deleteUser')->first();
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

