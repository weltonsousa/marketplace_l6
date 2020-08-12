@extends('layouts.app')

@section('content')
<h1>Editar Produto</h1>
<form action="{{route('admin.products.update', ['product' => $product->id ])}}" method="POST" enctype="multipart/form-data">
  @csrf
  @method('PUT')
      <div>
        <div class="form-group">
          <label>Nome produto</label>
        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{$product->name}}" value="{{old('name')}}">
         @error('name')
               <div class="invalid-feedback">
               {{$message}}
          </div>
          @enderror
        </div>
        <div class="form-group">
          <label>Descrição</label>
          <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" value="{{$product->description}}" value="{{old('description')}}">
           @error('description')
               <div class="invalid-feedback">
               {{$message}}
          </div>
          @enderror
        </div>
        <div class="form-group">
          <label>Preço</label>
          <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" value="{{$product->price}}" value="{{old('price')}}">
           @error('price')
               <div class="invalid-feedback">
               {{$message}}
          </div>
          @enderror
        </div>
        <div class="form-group">
          <label>Conteúdo</label>
        <textarea name="body" id="" cols="30" rows="10" class="form-control @error('body') is-invalid @enderror">{{$product->body}}</textarea>
         @error('body')
               <div class="invalid-feedback">
               {{$message}}
          </div>
          @enderror
        </div>
         <div class="form-group">
          <label for="">Categorias</label>
            <select name="categories[]" id="" class="form-control" multiple>
            @foreach ($categories as $category)
            <option value="{{$category->id}}" @if ($product->categories->contains($category))  selected @endif>
              {{$category->name}}</option>
            @endforeach
            </select>
        </div>
         <div class="form-group">
          <label>Fotos dos produtos</label>
          <input type="file" name="photos[]" class="form-control @error('photos.*') is-invalid @enderror" multiple>
          @error('photos.*')
               <div class="invalid-feedback">
               {{$message}}
          </div>
          @enderror
        </div>
    </div>
   <button type="submit" class="btn btn-lg btn-success">Atualizar Loja</button>
 </form>
 <hr>

 <div class="row">
   <div class="col-4 text-center">
     @foreach ($product->photos as $photo)
   <img src="{{asset('storage/'. $photo->image )}}" alt="" class="img-fluid">
   <form action="{{route('admin.photo.remove')}}" method="post">
    @csrf
    <input type="hidden" name="photoName" value="{{$photo->image}}">
    <button type="submit" class="btn btn-lg btn-danger">REMOVER</button>
    </form>
     @endforeach
   </div>
 </div>
 @endsection