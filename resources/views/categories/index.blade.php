@extends('layouts.app')

@section('content')
    @include('partials.messages')

    <h1>{{__('category.categories')}}</h1>

    {{ $categories->links() }}

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">{{__('category.category')}}</th>
            <th scope="col">{{__('form.edit')}}</th>
            <th scope="col">{{__('form.destroy')}}</th>
        </tr>
        </thead>
        <tbody>

        @foreach($categories as $category)
            <tr>
                <th scope="row">
                    {{$category->id}}
                </th>
                <td>
                    <a href="{{route('categories.show',['category'=>$category])}}">
                        {{$category->category}}
                    </a>
                </td>
                <td>
                    <a href="{{route('categories.edit',['category'=>$category])}}">
                        <button class="btn btn-light"><i class="material-icons">create</i>{{__('form.edit')}}</button>
                    </a>
                </td>
                <td>
                    <form method="POST" action="{{route('categories.destroy',['category'=>$category])}}">
                        @csrf
                        {{ method_field('DELETE') }}
                        <div class="form-group">
                            <input type="submit" class="btn btn-light" value="{{__('form.destroy')}}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                            </svg>
                        </div>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <a href="{{route('categories.create')}}" id="create-category-link">
        <button class="btn btn-success"><i class="material-icons">add</i>{{__('form.create')}}</button>
    </a>
@stop
