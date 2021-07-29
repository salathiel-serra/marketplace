@extends('layouts.app')

@section('content')
  @if(auth()->user()->store)
    <a href="{{route('admin.products.create')}}" class="btn btn-large btn-success"> Criar produto </a>
  @endif
  <table class="table table-striped">
    <thead>
      <tr>
        <th> # </th>
        <th> Nome </th>
        <th> Preço </th>
        <th> Loja </th>
        <th> Ações </th>
      </tr>
    </thead>
    <tbody>
      @forelse($products as $product)
        <tr>
          <td> {{$product->id}} </td>
          <td> {{$product->name}} </td>
          <td> R$ {{number_format($product->price, 2, ',','.')}} </td>
          <td> {{$product->store->name}} </td>
          <td>
            <div class="btn-group">
              <a href="{{route('admin.products.edit', ['product'=>$product->id])}}" class="btn btn-sm btn-primary">EDITAR</a>
              <form action="{{route('admin.products.destroy', ['product'=>$product->id])}}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger">REMOVER</button>
              </form>
            </div>
          </td>
        </tr>
      @empty
      
      @endforelse
    </tbody>
  </table>
  @if(!empty($products))
  {{ $products->links() }}
  @endif
@endsection