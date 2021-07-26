@extends('layouts.app')

@section('content')

<div class="container">
    <div class="col-md-12 mx-auto my-5">

       <div class="row">

        @forelse ($tag->posts as $post)
        <div class="col-md-6">
          <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <div class="col p-4 d-flex flex-column position-static">
              {{-- <strong class="d-inline-block mb-2 text-success">Design</strong> --}}
              <h3 class="mb-0 text-danger">{{$post->title}}</h3>
              <div class="mb-1 text-muted">{{$post->created_at->diffforHumans()}}</div>
              <p class="mb-auto">This is a wider card with supporting text below as a natural lead-in.</p>
              <a href="/show/{{$post->slug}}" class="stretched-link">Continue reading</a>
            </div>
            <div class="col-auto d-none d-lg-block">
              <img src="{{$post->featured_image}}" width="200" height="250" alt="..."> 
            </div>
          </div>
        </div>

        @empty

      <div class="alert alert-warning">
        There are no posts for {{$tag->name}}
      </div>

        @endforelse
            
       </div>
    </div>
</div>
    
    
@endsection