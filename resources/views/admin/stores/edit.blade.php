@extends('layouts.app')

@section('content')
  <h1>Criar loja</h1>
  <form action="{{route('admin.stores.update', ['store'=>$store->id] )}}" method="post">
    @csrf
    @method('PUT')
    
    <div class="form-group">
      <label for="">Nome loja</label>
      <input type="text" name="name" class="form-control" value="{{$store->name}}">
    </div>

    <div class="form-group">
      <label for="">Descrição</label>
      <input type="text" name="description" class="form-control" value="{{$store->description}}">
    </div>

    <div class="form-group">
      <label for="">Telefone</label>
      <input type="text" name="phone" class="form-control" value="{{$store->phone}}">
    </div>

    <div class="form-group">
      <label for="">Celular/WhatsApp</label>
      <input type="text" name="mobile_phone" class="form-control" value="{{$store->mobile_phone}}">
    </div>

    <div class="form-group">
      <label for="">Slug</label>
      <input type="text" name="slug" class="form-control" value="{{$store->slug}}">
    </div>

    <div class="form-group">
      <button type="submit" class="btn btn-success btn-large">Atualizar loja</button>
    </div>
  </form>
@endsection

