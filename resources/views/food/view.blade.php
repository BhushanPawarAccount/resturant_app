@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Product</div>

                <div class="card-body">
                    <img src="{{asset('/images')}}/{{$food->image}}" width="250" height="200" />
                    <p class="text-center">
                        {{$food->name}}
                        <span>${{$food->price}}</span>
                    </p>
                </div>
            </div>
           
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Product Details</div>

                <div class="card-body">
                   <p>{{$food->name}}</p>
                   <p>{{$food->description}}</p>
                   <p>$ {{$food->price}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
