<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $roles = Role::all();
       return view('Backend.User.Role.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('Backend.User.Role.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|unique:roles,name',
            'display_name' => 'required',
            'description' => 'required'

        ]);
//        dd($request);


        $roles = new Role([
            'name' => $request->post('name'),
            'display_name' => $request->post('display_name'),
            'description' => $request->post('description')
        ]);

        $request->session()->flash('message', 'This is a message!');
        $request->session()->flash('alert-class', 'alert-success');
        $roles->save();
//        dd($roles);
        return redirect()->route('roles')->with('message', 'Role Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::find($id);
        return view('Backend.User.Role.edit', compact('role'));
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
        $request->validate([
            'name' => 'required|unique:roles,name,'.$id,
            'display_name' => 'required',
            'description' => 'required'

        ]);

        $role = Role::find($id);

            $role->name = $request->post('name');
            $role->display_name = $request->post('display_name');
            $role->description = $request->post('description');

        $request->session()->flash('message', 'This is a message!');
        $request->session()->flash('alert-class', 'alert-success');
        $role->save();

        return redirect()->route('roles')->with('message', 'Role Updated');
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
