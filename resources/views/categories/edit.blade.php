@extends('layouts.app')

@section('content')

    @include('partials.errors')
    <h1>{{__('Kategorie bearbeiten:')}} {{$category->category}} </h1>
    <form action="{{route('categories.update',['category'=>$category])}}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <div class="col-sm-4">
                <label for="category">{{__('Kategorie')}}:</label>
                <input class="form-control" type="text" name="category" value="{{$category->category}}">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-4 text-right">
                <input type="submit" id="submit" value="Speichern" class="btn btn-primary" value="{{__('form.save')}}">
            </div>
        </div>
    </form>
@stop
