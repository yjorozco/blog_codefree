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
        <div class="image-wrapper">
            @isset ($post->image)
                <img id="picture" alt="" src={{ Storage::url($post->image->url) }}>
            @else
                <img id="picture" class="" src="https://cdn.pixabay.com/photo/2020/11/22/20/45/colorful-5767937_960_720.jpg" alt="">
            @endif
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            {!! Form::label('file', 'Imagen que se mostrara en el post') !!}
            {!! Form::file('file', ['class' => 'form-control-file', 'accept' => 'image/*']) !!}
            @error('file')
                <br>
                <small class="text-danger">{{ $message }} </small>
            @enderror

        </div>

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
