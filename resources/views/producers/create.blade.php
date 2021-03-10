@extends('layouts.app')

@section('content')

    @include('partials.errors')

    <h1>Produzent erstellen</h1>
    <form action="{{route('producers.store')}}" method="POST">
        @csrf
        <div class="form-group">
            <div class="col-sm-4">
                <label for="company">Firma:</label>
                <input class="form-control" type="text" name="company" id="company">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-4">
                <label for="contact_firstname">Vorname:</label>
                <input class="form-control" type="text" name="contact_firstname" id="contact_firstname" value="{{ old('contact_firstname') }}">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-4">
                <label for="contact_lastname">{{__('Nachname')}}:</label>
                <input class="form-control" type="text" name="contact_lastname" id="contact_lastname" value="{{ old('contact_lastname') }}">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-4">
                <label for="contact_phone">{{__('Telefonnummer')}}:</label>
                <input class="form-control" type="text" name="contact_phone" id="contact_phone" value="{{ old('contact_phone') }}">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-4 text-right">
                <input type="submit" id="submit" value="Speichern" class="btn btn-primary">
            </div>
        </div>
    </form>
@stop
