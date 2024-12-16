@extends('layouts.app')
@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Permission</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
        </div>
    </div>
</div>

<form action="{{ route('permissions.store')}}" method="post">
    @csrf
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="{{old('name')}}">
            <input type="hidden" class="form-control" name="guard_name" id="guard_name" value="web">
        </div>
        <span>
            @error('name')
                <p class="text-red-500 font-medium">{{ $message }}</p>
            @enderror
        </span>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
</form>


@endsection