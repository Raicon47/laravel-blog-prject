@extends('layouts.app')

@section('content')
  <div class="container poppins mb-5">
    {{-- <h2 class="fw-bold text-center text-dark">Testimonial</h2> --}}
    <div class="main-carousel" data-flickity='{ "cellAlign": "left", "contain": true, "autoPlay": true }'>
      @foreach ($posts as $post)
      <div class="card bg-dark" style="width: 18rem;">
        <img src="{{$post->featured_image}}" height=250" class="card-img" alt="...">
        <div class="card-img-overlay">
          <h5 class="card-title text-white">{{$post->title}}</h5>
          {{-- <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p> --}}
          <p class="card-text text-white">{{$post->created_at->diffforHumans()}}</p>
          <a href="/show/{{$post->slug}}" class="stretched-link"></a>
        </div>
      </div>
        @endforeach
    </div>
  </div>


<main role="main" class="container">
    <div class="row">
      <div class="col-md-8 blog-main">
        <h3 class="pb-4 mb-4 font-italic border-bottom">
          Recent Post
        </h3>
  
        <div class="blog-post">
          @forelse ($posts->take(1) as $post)
          <h1 class="blog-post-title font-weight-bold text-danger">{{$post->title}}</h1>
          <p class="blog-post-meta">{{$post->publish_date->format('y,m,d')}} <a href="#">{{$post->author->name}}</a></p>
          <img src="{{$post->featured_image}}" class="img-fluid" alt="">
          <p>{{$post->excerpt}}</p>
          <hr>
          <blockquote>
            <p>{!!$post->body!!}</p>
          </blockquote> 
          @empty
              
          @endforelse        
        </div><!-- /.blog-post -->
  
      
  
      
  
      </div><!-- /.blog-main -->
  
      <aside class="col-md-4 blog-sidebar">

        <div class="fb-page" data-href="https://www.facebook.com/icon47/" data-tabs="timeline" data-width="" data-height="70" data-hide-cover="false"><blockquote cite="https://www.facebook.com/icon47/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/icon47/">Quality Icon NG</a></blockquote></div>

  
        <div class="p-4">
          <div class="alert alert-dark shadow-sm">
            <h4 class="font-italic">Top Posts</h4>
            <ol class="list-unstyled mb-0">
              @forelse ($posts->take(5) as $item)
                <li class="border-top my-3"><a href="/show/{{$item->slug}}">{{$item->title}}  <span>{{$item->author->name}}</span></a></li>
              @empty
                <li class="border-top my-3">There are no posts</li>
              @endforelse
              </ol>
           </div>
        </div>
  
       
      </aside><!-- /.blog-sidebar -->
  
    </div><!-- /.row -->
  
  </main><!-- /.container -->
  
  

@endsection