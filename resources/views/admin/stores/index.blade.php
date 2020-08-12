{{-- extendo do app --}}
@extends('layouts.app')

{{-- seleciono a parte que vai incorporar --}}
@section('content')
<div class="container">
  @if(!$store)
<a class="btn btn-success btn-sm" href="{{route('admin.stores.create')}}">CRADASTRAR LOJA</a>
@else
    <table class="table table-striped">
      <thead>
        <tr>
            <th>#</th>
            <th>Loja</th>
            <th>Total de produtos</th>
            <th>Ações</th>
        </tr>
      </thead>
      <tbody>
        <tr>
        <td>{{$store->id}}</td>
        <td>{{$store->name}}</td>
        <td>{{$store->products->count()}}</td>
        <td>
          <div  class="btn-group" role="group">
        <a class="btn btn-sm btn-primary" href="{{route('admin.stores.edit', ['store' => $store->id])}}" >EDITAR</a>
        <form action="{{route('admin.stores.destroy', ['store' => $store->id])}}" method="POST">
          @csrf
          @method("DELETE")
          <button type="submit" class="btn btn-sm btn-danger">REMOVER</button>
        </form>
        </div>
        </td>
        </tr>
      </tbody>
    </table>
    </div>
  @endif
@endsection