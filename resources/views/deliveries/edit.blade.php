@extends('views.layouts.app')

@section('content')

    @include('views.partials.errors')
    <h1>{{__('Produzent bearbeiten:')}} {{$producer->contact_lastname}} {{$producer->contact_firstname}}</h1>
    <form action="{{route('producers.update',['producer'=>$producer])}}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <div class="col-sm-4">
                <label for="company">{{__('Firma')}}:</label>
                <input class="form-control" type="text" name="company" value="{{$producer->company}}">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-4">
                <label for="contact_firstname">{{__('Vorname')}}:</label>
                <input class="form-control" type="text" name="contact_firstname" value="{{$producer->contact_firstname}}">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-4">
                <label for="contact_lastname">{{__('Nachname')}}:</label>
                <input class="form-control" type="text" name="contact_lastname" value="{{$producer->contact_lastname}}">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-4">
                <label for="contact_phone">{{__('Telefonnummer')}}:</label>
                <input class="form-control" type="text" name="contact_phone" id="contact_phone" value="{{$producer->contact_phone}}">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-4 text-right">
                <input type="submit" id="submit" value="Speichern" class="btn btn-primary" value="{{__('form.save')}}">
            </div>
        </div>
    </form>
@stop
