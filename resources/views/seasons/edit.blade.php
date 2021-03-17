@extends('layouts.app')

@section('content')

    @include('partials.errors')
    <h1>{{__('Season bearbeiten:')}} {{$season->name}}</h1>
    <form action="{{route('seasons.update',['season'=>$season])}}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <div class="col-sm-4">
                <label for="name">{{__('Bezeichnung')}}:</label>
                <input class="form-control" type="text" name="name" value="{{$season->season}}">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-4">
                <label for="price">{{__('Datum von')}}:</label>
                <input class="form-control" type="date" name="date_from" id="date_from" value="{{$season->date_from}}">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-4">
                <label for="price">{{__('Datum bis')}}:</label>
                <input class="form-control" type="date" name="date_to" id="date_to" value="{{$season->date_to}}">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-4 text-right">
                <input type="submit" id="submit" value="Speichern" class="btn btn-primary" value="{{__('form.save')}}">
            </div>
        </div>
    </form>
@stop
