@extends('layouts.app')

@section('content')

    @include('partials.errors')

    <h1>User erstellen</h1>
    <form action="{{route('users.store')}}" method="POST">
        @csrf
        <div class="form-group">
            <div class="col-sm-4">
                <label for="name">{{__('Name')}}:</label>
                <input class="form-control" type="text" name="name" id="name" value="{{ old('name') }}">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-4">
                <label for="email">{{__('E-Mail')}}:</label>
                <input class="form-control" type="text" name="email" id="email" value="{{ old('email') }}">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-4">
                <label for="password">{{__('Password')}}:</label>
                <input class="form-control" type="text" name="password" id="password" value="{{ old('password') }}">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-4">
                <label for="role">{{__('Rolle')}}:</label>
                <select class="form-control" type="text" name="role" id="role">
                    <option value="guest">Guest</option>
                    <option value="admin">Admin</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-4 text-right">
                <input type="submit" id="submit" value="Speichern" class="btn btn-primary">
            </div>
        </div>
    </form>
@stop
