@extends('layouts.app')

@section('content')
  <a href="{{route('admin.stores.create')}}" class="btn btn-large btn-success">Criar loja</a>
  <table class="table table-striped">
    <thead>
      <tr>
        <th> # </th>
        <th> Loja </th>
        <th> Ações </th>
      </tr>
    </thead>
    <tbody>
      @foreach($stores as $store)
        <tr>
          <td> {{$store->id}} </td>
          <td> {{$store->name}} </td>
          <td> 
            <a href="{{route('admin.stores.edit', ['storeID'=>$store->id])}}" class="btn btn-sm btn-primary">EDITAR</a>
            <a href="{{route('admin.stores.destroy', ['storeID'=>$store->id])}}" class="btn btn-sm btn-danger">REMOVER</a>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>

  {{$stores->links()}}
@endsection