@extends('views.layouts.app')

@section('content')
    @include('views.partials.messages')

    <h1>Bestellungen</h1>

    {{ $deliveries->links() }}

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Kunde Vorname</th>
            <th scope="col">Kunde Nachname</th>
            <th scope="col">Zustellungsadresse</th>
            <th scope="col">PLZ</th>
            <th scope="col">Platz</th>
            <th scope="col">Land</th>
            <th scope="col">Kurier</th>
            <th scope="col">&nbsp;</th>
        </tr>
        </thead>
        <tbody>

        @foreach($deliveries as $delivery)
            <tr>
                <th scope="row">
                    {{$delivery->id}}
                </th>
                <td>{{$delivery->customer_firstname}}</td>
                <td>{{$delivery->customer_lastname}}</td>
                <td>{{$delivery->delivery_address}}</td>
                <td>{{$delivery->delivery_zip}}</td>
                <td>{{$delivery->delivery_place}}</td>
                <td>{{$delivery->delivery_country}}</td>
                <td>{{$delivery->courier_id}}</td>
                <td>
                    <form method="POST" id="delete_product" action="{{route('deliveries.destroy',['delivery'=>$delivery])}}">
                        @csrf
                        {{ method_field('DELETE') }}

                        <a class="btn btn-sm btn-primary" href="{{route('deliveries.edit',['delivery'=>$delivery])}}">
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

    <a href="{{route('deliveries.create')}}" id="create-product-link">
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
                <h1>Delete Product</h1>
                <p>Are you sure you want to delete this product?</p>

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
    <style>
        * {box-sizing: border-box}

        /* Set a style for all buttons */

        /* Float cancel and delete buttons and add an equal width */
        .cancelbtn, .deletebtn {
            float: left;
            width: 40%;
            margin: 0px 5%;
        }

        /* Add padding and center-align text to the container */
        .container {
            padding: 16px;
            text-align: center;
        }

        /* The Modal (background) */
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            left: 0;
            top: 40px;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgba(0, 0, 0, 0.5);
            padding-top: 50px;
        }

        /* Modal Content/Box */
        .modal-content {
            background-color: #fefefe;
            margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
            border: 1px solid #888;
            width: 60%; /* Could be more or less, depending on screen size */
        }

        /* Style the horizontal ruler */
        hr {
            border: 1px solid #f1f1f1;
            margin-bottom: 25px;
        }

        /* The Modal Close Button (x) */
        .close {
            position: absolute;
            right: 35px;
            top: 15px;
            font-size: 40px;
            font-weight: bold;
            color: #f1f1f1;
        }

        .close:hover,
        .close:focus {
            color: #f44336;
            cursor: pointer;
        }

        /* Clear floats */
        .clearfix::after {
            content: "";
            clear: both;
            display: table;
        }

        /* Change styles for cancel button and delete button on extra small screens */
        @media screen and (max-width: 300px) {
            .cancelbtn, .deletebtn {
                width: 100%;
            }
        }
    </style>
@stop
