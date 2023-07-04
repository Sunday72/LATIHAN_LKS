@extends('layouts.app')
@section('title', 'Create')

@section('content')
    <div class="row">
        <div class="col-6">
            <form method="POST" action="{{ route('product.store') }}" class="text-light">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">name</label>
                    <input type="text" class="form-control" name="name">
                </div>
                <div class="mb-3">
                    <label for="desc" class="form-label">desc</label>
                    <input type="text" class="form-control" name="desc">
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">price</label>
                    <input type="number" class="form-control" name="price">
                </div>
                <button class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
