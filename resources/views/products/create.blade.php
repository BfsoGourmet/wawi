@extends('layouts.app')

@section('content')

    @include('partials.errors')

    <h1>Produkt erstellen</h1>
    <form action="{{route('products.store')}}" method="POST">
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
                <label for="categories">{{__('Kurier')}}:</label>
                <select class="form-control" name="kurier" id="kurier">

                </select>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-4">
                <label for="categories">{{__('Produktkategorie')}}:</label>
                <select class="form-control" name="categories[]" id="categories" multiple>
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-4">
                <label for="exampleFormControlTextarea1">{{__('Beschreibung')}}:</label>
                <textarea class="form-control" id="beschreibung" rows="3"></textarea>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-4 text-right">
                <input type="submit" id="submit" value="Speichern" class="btn btn-primary">
            </div>
        </div>
    </form>
@stop
