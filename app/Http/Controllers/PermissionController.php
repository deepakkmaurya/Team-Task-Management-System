<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Validator;

class PermissionController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:user-list|user-create|user-edit|user-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:user-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:user-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:user-delete', ['only' => ['destroy']]);
    }

    
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Permission::latest()->simplePaginate(5);
        return view('permissions.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validetor = Validator::make($request->all(),[
            'name' => 'required|unique:permissions|min:3',
        ]);

        if($validetor->passes()){
            $permission = new Permission();
            $permission->name = $request->input('name');
            $permission->guard_name = 'web';
            $permission->save();
            return redirect()->route('permissions.index')->with('success','Permission created successfully');
        }else{
            return redirect()->back()->withErrors($validetor)->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
         $user = Permission::find($id);
        return view('permissions.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $user = permission::find($id);
        return view('permissions.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $this->validate($request, [
            'name' => 'required',            
        ]);
        $input = $request->all();
        $user = Permission::find($id);
        $user->update($input);
        return redirect()->route('permissions.index')

            ->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Permission::find($id)->delete();
        return redirect()->route('permissions.index')
            ->with('success', 'User deleted successfully');
    } 
}
