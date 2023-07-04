@extends('layouts.app')
@section('title', 'edit')

@section('content')
    <div class="row">
        <div class="col-6">
            <form method="POST" action="{{ route('product.update', $product->id) }}" class="text-light">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">name</label>
                    <input type="text" class="form-control" name="name" value="{{ $product->name }}">
                </div>
                <div class="mb-3">
                    <label for="desc" class="form-label">desc</label>
                    <input type="text" class="form-control" name="desc" value="{{ $product->desc }}">
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">price</label>
                    <input type="number" class="form-control" name="price" value="{{ $product->price }}">
                </div>
                <button class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection