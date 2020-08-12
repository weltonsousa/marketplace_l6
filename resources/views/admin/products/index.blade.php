{{-- extendo do app --}}
@extends('layouts.app')
{{-- seleciono a parte que vai incorporar --}}
@section('content')
<div class="container">
<a class="btn btn-success btn-sm" href="{{route('admin.products.create')}}">CRADASTRAR PRODUTO</a>
    <table class="table table-striped">
      <thead>
        <tr>
            <th>#</th>
            <th>Nome</th>
            <th>Preço</th>
            <th>Loja</th>
            <th>Ações</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($products as $product)
        <tr>
        <td>{{$product->id}}</td>
        <td>{{$product->name}}</td>
        <td>{{number_format($product->price, 2, ',', '.')}}</td>
        <td>{{$product->store->name}}</td>
        <td>
          <div class="btn-group" role="group">
              <a class="btn btn-sm btn-primary" href="{{route('admin.products.edit', ['product' => $product->id])}}" >EDITAR</a>
              <form action="{{route('admin.products.destroy', ['product' => $product->id])}}" method="POST">
                @csrf
                @method("DELETE")
                <button type="submit" class="btn btn-sm btn-danger">REMOVER</button>
              </form>
          </div>
        </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
    {{$products->links()}}

@endsection