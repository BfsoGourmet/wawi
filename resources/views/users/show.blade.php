@extends('layouts.app')

@section('content')

    <h1>{{$user->name}}</h1>
    <table class="table table-sm">
        <thead>
        <tr>
            <th scope="col">{{__('Name')}}</th>
            <th scope="col">{{__('E-Mail')}}</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>{{__('user.role')}}</td>
            <td> {{$user->name}}</td>
        </tr>
        </tbody>
    </table>
    <br>
    <br>

    <div class="form-group">
        <a href="{{route('users.edit',['user'=>$user])}}">
            <button class="btn btn-light">{{__('form.edit')}}</button>
        </a>
    </div>

    <form method="POST" action="{{route('users.destroy',['user'=>$user])}}">
        @csrf
        {{ method_field('DELETE') }}

        <div class="form-group">
            <input type="submit" class="btn btn-light" value="{{__('form.destroy')}}">
        </div>
    </form>
@stop
