@extends('admin.master')
@section('title',"Admin Dashboard | shipping Method")

@section('body')
<br>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <section class="pt-3">
        <div class="card">
            <div class="card-header bg-info">
                <div class="card-title">Shipping Method</div>
            </div>
            <form action="{{route('shipping.update',$shippingMethod->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
            <div class="card-body w3-light-gray">
                    <div class="row py-2">
                        <div class="col-12 col-md-12 m-auto card p-5">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Name</label>
                                <input type="text" class="form-control @error('name') is_invalid @enderror" id="" placeholder="Name" name="name" value="{{ $shippingMethod->name }}">
                                @error('name')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="location">Location</label>
                                <input type="text" class="form-control @error('location') is_invalid @enderror" id="" placeholder="location" name="location" value="{{ $shippingMethod->location }}">
                                @error('location')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
           

                             <div class="form-group">
                                <label for="exampleInputPassword1">Price</label>
                                <input type="text" class="form-control @error('price') is_invalid @enderror" id="" placeholder="price" name="price" value="{{ $shippingMethod->price }}">
                                @error('price')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                         

                      </div>
                    </div>


            </div>

            <div class="card-footer text-right">
                <input type="submit" class="btn btn-success mt-2">
            </div>
        </form>

    </div>
    </section>
@endsection




