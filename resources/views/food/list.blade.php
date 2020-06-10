@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Food List</div>
                <br/>
                @foreach ($categoies as $catgory)
                 <div class="col-md-12">
                    <h3>{{$catgory->name}}</h3>
                      <div class="jumbotron">
                       
                        <div class="row">
                            @foreach (App\Food::where('category_id',$catgory->id)->get() as $food)
                            <div class="col-md-3">
                                <img src="{{asset('/images')}}/{{$food->image}}" width="200" height="155" />
                                <p class="text-center">
                                    {{$food->name}}
                                    <span>${{$food->price}}</span>
                                </p>
                                <p class="text-center"><a href="{{route('food.view',[$food->id])}}">View</a> </p>
                            </div>
                            @endforeach
                       </div>
                     
                      </div>
                    </div>
                   <hr/>
                 
                 @endforeach
               
            </div>
        </div>
    </div>
</div>
@endsection
