@extends('layouts.app')

@section('content')
    @include('partials.messages')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/season.css') }}" >

    <h1>{{__('season.seasons')}} Test</h1>

    {{ $seasons->links() }}

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">{{__('season.name')}}</th>
            <th scope="col">{{__('season.price')}}</th>
            <th scope="col">{{__('season.date_from')}}</th>
            <th scope="col">{{__('season.date_to')}}</th>
            <th scope="col">&nbsp;</th>
        </tr>
        </thead>
        <tbody>

        @foreach($seasons as $season)
            <tr>
                <th scope="row">
                    {{$season->id}}
                </th>
                <td>
                    <a href="{{route('seasons.show',['season'=>$season])}}">
                        {{$season->name}}
                    </a>
                </td>
                <td>
                    CHF {{$season->price}}
                </td>
                <td>KAT</td>
                <td>

                    <form method="POST" id="delete_product" action="{{route('seasons.destroy',['season'=>$season])}}">
                        @csrf
                        {{ method_field('DELETE') }}

                        <a class="btn btn-sm btn-primary" href="{{route('seasons.edit',['season'=>$season])}}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                            </svg>
                        </a>

                        <a class="btn btn-sm btn-danger"  onclick="document.getElementById('id01').style.display='block'">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                            </svg>
                        </a>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <a href="{{route('seasons.create')}}" id="create-product-link">
        <button class="btn btn-success">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
            </svg>
        </button>
    </a>

    <div id="id01" class="modal">
        <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
        <div class="modal-content">
            <div class="container">
                <h1>Delete Season</h1>
                <p>Are you sure you want to delete this season?</p>

                <div class="clearfix">
                    <button class="btn btn-secondary cancelbtn" onclick="document.getElementById('id01').style.display='none'">Cancel</button>
                    <button class="btn btn-danger deletebtn" onclick="document.getElementById('delete_product').submit();">Delete</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        // Get the modal
        var modal = document.getElementById('id01');

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
@stop
