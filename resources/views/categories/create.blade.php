@extends('layouts.app')

@section('content')

    @include('partials.errors')

    <h1>{{__('form.create-a-new')}} {{__('category.category')}}</h1>
    <form action="{{route('categories.store')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">{{__('category.category')}}:</label>
<<<<<<< HEAD
            <input class="form-control" type="text" name="name" id="name" value="{{ old('category') }}">
=======
            <input class="form-control" type="text" name="category" id="category" value="{{ old('category') }}">
>>>>>>> 8c51cd83ec93b475cb28e81465400e52b1e05fe6
        </div>
        <input type="submit" id="submit" class="btn btn-primary">
    </form>
@stop
