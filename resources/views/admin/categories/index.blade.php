{{-- extendo do app --}}
@extends('layouts.app')
{{-- seleciono a parte que vai incorporar --}}
@section('content')
<div class="container">
<a class="btn btn-success btn-sm" href="{{route('admin.categories.create')}}">CADASTRAR CATEGORIA</a>
    <table class="table table-striped">
      <thead>
        <tr>
            <th>#</th>
            <th>Nome</th>
            <th>Ações</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($categories as $category)
        <tr>
        <td>{{$category->id}}</td>
        <td>{{$category->name}}</td>
        <td>
          <div class="btn-group" role="group">
              <a class="btn btn-sm btn-primary" href="{{route('admin.categories.edit', ['category' => $category->id])}}" >EDITAR</a>
              <form action="{{route('admin.categories.destroy', ['category' => $category->id])}}" method="POST">
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
    {{$categories->links()}}

@endsection