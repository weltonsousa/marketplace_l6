@extends('layouts.app')

@section('content')
<h1>Editar Loja</h1>
<form action="{{route('admin.stores.update', ['store' => $store->id ])}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method("PUT")
      <div>
        <div class="form-group">
          <label>Nome Loja</label>
        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror " value="{{$store->name}}" value="{{old('name')}}">
          @error('name')
               <div class="invalid-feedback">
               {{$message}}
          </div>
          @enderror
        </div>
        <div class="form-group">
          <label>Descrição</label>
          <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" value="{{$store->description}}" value="{{old('description')}}">
            @error('description')
               <div class="invalid-feedback">
               {{$message}}
          </div>
          @enderror
        </div>
        <div class="form-group">
          <label>Telefone</label>
          <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{$store->phone}}" value="{{old('phone')}}">
            @error('phone')
               <div class="invalid-feedback">
               {{$message}}
          </div>
          @enderror
        </div>
        <div class="form-group">
          <label>Celular/WhattsApp</label>
          <input type="text" name="phone_mobile" class="form-control @error('phone_mobile') is-invalid @enderror" value="{{$store->phone_mobile}}" value="{{old('phone_mobile')}}">
            @error('phone_mobile')
               <div class="invalid-feedback">
               {{$message}}
          </div>
          @enderror
        </div>
        <div class="form-group">
          <p>
          <img src="{{asset('storage/' . $store->logo)}}" alt="">
          </p>
          <label>Foto da loja</label>
          <input type="file" name="logo" class="form-control @error('logo') is-invalid @enderror">
             @error('logo')
               <div class="invalid-feedback">
               {{$message}}
              </div>
            @enderror
        </div>
    </div>
   <button type="submit" class="btn btn-lg btn-success">Atualizar Loja</button>
 </form>
 @endsection