@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb" style="margin-top:50px;">
            <div class="pull-left">
            <h2>{{(isset($product)) ? 'Edit' : 'Add New'}}  Produk</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('products.index') }}" title="Go back"> <i class="fas fa-backward "></i> </a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ (isset($product)) ? route('products.update', $product->id) : route('products.store') }}" method="POST" >
        @csrf
        @if(isset($product))
            @method('PUT')
        @endif

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    @php
                        $name = (old('name')) ? old('name') : ((isset($product->name)) ? $product->name : '');
                    @endphp
                    <input type="text" name="name" class="form-control" placeholder="Name" value="{{$name}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Description:</strong>
                    @php
                        $description = (old('description')) ? old('description') : ((isset($product->description)) ? $product->description : '');
                    @endphp
                    <textarea class="form-control" style="height:50px" name="description" placeholder="description">{{$description}}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Price:</strong>
                    @php
                        $price = (old('product_price')) ? old('product_price') : ((isset($product->product_price)) ? $product->product_price : '');
                    @endphp
                    <input type="number" name="product_price" class="form-control" placeholder="price" value="{{$price}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection
