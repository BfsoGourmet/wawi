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
                <label for="price">{{__('Kalorien')}}:</label>
                <input class="form-control" type="text" name="kalorien" id="kalorien" value="{{ old('kalorien') }}">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-4">
                <label for="price">{{__('Zucker')}}:</label>
                <input class="form-control" type="text" name="zucker" id="zucker" value="{{ old('zucker') }}">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-4">
                <label for="kurier">{{__('Kurier')}}:</label>
                <select class="form-control" name="kurier" id="kurier">

                </select>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-4">
                <label for="category">{{__('Produktkategorie')}}:</label>
                <select class="form-control" name="category" id="category">
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->category}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-4">
                <label for="exampleFormControlTextarea1">{{__('Beschreibung')}}:</label>
                <textarea class="form-control" id="beschreibung" name="beschreibung" rows="3"></textarea>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-4">
                <label for="exampleFormControlTextarea1">{{__('Spezial Preis')}}:</label>
                <input class="form-control" type="text" name="special_prices" id="special_prices" value="{{ old('price') }}">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-4">
                <label for="exampleFormControlTextarea1">{{__('Von')}}:</label>
                <input class="form-control" type="date" name="date_from" id="date_from" min="{{date('Y-m-d')}}">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-4">
                <label for="exampleFormControlTextarea1">{{__('Bis')}}:</label>
                <input class="form-control" type="date" name="date_to" id="date_to" min="{{date('Y-m-d')}}">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-4 text-right">
                <input type="submit" id="submit" value="Speichern" class="btn btn-primary">
            </div>
        </div>
    </form>
@stop
