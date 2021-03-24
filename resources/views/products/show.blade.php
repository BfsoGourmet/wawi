@extends('layouts.app')

@section('content')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/products.css') }}" >

    <h1>{{$product->name}}</h1>
    <table class="table table-sm">
        <thead>
        <tr>
            <th scope="col">{{__('catalog.property')}}</th>
            <th scope="col">{{__('catalog.value')}}</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>{{__('Kurzbeschreibung')}}</td>
            <td>{{$product->short_desc}}</td>
        </tr>
        <tr>
            <td>{{__('Beschreibung')}}</td>
            <td>{{$product->long_desc}}</td>
        </tr>
        <tr>
        <tr>
            <td>{{__('Deklaration')}}</td>
            <td>{{$product->declaration}}</td>
        </tr>
        <tr>
            <td>{{__('Kalorien')}}</td>
            <td>{{$product->calories}}</td>
        </tr>
        <tr>
            <td>{{__('Zucker')}}</td>
            <td>{{$product->sugar}}</td>
        </tr>
        <tr>
            <td>{{__('Produkt Aktiv')}}</td>
            <td>{{$product->is_live ? "Ja" : "Nein"}}</td>
        </tr>
        <tr>
            <td>{{__('Anzahl')}}</td>
            <td>{{$product->stock_count}} Stück</td>
        </tr>
        <tr>
            <td>{{__('Kurier')}}</td>
            <td>
                @foreach($couriers as $courier)
                    @if($product->courir_id == $courier->id)
                        {{$courier->firstname}} {{$courier->lastname}}
                    @endif
                @endforeach
            </td>
        </tr>
        <tr>
            <td>{{__('Produzent')}}</td>
            <td>
                @foreach($producers as $producer)
                    @if($product->producer_id == $producer->id)
                        {{$producer->company}} - {{$producer->contact_firstname}} {{$producer->contact_lastname}}
                    @endif
                @endforeach
            </td>
        </tr>
        <tr>
            <td>{{__('Produktkategorie')}}</td>
            <td>
                @foreach($categories as $category)
                    @if($product->category_id == $category->id)
                        {{$category->category}}
                    @endif
                @endforeach
            </td>
        </tr>
        <tr>
            <td>{{__('Preis')}}</td>
            <td>CHF {{$product->price}}</td>
        </tr>
        <tr>
            <td>{{__('Spezial Preis Aktiv')}}</td>
            <td>{{$product->special_price_active ? "Ja" : "Nein"}}</td>
        </tr>
        <tr>
            <td>{{__('Spezial Preis')}}</td>
            <td>CHF {{$product->special_price}}</td>
        </tr>
        <tr>
            <td>{{__('Saison')}}</td>
            <td>
                @foreach($seasons as $season)
                    @if($product->season_id == $season->id)
                        {{$season->season}}: {{date('d.m.Y', strtotime($season->date_from))}} - {{date('d.m.Y', strtotime($season->date_to))}}
                    @endif
                @endforeach
            </td>
        </tr>
        <tr>
            <td>{{__('Saison Preis')}}</td>
            <td>CHF {{$product->season_price}}</td>
        </tr>
        </tbody>
    </table>
    <br>
    <br>

    <div class="form-group">
        <a href="{{route('products.edit',['product'=>$product])}}">
            <button class="btn btn-primary">{{__('form.edit')}}</button>
        </a>
    </div>
@stop
