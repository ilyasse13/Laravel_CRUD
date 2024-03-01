@extends('layouts.app')
@section('title')
create
@endsection
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data" class="mt-4">
                @csrf
                <div class="mb-3">
                    <label for="REF" class="form-label">RefPdt</label>
                    <input type="text" class="form-control" id="REF" name="RefPdt">
                </div>
                <div class="mb-3">
                    <label for="LIB" class="form-label">LibPdt</label>
                    <input type="text" class="form-control" id="LIB" name="LibPdt">
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Prix</label>
                    <input type="text" class="form-control" id="price" name="prix">
                </div>
                <div class="mb-3">
                    <label for="quantity" class="form-label">Quantité</label>
                    <input type="text" class="form-control" id="quantity" name="Qte">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label for="type" class="form-label">Type</label>
                    <select class="form-select" id="type" name="type">
                        @foreach ($types as $type)
                        <option value="{{ $type->id }}">{{ $type->TypeName }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Photo</label>
                    <input class="form-control" type="file" id="image" name="img">
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>
</div>
    @endsection