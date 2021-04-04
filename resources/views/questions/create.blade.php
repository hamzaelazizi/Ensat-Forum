@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    @if(!empty($errors))
            @foreach($errors->all() as $error)
                    <div class='alert alert-danger'>
                    {{$error}}
                    </div>
            @endforeach
    @endif
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-header">Add a question</div> 

                <div class="card-body">
                    <form method='post' action="{{route('questions.store')}}">
                    @csrf
                    <div class='form-group'>
                        <input type="text" name="title" placeholder="title" class="form-control">
                    </div>
                    <div class='form-group'>
                        <textarea class="form-control" placeholder="question body" name="body" cols="30" rows="5"></textarea>
                    </div>
                    <div class='form-group'>
                        <select class="form-control" name="category" id="category">
                        <option selected ='' disabled>choose a category</option>
                        @foreach($categories as $category)
                        <option value='{{$category->id}}'>{{$category->name}}</option>
                        @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                    
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
