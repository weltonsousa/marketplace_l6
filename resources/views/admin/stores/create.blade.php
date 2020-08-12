@extends('layouts.app')

@section('content')
<h1>Criar Loja</h1>
<form action="{{route('admin.stores.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
      <div>
        <div class="form-group">
          <label>Nome Loja</label>
        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}">
          @error('name')
          <div class="invalid-feedback">
                {{$message}}
          </div>
          @enderror
        </div>
        <div class="form-group">
          <label>Descrição</label>
          <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" value="{{old('description')}}">
           @error('description')
          <div class="invalid-feedback">
              {{-- Campo obrigatório! --}}
              {{$message}}
          </div>
          @enderror
        </div>
        <div class="form-group">
          <label>Telefone</label>
          <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{old('phone')}}">
           @error('phone')
          <div class="invalid-feedback">
              {{$message}}
          </div>
          @enderror
        </div>
        <div class="form-group">
          <label>Celular/WhattsApp</label>
          <input type="text" name="phone_mobile" class="form-control @error('phone_mobile') is-invalid @enderror" value="{{old('phone_mobile')}}">
           @error('phone_mobile')
          <div class="invalid-feedback">
               {{$message}}
          </div>
          @enderror
        </div>
        <div class="form-group">
          <label>Foto da loja</label>
          <input type="file" name="logo" class="form-control @error('logo') is-invalid @enderror" value="{{old('logo')}}">
           @error('logo')
               <div class="invalid-feedback">
               {{$message}}
              </div>
          @enderror
        </div>
    </div>
   <button type="submit" class="btn btn-lg btn-success">Criar Loja</button>
 </form>
 @endsection