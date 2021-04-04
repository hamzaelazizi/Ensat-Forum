@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
       

    <div class="col-md-4">
        <div class='p-2 my-3'>
        <a href="{{route('questions.create')}}" class="btn btn-primary">Add Question</a>
        </div>

            <div class="card">       
                <div class="card-header">categories</div>
                <div class="card-body">
                <ul class="list-group">
                    @foreach($categories as $category)
                   <li class="list-group-item">
                   <h4><a href="">{{$category->name}}</a></h4>
                   </li>
                    @endforeach
                </ul>    
                </div>
            </div>
    </div>
        <div class="col-md-8">
        @if(session()->has('success'))
            <div class='alert alert-success'>
            {{session()->get('success')}}
            </div>
        @endif
            <div class="card">
                <div class="card-header"><h3>{{$question->title}}</h3></div>

                <div class="card-body">
                    
                    
                    <div class="media rounded shadow-sm bg-light p-2 my-2">
                        <div class="media-boy">

                        <div class="d-flex justify-content-center align-items-start flex-column">
                            <p>By: {{$question->user->name}}</p>
                            <p>Category: {{$question->category->name}}</p>
                            <p class="bg-danger text-white rounded p-2">
                            Posted 
                            {{$question->created_at->diffForhumans()}}
                           
                            </p>
                        </div>

                        
                        <p class="lead">
                        {{$question->body}}
                        </p>
                        </div>
                    </div>

                </div>
            </div>
        
                          <div class="card mt-2">
                                 <div class="card-header">reply</div>

                                      <div class="card-body">
                                      <form method='post' action="{{route('replies.store')}}">
                    @csrf
                    
                    <div class='form-group'>
                        <textarea class="form-control" placeholder="the answer" name="body" cols="30" rows="5"></textarea>
                    </div>
                    <div class='form-group'>
                    </div>
                    <input type="hidden" name="question_id" value="{{$question->id}}">
                    <button type="submit" class="btn btn-primary">Add</button>
                    </form>

                                      </div>
                            </div>
                    </div>                  
    </div>
</div>
@endsection
