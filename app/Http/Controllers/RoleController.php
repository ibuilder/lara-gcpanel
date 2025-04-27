php
<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {        
        $roles = Role::all();
        return view('settings.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {        
        return view('settings.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {        
        $request->validate([
            'name' => 'required|unique:roles|max:255',
            'description' => 'required',
        ]);

        Role::create($request->all());

        return redirect()->route('settings.roles.index')
                         ->with('success','Role created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {        
        return view('settings.roles.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {        
        $request->validate([
            'name' => 'required|unique:roles,name,'.$role->id.'|max:255',
            'description' => 'required',
        ]);

        $role->update($request->all());

        return redirect()->route('settings.roles.index')
                         ->with('success','Role updated successfully.');
    }

  
}
