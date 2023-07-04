@extends('layouts.app')
@section('title', 'index')

@section('content')
    <a href="{{ route('product.create') }}" class="btn btn-primary my-3">+ Tambah</a>
    <div class="row g-3">
        @foreach ($products as $product)
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ $product->name }}</h4>
                    <p class="card-subtitle">{{ $product->desc }}</p>
                    <h5 class="fw-bold">Rp. {{ $product->price }}</h5>
                    <div class="d-flex">
                        <a href="{{ route('product.edit', $product->id) }}" class="btn btn-sm me-1 btn-warning">e</a>
                        <form action="{{ route('product.destroy', $product->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">d</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection