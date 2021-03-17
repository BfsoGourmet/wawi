@extends('layouts.app')

@section('content')
    @include('partials.messages')

    <h1>Bestellungen</h1>

    {{ $deliveries->links() }}

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Vorname</th>
            <th scope="col">Nachname</th>
            <th scope="col">Zustellungsadresse</th>
            <th scope="col">PLZ</th>
            <th scope="col">Platz</th>
            <th scope="col">Land</th>
            <th scope="col">Kurier</th>
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
            </tr>
        @endforeach
        </tbody>
    </table>

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
