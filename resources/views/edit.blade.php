@extends('layouts.app')
@section('title')
edit
@endsection
@section('content')

<form id="create" method="post" action="{{route('update',$leproduit->RefPdt)}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="REF" class="form-label">RefPdt</label>
                <input type="text" value="{{$leproduit->RefPdt}}" class="form-control" id="REF" name="RefPdt">
            </div>
            <div class="mb-3">
                <label for="LIB" class="form-label">LibPdt</label>
                <input type="text"  value="{{$leproduit->LibPdt}}" class="form-control" id="LIB" name="LibPdt">
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Prix</label>
                <input type="text" value="{{$leproduit->prix}}" class="form-control" id="price" name="prix">
            </div>
            <div class="mb-3">
                <label for="quantity" class="form-label">Quantité</label>
                <input type="text" value="{{$leproduit->Qte}}" class="form-control" id="quantity" name="Qte">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">description</label>
                <textarea class="form-control" value="{{$leproduit->description}}" id="description" name="description" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <label for="type" class="form-label">Type</label>
                <select  class="form-select" id="type" name="typeId">
                @foreach  ($types as $type)
                <option value="{{$type->id}}">{{$type->TypeName}}</option>
                @endforeach
                </select>
            </div>
            {{-- <div class="mb-3">
                <label for="photo" class="form-label">Photo</label>
                <input class="form-control" type="file" id="photo" name="photo">
            </div> --}}
            <button type="submit" class="btn btn-primary">Update</button>
            <style>
            #create{
                width: 60%;
                height:  auto;
                padding: 1rem;
                margin-left:21%
            }
            </style>

        </form>
    @endsection