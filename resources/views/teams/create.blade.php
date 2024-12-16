@extends('layouts.app')

@section('content')
    <h1>Create Team</h1>

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('teams.index') }}"> Back</a>
            </div>
        </div>
    </div>
    <form action="{{ route('teams.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Team Name</label>
            <input type="text" id="name" name="name" class="form-control" value="{{old('name')}}">
        </div>
        <span class="text-danger">
            @if($errors->has('name'))
            <span class="text-danger">{{$errors->first('name')}}</span>
            @endif
        </span>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea id="description" name="description" class="form-control">{{old('description')}}</textarea>
        </div>
        <button type="submit" class="btn btn-success">Create</button>
    </form>
@endsection
