@extends('layouts.app')

@section('content')

@include('partials.errors')
<h1>{{__('User bearbeiten:')}} {{$user->name}}</h1>
<form action="{{route('users.update',['user'=>$user])}}" method="POST">
  @csrf
  @method('PUT')
  <div class="form-group">
    <div class="col-sm-4">
      <label for="name">{{__('Name')}}:</label>
      <input class="form-control" type="text" name="name" value="{{$user->name}}">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-4">
      <label for="price">{{__('Email')}}:</label>
      <input class="form-control" type="text" name="email" value="{{$user->email}}">
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-4">
      <label for="price">{{__('Rolle')}}:</label>
      <select class="form-control" name="role" id="role">
        <option value="guest">Guest</option>
        <option value="secretary">Secretary</option>
        <option value="admin">Admin</option>
      </select>
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-4 text-right">
      <input type="submit" id="submit" value="Speichern" class="btn btn-primary" value="{{__('form.save')}}">
    </div>
  </div>
</form>
@stop
