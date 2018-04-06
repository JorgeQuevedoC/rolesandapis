<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Privilege;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PrivilegesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 10;

        if($this->authorize('fullAccess', Privilege::class)){
            if (!empty($keyword)) {
                $privileges = Privilege::where('privilege', 'LIKE', "%$keyword%")
                    ->orWhere('role_header', 'LIKE', "%$keyword%")
                    ->paginate($perPage);
            } else {
                $privileges = Privilege::paginate($perPage);
            }

            return view('admin.privileges.index', compact('privileges'));
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
        if($this->authorize('fullAccess', Privilege::class)){
            return view('admin.privileges.create');
        }else{
            return redirect('admin/privileges')->with('flash_message', 'Permission Denied!');
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
        if($this->authorize('fullAccess', Privilege::class)){
            
            $privilege = Privilege::findOrFail($request->id);
            $privilege->privilege = $request->privilege;
            $privilege->save();
            return redirect('admin/privileges')->with('flash_message', 'Privilege added!');
        }else{
            return redirect('admin/privileges')->with('flash_message', 'Permission Denied!');
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
        if($this->authorize('fullAccess', Privilege::class)){
            $privilege = Privilege::findOrFail($id);
            return view('admin.privileges.show', compact('privilege'));
        }else{
            return redirect('admin/privileges')->with('flash_message', 'Permission Denied!');
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
        if($this->authorize('fullAccess', Privilege::class)){
            $privilege = Privilege::findOrFail($id);
            return view('admin.privileges.edit', compact('privilege'));
        }else{
            return redirect('admin/privileges')->with('flash_message', 'Permission Denied!');
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
        if($this->authorize('fullAccess', Privilege::class)){
            $requestData = $request->all();        
            $privilege = Privilege::findOrFail($id);
            $privilege->update($requestData);
            return redirect('admin/privileges')->with('flash_message', 'Privilege updated!');
        }else{
            return redirect('admin/privileges')->with('flash_message', 'Permission Denied!');
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
        if($this->authorize('fullAccess', Privilege::class)){       
            $privilege = Privilege::findOrFail($id);
            $privilege->privilege = 'empty';
            $reset = DB::table('policies')->where($privilege->role_header, 1)->update([$privilege->role_header=>0]);
            $privilege->save();

            return redirect('admin/privileges')->with('flash_message', 'Privilege deleted!');
        }else{
            return redirect('admin/privileges')->with('flash_message', 'Permission Denied!');
        }         
    }
}
