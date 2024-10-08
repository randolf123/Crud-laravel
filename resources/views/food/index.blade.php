@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(Session::has('message'))
            <div class="alert alert-success">
                {{Session::get('message')}}
            </div>
            @endif
            <div class="card">
                <div class="card-header">All Foods 
                    <span class="">
                        <a href="{{route('food.create')}}">
                            <button class="btn btn-outline-primary">Add Food</button>
                        </a>
                    </span>
                </div>

                <div class="card-body">


                    <table class="table">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">Image</th>
                                <th scope="col">Name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Price</th>
                                <th scope="col">Category</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($foods)>0)
                            @foreach($foods as $key=>$food)
                            <tr>
                                <!--<th scope="row">{{$key+1}}</th>-->
                                <td><img src="{{asset('image')}}/{{$food->image}}" width="100" alt=""></td>
                                <td>{{$food->name}}</td>
                                <td>{{$food->description}}</td>
                                <td>{{$food->price}}</td>
                                <td>{{$food->category->name}}</td>
                                <td>
                                    <a href="{{route('food.edit', [$food->id])}}">
                                    <button class="btn btn-outline-success">Edit</button></a>
                                </td>
                                <td>
                                    <form action="{{ route('food.destroy', [$food->id]) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <td>Tidak ada kategori yang dapat ditampilkan.</td>
                            @endif
                        </tbody>
                    </table>
                    {{$foods->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
