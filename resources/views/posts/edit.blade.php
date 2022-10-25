@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar Articulo</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form" action="{{route('posts.update', $post)}}" 
                    method="post"
                    enctype = "multipart/form-data"
                    >
                    <div class="form-group">
                        <label for="">Titulo*</label>
                        <input type="text" name="title" value="{{old('title',$post->title)}}" class="form-control" require id="">

                    </div>
                    <div class="form-group">
                        <label for="">Image</label>
                        <input type="file" name="file"  >


                    </div>
                    <div class="form-group">
                        <label for="">Contenido*</label>
                        <textarea name="body" id="" require cols="30" rows="6" class="form-control"> {{old('body', $post->body)}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Contenido embebido</label>
                        <textarea name="iframe" id=""           rows="6" class="form-control">{{old('iframe', $post->iframe)}}</textarea>
                    </div>
                    <div class="form-group">
                        @csrf
                        @method('PUT')
                        <input type="submit" value="Actualizar" class="btn btn-sm btn-primary">
                         </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
