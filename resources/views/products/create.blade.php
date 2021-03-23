@extends('layouts.app')

@section('content')

    @include('partials.errors')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/products.css') }}" >

    <h1>Produkt erstellen</h1>
    <form action="{{route('products.store')}}" method="POST">
        @csrf
        <div class="form-group">
            <div class="col-sm-4">
                <label for="name">{{__('Bezeichnung')}}*:</label>
                <input class="form-control" type="text" name="name" id="name" value="{{ old('name') }}">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-4">
                <label for="short_desc">{{__('Kurzbeschreibung')}}*:</label>
                <textarea class="form-control" id="short_desc" name="short_desc" rows="1"></textarea>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-4">
                <label for="long_desc">{{__('Beschreibung')}}*:</label>
                <textarea class="form-control" id="long_desc" name="long_desc" rows="3"></textarea>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-4">
                <label for="declaration">{{__('Deklaration')}}*:</label>
                <textarea class="form-control" id="declaration" name="declaration" rows="3"></textarea>
            </div>
        </div>
        <div class="break"></div>
        <div class="form-group">
            <div class="col-sm-4">
                <label for="calories">{{__('Kalorien')}}*:</label>
                <input class="form-control" type="text" name="calories" id="calories" value="{{ old('kalorien') }}">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-4">
                <label for="sugar">{{__('Zucker')}}*:</label>
                <input class="form-control" type="text" name="sugar" id="sugar" value="{{ old('zucker') }}">
            </div>
        </div>
        <div class="break"></div>
        <div class="form-group">
            <div class="col-sm-4">
                <label for="is_live">{{__('Produkt Aktiv')}}:</label>
                <input type="checkbox" id="is_live" name="is_live" value="1">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-4">
                <label for="stock_count">{{__('Anzahl')}}*:</label>
                <input class="form-control" type="number" min="0" step="1" name="stock_count" id="stock_count" value="{{ old('stock_count') }}">
            </div>
        </div>
        <div class="break"></div>
        <div class="form-group">
            <div class="col-sm-4">
                <label for="courier">{{__('Kurier')}}*:</label>
                <select class="form-control" name="courier" id="courier">
                    @foreach($couriers as $courier)
                        <option value="{{$courier->id}}">{{$courier->firstname}} {{$courier->lastname}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-4">
                <label for="producer_id">{{__('Produzent')}}*:</label>
                <select class="form-control" name="producer_id" id="producer_id">
                    @foreach($producers as $producer)
                        <option value="{{$producer->id}}">{{$producer->contact_firstname}} {{$producer->contact_lastname}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-4">
                <label for="category">{{__('Produktkategorie')}}*:</label>
                <select class="form-control" name="category" id="category">
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->category}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="break"></div>
        <div class="form-group">
            <div class="col-sm-4">
                <label for="price">{{__('Preis')}}*:</label>
                <input class="form-control" type="text" name="price" id="price" value="{{ old('price') }}">
            </div>
        </div>
        <br>
        <div class="form-group">
            <div class="col-sm-4">
                <label for="price">{{__('Spezial Preis')}}:</label>
                <input class="form-control" type="text" name="special_price" id="special_price" value="{{ old('special_price') }}">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-4">
                <label for="special_price_active">{{__('Spezial Preis Aktiv')}}:</label>
                <input type="checkbox" id="special_price_active" name="special_price_active" value="1">
            </div>
        </div>
        <br>
        <div class="form-group">
            <div class="col-sm-4">
                <label for="season_id">{{__('Saison')}}:</label>
                <select class="form-control" name="season_id" id="season_id">
                    <option value="">---</option>
                    @foreach($seasons as $season)
                        <option value="{{$season->id}}">{{$season->season}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-4">
                <label for="price">{{__('Saison Preis')}}:</label>
                <input class="form-control" type="text" name="season_price" id="season_price" value="{{ old('season_price') }}">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-4 text-right">
                <input type="submit" id="submit" value="Speichern" class="btn btn-primary">
            </div>
        </div>
    </form>
@stop
