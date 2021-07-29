@extends('layouts.app')

@section('content')
  <h1> Criar produto </h1>
  <form action="{{route('admin.products.store')}}" method="post" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <div class="form-group">
      <label for="">Nome produto</label>
      <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}">
      @error('name')
        <div class="invalid-feedback">
          {{$message}}
        </div>
      @enderror
    </div>

    <div class="form-group">
      <label for="">Descrição</label>
      <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" value="{{old('description')}}">
      @error('description')
        <div class="invalid-feedback">
          {{$message}}
        </div>
      @enderror
    </div>

    <div class="form-group">
      <label for="">Conteúdo</label>
      <textarea name="body" id="" cols="30" rows="10" class="form-control @error('body') is-invalid @enderror">{{old('body')}}</textarea>
      @error('body')
        <div class="invalid-feedback">
          {{$message}}
        </div>
      @enderror
    </div>

    <div class="form-group">
      <label for="">Preço</label>
      <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" value="{{old('price')}}">
      @error('price')
        <div class="invalid-feedback">
          {{$message}}
        </div>
      @enderror
    </div>

    <div class="form-group">
      <label for="">Slug</label>
      <input type="text" name="slug" class="form-control">
    </div>

    <div class="form-group">
      <label for="">Categorias</label>
      <select name="categories[]" id="" class="form-control" multiple>
        @foreach($categories as $category)
          <option value="{{$category->id}}"> {{$category->name}} </option>
        @endforeach
      </select>
    </div>

    <div class="form-group">
      <label for="">Fotos do produto</label>
      <input type="file" name="photos[]" class="form-control @error('photos') is-invalid @enderror" multiple>
      @error('photos')
        <div class="invalid-feedback">
          {{$message}}
        </div>
      @enderror
    </div>

    <div class="form-group">
      <button type="submit" class="btn btn-success btn-large">Criar produto</button>
    </div>
  </form>
@endsection

