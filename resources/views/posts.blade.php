@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        @foreach($posts as $post )
        <div class="card mb-4">
        @if($post->image)
                <img src="{{$post->get_image}}" alt="{{$post->title}}" class="card-img-top">
                @elseif($post->iframe)
                <div class="embed-responsive embed-responsive-16by9">
                {!! $post->iframe !!}
                </div>
                
                @endif
                <div class="card-body">
               
              <h5 class="card-title">{{$post->title}}</h5>
                <p class="card-text">
                {{$post->get_excerpt}}
                <a href="{{route('post',$post->slug)}}">Leer Mas</a>
                </p>
                <p class="text-muted mb-8"> 
                <em>
                &ndash;{{$post->user->name}}
                
                </em>

                </p>
               </div>
            </div>
        
        @endforeach

        {{$posts->links()}}
           
        </div>
        
    </div>
</div>
<style>
    #back_top {
    display: none;
    text-align: center;
    position: fixed;
    bottom: 50px;
    z-index: 999;
    right: 12%;
}
#back_top .back_top_wrap{   
     width: 60px;
    display: block;
    background: url(https://www.unhcr.org/registration-guidance/wp-content/uploads/sites/52/2018/06/icon_notes_blue2.png); background-size: contain;
    
    height: 60px;}

</style>
@if (Auth::user())
<a type="button"  data-toggle="modal" data-target="#exampleModal" id="back_top" title="Back to top" href="#" style="display: block;"><span class="back_top_wrap"></span></a>
<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cuestionario para hoy: </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form action="{{route('records.store')}}" method="post">
       <div class="question1" id="question1">
            <div class="question1-text">¿Tuviste un buen día? </div>
        <div class="form-check">
                <input class="form-check-input" onchange="setValues()"  type="radio" name="buenDia" id="exampleRadios1" value="1" checked>
                <label class="form-check-label" for="exampleRadios1">
                Si
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input"  onchange="setValues()" type="radio" name="buenDia" id="exampleRadios2" value="0">
                <label class="form-check-label" for="exampleRadios2">
                No
                </label>
            </div>
       </div> 
   
       <div class="question2" id="question2">
            <div class="question1-text">¿Te sientes Feliz con lo que lograste el dia de Hoy? </div>
        <div class="form-check">
                <input class="form-check-input" onchange="setValues()" type="radio" name="exampleRadios" id="exampleRadios1" value="1" checked>
                <label class="form-check-label" for="exampleRadios1">
                Si
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" onchange="setValues()" type="radio" name="exampleRadios" id="exampleRadios2" value="0">
                <label class="form-check-label" for="exampleRadios2">
                No
                </label>
            </div>
       </div>
       <div class="question2" ">
            <div class="form-group">
                    <label for="calificacion">De la escala del 1 al 10 ¿Que calificacion le darias a este dia?</label>
                    <input type="number"  min="1" max="10" class="form-control" id="calificacion" name="calificacion">
             </div>
       </div>
       <input type="text" class="form-control" id="preguntas" name="preguntas" value=",1,0,1" style="display:none">
       <div class="question2">
            <div class="form-group">
                    <label for="exampleInputPassword1">Escribe puntos claves de tu dia y que te gustaria hacer manana</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="nota"></textarea>
             </div>
       </div>
       @csrf
        <input type="submit" class="btn btn-primary" value="Submit">
        </form>
      </div>
      <div class="modal-footer">
      
      </div>
    </div>
  </div>
</div>
<script>
  function setValues(){
    document.querySelector("#question1 input[type=radio]:checked").value;
    document.querySelector("#question2 input[type=radio]:checked").value;
    document.querySelector("#preguntas").value = ","+document.querySelector("#question1 input[type=radio]:checked").value +"," + document.querySelector("#question2 input[type=radio]:checked").value;
    console.log("hello");
  }
</script>
@endif
@endsection

