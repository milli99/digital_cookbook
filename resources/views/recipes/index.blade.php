@extends('recipes.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn" href="{{ route('recipes.create') }}"> Create New Recipes</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    @foreach ($recipes as $recipe)

    <div class="card mb-3">
        <img src="..." class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">{{ $recipe->name }}</h5>
            <p class="card-text">{{ $recipe->description }}</p>
            <p class="card-text"><small class="text-muted">{{ $recipe->ingredients }}</small></p>
            <form action="{{ route('recipes.destroy',$recipe->id) }}" method="POST">

                <a class="btn btn-info" href="{{ route('recipes.show',$recipe->id) }}">Show</a>

                <a class="btn btn-primary" href="{{ route('recipes.edit',$recipe->id) }}">Edit</a>

                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
            </div>
        </div>

     @endforeach



    {!! $recipes->links() !!}

@endsection
