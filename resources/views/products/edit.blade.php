@extends('layouts.app')

@section('content')

    @include('partials.errors')
    <h1>{{__('Produkt bearbeiten:')}} {{$product->name}}</h1>
    <form action="{{route('products.update',['product'=>$product])}}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <div class="col-sm-4">
                <label for="name">{{__('Bezeichnung')}}:</label>
                <input class="form-control" type="text" name="name" value="{{$product->name}}">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-4">
                <label for="price">{{__('Preis')}}:</label>
                <input class="form-control" type="text" name="price" value="{{$product->price}}">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-4">
                <label for="price">{{__('Saison Preis2')}}:</label>
                <input class="form-control" type="text" name="season_price" value="{{$product->season_price}}">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-4">
                <label for="category">{{__('Saison')}}:</label>
                <select class="form-control" name="season_id" id="season_id">
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
        <div class="form-group">
            <div class="col-sm-4">
                <label for="price">{{__('Kalorien')}}:</label>
                <input class="form-control" type="text" name="kalorien" id="kalorien" value="{{$product->calories}}">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-4">
                <label for="price">{{__('Zucker')}}:</label>
                <input class="form-control" type="text" name="zucker" id="zucker" value="{{$product->sugar}}">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-4">
                <label for="courier">{{__('Kurier')}}:</label>
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
                <label for="category">{{__('Produktkategorie')}}:</label>
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
        <div class="form-group">
            <div class="col-sm-4">
                <label for="producer_id">{{__('Produzent')}}:</label>
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
                <label for="declaration">{{__('Beschreibung')}}:</label>
                <textarea class="form-control" id="declaration" name="declaration" rows="3">{{$product->declaration}}</textarea>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-4 text-right">
                <input type="submit" id="submit" value="Speichern" class="btn btn-primary" value="{{__('form.save')}}">
            </div>
        </div>
    </form>
@stop
