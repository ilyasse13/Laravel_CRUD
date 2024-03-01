@extends('layouts.app')
@section('title')
Detials
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-4">
                <div class="card-header">
                    Product Details
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $produit->LibPdt }}</h5>
                    <p class="card-text">Reference: {{ $produit->RefPdt }}</p>
                    <p class="card-text">Price: {{ $produit->prix }}</p>
                    <p class="card-text">Quantity: {{ $produit->Qte }}</p>
                    <p class="card-text">Description: {{ $produit->description }}</p>
                    <p class="card-text">Type: {{ $produit->type->TypeName }}</p>
                    <img src="{{ asset($produit->image) }}" class="img-fluid" alt="Product Image">
                </div>
                <div class="card-footer text-muted">
                    <a href="{{ route('edit', $produit->RefPdt) }}" class="btn btn-primary">Edit</a>
                    <form onsubmit="return confirm('Are you sure you want to delete?')" style="display: inline-block;" action="{{ route('delete', $produit->RefPdt) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection