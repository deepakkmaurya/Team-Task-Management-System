@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Create New Role</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('roles.index') }}"> Back</a>
        </div>
    </div>
</div>

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif

<form action="{{route('roles.store')}}" method="post" >
    @csrf
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            <input type="text" name="name" id="name" class="form-control" placeholder="Name">
        </div>
    </div>
    <div class="row mt-2">
        @if ($permission->isNotEmpty())
            @foreach ($permission as $permission)
                <div class="mt-2 form-group col-2">
                    <input type="checkbox" class="rounded" name="permission[]" value={{ $permission->name }}>
                    <label for="">{{ $permission->name }}</label>
                </div>
            @endforeach
        @endif
      
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
</form>
<x-display-name></x-display-name>
@endsection
