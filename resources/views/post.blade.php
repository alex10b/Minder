@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
       
        <div class="card mb-4">
        @if($post->image)
                <img src="{{$post->get_image}}" alt="{{$post->title}}" class="card-img-top ">
          @endif     
               
                <div class="card-body">
                @if($post->iframe)
                <div class="embed-responsive embed-responsive-16by9">
                {!! $post->iframe !!}
                </div>
                
                @endif
              <h5 class="card-title">{{$post->title}}</h5>
                <p class="card-text">
                {!!nl2br($post->body)!!}
               
                </p>
                <p class="text-muted mb-8"> 
                <em>
                &ndash;{{$post->user->name}}
                
                </em>
                </p>
               </div>
            </div>
        
     
           
        </div>
    </div>
</div>
@endsection
