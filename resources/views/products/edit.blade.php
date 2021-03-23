@extends('layouts.app')

@section('content')

    @include('partials.errors')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/products.css') }}" >

    <h1>{{__('Produkt bearbeiten:')}} {{$product->name}}</h1>
    <form action="{{route('products.update',['product'=>$product])}}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <div class="col-sm-4">
                <label for="name">{{__('Bezeichnung')}}*:</label>
                <input class="form-control" type="text" name="name" value="{{$product->name}}">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-4">
                <label for="short_desc">{{__('Kurzbeschreibung')}}*:</label>
                <textarea class="form-control" id="short_desc" name="short_desc" rows="1">{{$product->short_desc}}</textarea>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-4">
                <label for="long_desc">{{__('Beschreibung')}}*:</label>
                <textarea class="form-control" id="long_desc" name="long_desc" rows="3">{{$product->long_desc}}</textarea>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-4">
                <label for="declaration">{{__('Deklaration')}}*:</label>
                <textarea class="form-control" id="declaration" name="declaration" rows="3">{{$product->declaration}}</textarea>
            </div>
        </div>
        <div class="break"></div>
        <div class="form-group">
            <div class="col-sm-4">
                <label for="calories">{{__('Kalorien')}}*:</label>
                <input class="form-control" type="text" name="calories" id="calories" value="{{$product->calories}}">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-4">
                <label for="sugar">{{__('Zucker')}}*:</label>
                <input class="form-control" type="text" name="sugar" id="sugar" value="{{$product->sugar}}">
            </div>
        </div>
        <div class="break"></div>
        <div class="form-group">
            <div class="col-sm-4">
                <label for="is_live">{{__('Produkt Aktiv')}}:</label>
                <input type="checkbox" id="is_live" name="is_live" {{$product->is_live ? "checked" : ""}} value="1">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-4">
                <label for="stock_count">{{__('Anzahl')}}*:</label>
                <input class="form-control" type="number" min="0" step="1" name="stock_count" id="stock_count" value="{{$product->stock_count}}">
            </div>
        </div>
        <div class="break"></div>
        <div class="form-group">
            <div class="col-sm-4">
                <label for="courier">{{__('Kurier')}}*:</label>
                <select class="form-control" name="courier" id="courier">
                    @foreach($couriers as $courier)
                        @if($product->courir_id != $courier->id)
                            <option value="{{$courier->id}}">{{$courier->firstname}} {{$courier->lastname}}</option>
                        @else
                            <option value="{{$courier->id}}" selected="selected">{{$courier->firstname}} {{$courier->lastname}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-4">
                <label for="producer_id">{{__('Produzent')}}*:</label>
                <select class="form-control" name="producer_id" id="producer_id">
                    @foreach($producers as $producer)
                        @if($product->producer_id != $producer->id)
                            <option value="{{$producer->id}}">{{$producer->contact_firstname}} {{$producer->contact_lastname}}</option>
                        @else
                            <option value="{{$producer->id}}" selected="selected">{{$producer->contact_firstname}} {{$producer->contact_lastname}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-4">
                <label for="category">{{__('Produktkategorie')}}*:</label>
                <select class="form-control" name="category" id="category">
                    @foreach($categories as $category)
                        @if($product->category_id != $category->id)
                            <option value="{{$category->id}}">{{$category->category}}</option>
                        @else
                            <option value="{{$category->id}}" selected="selected">{{$category->category}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
        <div class="break"></div>
        <div class="form-group">
            <div class="col-sm-4">
                <label for="price">{{__('Preis')}}*:</label>
                <input class="form-control" type="text" name="price" value="{{$product->price}}">
            </div>
        </div>
        <br>
        <div class="form-group">
            <div class="col-sm-4">
                <label for="price">{{__('Spezial Preis')}}:</label>
                <input class="form-control" type="text" name="special_price" value="{{$product->special_price}}">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-4">
                <label for="special_price_active">{{__('Spezial Preis Aktiv')}}:</label>
                <input type="checkbox" id="special_price_active" name="special_price_active" {{$product->special_price_active ? "checked" : ""}} value="1">
            </div>
        </div>
        <br>
        <div class="form-group">
            <div class="col-sm-4">
                <label for="category">{{__('Saison')}}:</label>
                <select class="form-control" name="season_id" id="season_id">
                    <option value="">---</option>
                    @foreach($seasons as $season)
                        @if($product->season_id != $season->id)
                            <option value="{{$season->id}}">{{$season->season}}</option>
                        @else
                            <option value="{{$season->id}}" selected="selected">{{$season->season}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-4">
                <label for="price">{{__('Saison Preis')}}:</label>
                <input class="form-control" type="text" name="season_price" value="{{$product->season_price}}">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-4 text-right">
                <input type="submit" id="submit" value="Speichern" class="btn btn-primary" value="{{__('form.save')}}">
            </div>
        </div>
    </form>
@stop
