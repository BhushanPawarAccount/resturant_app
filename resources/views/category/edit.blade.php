@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (Session::has('message'))
                <div class="alert alert-success">{{Session::get('message')}}</div>
            @endif
        <form method="POST" action="{{route('category.update',[$category->id])}}" >
            @csrf
            {{method_field('PUT')}}
            <div class="card">
                <div class="card-header">Manage Food Category</div>

                <div class="card-body">
                    <div class="form-group">
                             <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{$category->name}}"/>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" name="submit" >Update</button>
               </div>
                </div>
            </div>
        </form>
        </div>
    </div>
</div>
@endsection
