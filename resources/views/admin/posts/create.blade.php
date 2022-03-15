@extends('adminlte::page')

@section('title', 'Coders Free')

@section('content_header')
    <h1>Crear Post</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.posts.store', 'autocomplete' => 'off', 'files' => true]) !!}
            {!! Form::hidden('user_id', auth()->user()->id) !!}
            <div class="form-group">
                {!! Form::label('name', 'Nombre:') !!}
                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del post']) !!}
                @error('name')
                    <small class="text-danger">{{ $message }} </small>
                @enderror
            </div>
            <div class="form-group">
                {!! Form::label('slug', 'Slug:') !!}
                {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el slug del post', 'readonly' => true]) !!}
                @error('slug')
                    <small class="text-danger">{{ $message }} </small>
                @enderror
            </div>

            <div class="form-group">
                {!! Form::label('category_id', 'Categoria') !!}
                {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}
                @error('category_id')
                    <small class="text-danger">{{ $message }} </small>
                @enderror
            </div>
            <div class="form-group">
                <p class="font-weight-bold">Etiquetas</p>
                @foreach ($tags as $tag)
                    <label class="mr-2" for="">
                        {!! Form::checkbox('tags[]', $tag->id, null) !!}
                        {{ $tag->name }}
                    </label>
                @endforeach

                @error('tags')
                    <br>
                    <small class="text-danger">{{ $message }} </small>
                @enderror
            </div>
            <div class="form-group">
                <p class="font-wight-bold">Estado:</p>
                <label for="">
                    {!! Form::radio('status', 1, true) !!}
                    Borrador
                </label>
                <label for="">
                    {!! Form::radio('status', 2) !!}
                    Publicado
                </label>
                @error('status')
                    <br>
                    <small class="text-danger">{{ $message }} </small>
                @enderror
            </div>
            <div class="row mb-3">
                <div class="col">
                    <div class="image-wrapper"><img id="picture" class=""
                            src="https://cdn.pixabay.com/photo/2020/11/22/20/45/colorful-5767937_960_720.jpg" alt=""></div>
                </div>
                <div class="col">
                    <div class="form-group">
                        {!! Form::label('file', 'Imagen que se mostrara en el post') !!}
                        {!! Form::file('file', ['class' => 'form-control-file', 'accept' => 'image/*']) !!}

                    </div>
                    @error('file')
                        <br>
                        <small class="text-danger">{{ $message }} </small>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('extract', 'Extracto') !!}
                {!! Form::textarea('extract', null, ['class' => 'form-control']) !!}
                @error('extract')
                    <small class="text-danger">{{ $message }} </small>
                @enderror
            </div>
            <div class="form-group">
                {!! Form::label('body', 'Cuerpo del Post') !!}
                {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
                @error('body')
                    <small class="text-danger">{{ $message }} </small>
                @enderror
            </div>
            {!! Form::submit('Crear Post', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}

        </div>
    </div>
@stop

@section('css')
    <style>
        .image-wrapper {
            position: relative;
            padding-bottom: 56.25%;
        }

        .image-wrapper img {
            position: absolute;
            object-fit: cover;
            width: 100%;
            height: 100%;
        }

    </style>
@stop

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/speakingurl/14.0.1/speakingurl.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/33.0.0/classic/ckeditor.js"></script>
    <script src="{{ asset('vendor/jQuery-Plugin-stringToSlug/dist/jquery.stringtoslug.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#name').stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
        });
    </script>
    <script>
        ClassicEditor
            .create(document.querySelector('#extract'))
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#body'))
            .catch(error => {
                console.error(error);
            });

        document.getElementById('file').addEventListener('change', cambiarImagen);

        function cambiarImagen(event) {
            var file = event.target.files[0];
            var reader = new FileReader();
            reader.onload = (event) => {
                document.getElementById("picture").setAttribute('src', event.target.result)
            }

            reader.readAsDataURL(file);
        }
    </script>
@endsection
