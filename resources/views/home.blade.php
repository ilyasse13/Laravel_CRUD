@extends('layouts.app')

 @section('content')
<div class="container">
  <h1 class="mb-3">Welcome, {{ Auth::user()->name }}</h1>
  
  <table class="table table-bordered table-striped">
    <thead class="table-dark">
      <tr>
        <th scope="col">Ref</th>
        <th scope="col">Libellé</th>
        <th scope="col">Prix</th>
        <th scope="col">Quantité</th>
        <th scope="col">Description</th>
        <th scope="col">Type</th>
        <th scope="col">Photo</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach($produits as $produit)
      <tr>
        <th scope="row">{{$produit->RefPdt}}</th>
        <td>{{$produit->LibPdt}}</td>
        <td>{{$produit->prix}}</td>
        <td>{{$produit->Qte}}</td>
        <td>{{$produit->description}}</td>
        <td>{{$produit->type->TypeName}}</td>
        <td><img src="{{ asset($produit->image) }}" alt="" style="max-width: 100px;"></td>
        <td>
          <a href="{{route('show', $produit->RefPdt)}}" class="btn btn-info">Details</a> 
          <a href="{{route('edit', $produit->RefPdt)}}" class="btn btn-primary">Edit</a>
          <form onsubmit="return confirm('Are you sure you want to delete?')" style="display: inline-block;" action="{{route('delete', $produit->RefPdt)}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

 @endsection
   
