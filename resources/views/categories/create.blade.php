@extends('layouts.app')

@section('content')

    @include('partials.errors')

    <h1>Neue Kategorie erstellen</h1>
    <form action="{{route('categories.store')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">{{__('Kategorie')}}:</label>
            <input class="form-control" type="text" name="category" id="category" value="{{ old('category') }}">
        </div>
        <input type="submit" id="submit" value="Speichern" class="btn btn-primary">
    </form>
@stop
