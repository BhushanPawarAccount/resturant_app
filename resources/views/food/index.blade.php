@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (Session::has('message'))
                <div class="alert alert-success">{{Session::get('message')}}</div>
            @endif
            <div class="card">
                <div class="card-header">Food List</div>

                <div class="card-body">
                    <a class="btn btn-success" href="/food/create">Add Food</a>
                    <hr/>
                    @if (count($foods)>0)
                        
                   <table class="table ">
                        <thead class="thead-dark">
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Image</th>
                            <th scope="col">Name</th>
                            <th scope="col">Category</th>
                            <th scope="col">Price</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($foods as $key=>$food)
                            <tr>
                                <td scope="col">{{$key+1}}</td>
                                <td scope="col"><img src="{{asset('/images')}}/{{$food->image}}" width="100"></td>
                                <td scope="col">{{$food->name}}</td>
                                <td scope="col">{{$food->category->name}}</td>
                                <td scope="col">$ {{$food->price}}</td>
                                <td scope="col"><a href="{{route('food.edit',[$food->id])}}" class="btn btn-outline-success">Edit</a></td>
                                <td scope="col">
                                   <!--<button class="btn btn-outline-danger">Delete</button>-->
                                        <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#exampleModal{{$food->id}}">
                                            Delete
                                          </button>
                                          <!-- Modal -->
                                            <div class="modal fade" id="exampleModal{{$food->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form action="{{route('food.destroy',[$food->id])}}" method="post">@csrf 
                                                        {{method_field('DELETE')}}
                                                    <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Confirm</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    </div>
                                                    <div class="modal-body">
                                                    Are you sure you want to delete food?
                                                    </div>
                                                    <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                                    <button type="submit" class="btn btn-primary">Yes</button>
                                                    </div>
                                                    </form>
                                                </div>
                                                </div>
                                            </div>
                                </td>
                            </tr>
                           @endforeach
                         
                        </tbody>
                    </table>
                    @else
                        <p>No Category available.</p>
                    @endif
                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
