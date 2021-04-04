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
                <div class="card-header">Questions</div>

                <div class="card-body">
                    
                    @foreach($questions as $question)

                        
                         
                    
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

                        <h3><a href="{{route('questions.show', $question->slug)}}">{{$question->title}}</a></h3>
                        <p class="lead">
                        {{str_limit($question->body, 200)}}
                        </p>
                        </div>
                    </div>
                    
                    @endforeach
                </div>
                <div class="d-flex justify-content-center align-items-center">
                {{{$questions->links()}}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
