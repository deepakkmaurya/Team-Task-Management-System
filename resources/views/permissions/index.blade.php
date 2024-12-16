@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Permission Management</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('permissions.create') }}"> Create New Permission</a>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif
<table class="table table-bordered mt-4" >
 <tr>
   <th>No</th>
   <th>Name</th>
   <th>guard_name</th>
   <th width="280px">Action</th>
 </tr>
 @foreach ($data as $key => $user)
  <tr>
    <td>{{$loop->index +1 }}</td>
    <td>{{ $user->name }}</td>
    <td>{{ $user->guard_name }}</td>
    <td>
       <a class="btn btn-info" href="{{ route('permissions.show',$user->id) }}">Show</a>
       <a class="btn btn-primary" href="{{ route('permissions.edit',$user->id) }}">Edit</a>
       <form action="{{ route('permissions.destroy', $user->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
       </td>
  </tr>
 @endforeach
</table>
<div>
    {{$data->links()}} 
</div>
<p class="text-center text-primary"><small>Created by: Deepak Kumar Maurya</small></p>
@endsection