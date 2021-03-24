@extends('layouts.app')

@section('content')

    @include('partials.errors')

    <h1>Kurier erstellen</h1>
    <form action="{{route('couriers.store')}}" method="POST">
        @csrf
        <div class="form-group">
            <div class="col-sm-4">
             we   <label for="firstname">{{__('Vorname')}}:</label>
                <input class="form-control" type="text" name="firstname" id="firstname" value="{{ old('firstname') }}">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-4">
                <label for="lastname">{{__('Nachname')}}:</label>
                <input class="form-control" type="text" name="lastname" id="lastname" value="{{ old('lastname') }}">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-4">
                <label for="phone">{{__('Telefonnummer')}}:</label>
                <input class="form-control" type="text" name="phone" id="phone" value="{{ old('phone') }}">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-4 text-right">
                <input type="submit" id="submit" value="Speichern" class="btn btn-primary">
            </div>
        </div>
    </form>
@stop
