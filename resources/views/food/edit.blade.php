@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (Session::has('message'))
                <div class="alert alert-success">{{Session::get('message')}}</div>
            @endif
        <form method="POST" action="{{route('food.update',$food->id)}}" enctype="multipart/form-data">@csrf
            {{method_field('PUT')}}
            <div class="card">
                <div class="card-header">Edit Food Item</div>

                <div class="card-body">
                    <div class="form-group">
                             <label for="name">Name</label>
                             <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{$food->name}}"/>
                             @error('name') <span class="invalid-feedback" role="alert">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                             <label for="name">Description</label>
                             <textarea  class="form-control  @error('description') is-invalid @enderror" id="description" name="description">{{$food->description}}</textarea>
                             @error('description') <span class="invalid-feedback" role="alert">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="name">Category</label>
                        <select  class="form-control  @error('category') is-invalid @enderror " id="category" name="category">
                            <option value="">Select Category</option>
                            @foreach (App\Category::all() as $category)
                                <option value="{{$category->id}}" @if($category->id==$food->category_id) selected @endif>{{$category->name}}</option>
                            @endforeach
                        </select>
                        @error('category') <span class="invalid-feedback" role="alert">{{$message}}</span> @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="name">Price</label>
                        <input type="number" class="form-control  @error('price') is-invalid @enderror " id="price" name="price" value="{{$food->price}}"/>
                        @error('price') <span class="invalid-feedback" role="alert">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="name">Food Image</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" />
                        @error('image') <span class="invalid-feedback" role="alert">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" name="submit" >Submit</button>
                    </div>
                </div>
            </div>
        </form>
        </div>
    </div>
</div>
@endsection
