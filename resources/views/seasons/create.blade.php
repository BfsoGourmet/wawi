@extends('layouts.app')

@section('content')

    @include('partials.errors')

    <h1>Season erstellen</h1>
    <form action="{{route('seasons.store')}}" method="POST">
        @csrf
        <div class="form-group">
            <div class="col-sm-4">
                <label for="name">{{__('Bezeichnung')}}:</label>
                <input class="form-control" type="text" name="name" id="name" value="{{ old('name') }}">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-4">
                <label for="price">{{__('Preis')}}:</label>
                <input class="form-control" type="text" name="price" id="price" value="{{ old('price') }}">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-4">
                <label for="price">{{__('Datum von')}}:</label>
                <input class="form-control" type="date" name="date_from" id="date_from" value="{{ old('date_from') }}">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-4">
                <label for="price">{{__('Datum bis')}}:</label>
                <input class="form-control" type="date" name="date_to" id="date_to" value="{{ old('date_to') }}">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-4 text-right">
                <input type="submit" id="submit" value="Speichern" class="btn btn-primary">
            </div>
        </div>
    </form>
@stop
