<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserAPIController extends Controller
{
    /** Using the variable {user} in the API, is possible 
     * to use implicit route
     * model binding which makes easier the query for a 
     * specific product inside the controller
    */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        return User::all();
    }

    public function show(User $user)/** The argument is the ID*/ 
    {
        return $user;
    }

    public function store(Request $request)
    {
        //$user = User::create($req->all());
        

        $this->validate($request, [
			'name' => ['required', 'regex:/^[A-ZÀÂÇÉÈÊËÎÏÔÛÙÜŸÑÆŒa-zàâçéèêëîïôûùüÿñæœ ]+$/', 'max:255', 'string'],
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);
        
        $users = new User;

        $users->name = $request->name;
        $users->privilege_id = 22;
        $users->email = $request->email;
        $users->password = Hash::make($request->password);
        $users->api_token = str_random(50);

        $users->save();

        return response()->json($users, 201);
 
    }

    public function update(Request $req, User $user)
    {
        $user->update($req->all());
        // $user->name = $request->input('name');
        // $user -> save();
        return response()->json($user, 200);
    }

    public function delete(User $user)
    {
        $user->delete();

        $data = array(
            'message' => 'Deleted',
            'id' => $user->id
        );
        return response()->json($data,200);
    }
}
