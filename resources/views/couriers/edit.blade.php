@extends('layouts.app')

@section('content')

    @include('partials.errors')
    <h1>{{__('Kurier bearbeiten:')}} {{$courier->lastname}} {{$courier->firstname}}</h1>
    <form action="{{route('couriers.update',['courier'=>$courier])}}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <div class="col-sm-4">
                <label for="firstname">{{__('Vorname')}}:</label>
                <input class="form-control" type="text" name="firstname" value="{{$courier->firstname}}">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-4">
                <label for="lastname">{{__('Nachname')}}:</label>
                <input class="form-control" type="text" name="lastname" value="{{$courier->lastname}}">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-4">
                <label for="phone">{{__('Telefonnummer')}}:</label>
                <input class="form-control" type="text" name="phone" id="phone" value="{{$courier->phone}}">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-4 text-right">
                <input type="submit" id="submit" value="Speichern" class="btn btn-primary" value="{{__('form.save')}}">
            </div>
        </div>
    </form>
@stop
