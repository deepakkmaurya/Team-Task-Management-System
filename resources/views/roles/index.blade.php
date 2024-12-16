@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Role Management</h2>
        </div>
        <div class="pull-right">
        @can('role-create')
            <a class="btn btn-success" href="{{ route('roles.create') }}"> Create New Role</a>
            @endcan
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif
<table class="table table-bordered mt-4">
  <tr>
     <th>No</th>
     <th>Name</th>
     <th>Permission</th>
     <th>Create Date</th>
     <th width="280px">Action</th>
  </tr>
    @foreach ($roles as $key => $role)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $role->name }}</td>
        <td>{{ $role->permissions->pluck('name')->implode(' , ') }}</td>
        <td>{{ \carbon\carbon::parse($role->created_at)->format('Y-m-d') }}</td>
        <td>
            <a class="btn btn-info" href="{{ route('roles.show',$role->id) }}">Show</a>
            {{-- @can('role-edit') --}}
                <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Edit</a>
            {{-- @endcan --}}
            {{-- @can('role-delete') --}}
            <form action="{{ route('roles.destroy', $role->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>

            {{-- @endcan --}}
        </td>
    </tr>
    @endforeach
</table>
{!! $roles->render() !!}

<p class="text-center text-primary"><small>Created by: Deepak Kumar Maurya</small></p>

@endsection
