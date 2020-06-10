@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (Session::has('message'))
                <div class="alert alert-success">{{Session::get('message')}}</div>
            @endif
        <form method="POST" action="{{route('category.store')}}" >@csrf
            <div class="card">
                <div class="card-header">Manage Food Category</div>

                <div class="card-body">
                    <div class="form-group">
                             <label for="name">Name</label>
                             <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" />
                             @error('name') <span class="invalid-feedback" role="alert">{{$message}}</span> @enderror
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
