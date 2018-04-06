<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\Privilege;
use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Password;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {

        $keyword = $request->get('search');
        $perPage = 10;

        if($this->authorize('index', User::class)){
             if (!empty($keyword)) {
                $users = User::where('name', 'LIKE', "%$keyword%")
                    ->orWhere('email', 'LIKE', "%$keyword%")
                    ->orWhere('privilege_id', 'LIKE', "%$keyword%")
                    ->orWhere('password', 'LIKE', "%$keyword%")
                    ->paginate($perPage);
            } else {
                $users = User::paginate($perPage);
            }

            return view('admin.users.index', compact('users'));
        }else{
            return redirect('home')->with('flash_message', 'Permission Denied!');
        }     
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {   
        if($this->authorize('create', User::class)){
            return view('admin.users.create');
        }else{
            return redirect('admin/users')->with('flash_message', 'Permission Denied!');
        }  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
			'name' => ['required', 'regex:/^[A-ZÀÂÇÉÈÊËÎÏÔÛÙÜŸÑÆŒa-zàâçéèêëîïôûùüÿñæœ ]+$/', 'max:255', 'string'],
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'privilege_id' => 'required'
        ]);
        
        if($this->authorize('create', User::class)){
            $users = new User;

            $users->name = $request->name;
            $users->privilege_id = $request->privilege_id;
            $users->email = $request->email;
            $users->password = Hash::make($request->password);
            $users->api_token = str_random(50);

            $users->save();

            return redirect('admin/users')->with('flash_message', 'User added!');
        }else{
            return redirect('admin/users')->with('flash_message', 'Permission Denied!');
        }  
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $user = User::findOrFail($id);

        if($this->authorize('view', User::class)){
            return view('admin.users.show', compact('user'));
        }else{
            return redirect('admin/users')->with('flash_message', 'Permission Denied!');
        }      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        if($this->authorize('update', User::class)){
            return view('admin.users.edit', compact('user'));
        }else{
            return redirect('admin/users')->with('flash_message', 'Permission Denied!');
        } 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => ['required', 'regex:/^[A-ZÀÂÇÉÈÊËÎÏÔÛÙÜŸÑÆŒa-zàâçéèêëîïôûùüÿñæœ ]+$/', 'max:255', 'string'],
            'email' => 'required|email',
            'password' => 'required',
            'privilege_id' => 'required',
            'api_token' => 'required'
        ]);
        
        $requestData = $request->all();       
        $user = User::findOrFail($id);
        
        if($this->authorize('update', User::class)){
            $user->update($requestData);
            return redirect('admin/users')->with('flash_message', 'User updated!');
        }else{
            return redirect('admin/users')->with('flash_message', 'Permission Denied!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        if($this->authorize('delete', User::class)){
            User::destroy($id);
            return redirect('admin/users')->with('flash_message', 'User deleted!');
        }else{
            return redirect('admin/users')->with('flash_message', 'Permission Denied!');
        }
    }

    public function sendEmail(Request $request)
    {
        
        if($this->authorize('delete', User::class)){
            $credentials = ['email' => $request->emailReset];
            $response = Password::sendResetLink($credentials, function (Message $message) {
                $message->subject($this->getEmailSubject());
            });

            switch ($response) {
                case Password::RESET_LINK_SENT:
                    Log::info("Reset password link sent ". json_encode($response) );
                    return redirect()->back()->with('status', trans($response));
                case Password::INVALID_USER:
                    return redirect()->back()->withErrors(['email' => trans($response)]);
            }
        }else{
            return redirect('admin/users')->with('flash_message', 'Permission Denied!');
        }
        
    }
}
