@extends('layouts.front')

@section('content')
  <div class="row">
      <div class="col-6">
          @if ($product->photos->count())
                  <img src="{{asset('storage/' . $product->photos->first()->image)}}" class="card-img-top" alt="...">
                 <div class="row" style="margin-top: 20px">
                       @foreach ($product->photos as $photo)
                         <img src="{{asset('storage/' . $photo->image)}}" class="img-fluid" alt="...">
                  </div>
                    @endforeach
                  @else
                  <img src="{{asset('assets/img/no-photo.jpg')}}" class="card-img-top" alt="...">
            @endif
      </div>
      <div>
        <div class="col-6">
            <div class="col-md-12">
          <h2>{{$product->name}}</h2>
          <p>
              {{$product->description}}
          </p>
            <h3>R$ {{number_format($product->price, 2, ',', '.')}}</h3>
            <span>
              Loje: {{$product->store->name}}
            </span>
            </div>
              <div class="product-add col-md-12">
                <hr>
              <form action="{{route('cart.add')}}" method="POST">
                @csrf
                  <input type="hidden" name="product[name]" value="{{$product->name}}">
                    <input type="hidden" name="product[price]" value="{{$product->price}}">
                    <input type="hidden" name="product[slug]" value="{{$product->slug}}">
                    <div class="form-group">
                        <label for="">Quantidade</label>
                        <input type="number" name="product[amount]" class="form-control col-md-4" value="1">
                    </div>
                      <button href="" class="btn btn-danger">Comprar</button>
                  </form>
              </div>
            </div>
      </div>
  </div>
  <div class="row">
      <div class="col-12">
        <hr>
        {{$product->body}}
      </div>
  </div>
@endsection