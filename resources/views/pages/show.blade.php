@extends('layouts.app')

@section('content')

    <div class="container"> 
          <div class="row">

            <div class="col-md-8 mt-2">
                <h1 class="display-4 text-danger font-weight-bold">{{$post->title}}</h1>
                <p class="text-muted">{{$post->author->name}} - <span>{{$post->publish_date->diffforHumans()}}</span></p>
                <img src="{{$post->featured_image}}" class="img-fluid" alt="">
                <p class="lead">{!!$post->body!!}</p>
                @include('laravelLikeComment::like', ['like_item_id' => 'image_31'])
                <hr>
                <div class="my-3">
                    <h4 class="text-muted">Topics</h4>
                    @forelse ($post->tags as $tag)
                    <a href="/topics/{{$tag->slug}}" class="btn btn-dark btn-sm">{{$tag->name}}</a>  
                    @empty 
                    <div class="alert alert-dark">this post is not under any topic</div> 
                    @endforelse
                </div>
                @if (auth()->user())
                <div>
                  @include('laravelLikeComment::comment', ['comment_item_id' => 'video_12'])
                  {{-- @include('laravelLikeComment::like', ['like_item_id' => 'image_31']) --}}
                </div>
                @else
                    <div class="alert alert-warning">
                      You need to login to comment and like post
                    </div>
                @endif
             </div>

             <div class="col-md-4 mt-2">

              <div class="fb-page" data-href="https://www.facebook.com/icon47/" data-tabs="timeline" data-width="" data-height="70" data-hide-cover="false"><blockquote cite="https://www.facebook.com/icon47/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/icon47/">Quality Icon NG</a></blockquote></div>
  
              <div class="my-5">
                <input type="text" class="form-control" id="search-input" placeholder="Search" />
              </div>
              
               <div class="alert">
                {{-- <h4 class="font-italic">Related topics & Posts</h4> --}}
                <h4 class="font-italic text-muted">Blog Posts</h4>
                <ol class="list-unstyled mb-0">
                  @forelse ($posts as $item)
                    <li class="border-top my-3"><a href="/show/{{$item->slug}}">{{$item->title}}  <span>{{$item->author->name}}</span></a></li>
                  @empty
                    <li class="border-top my-3">There are no posts</li>
                  @endforelse

                  {{-- @forelse ($post->tags as $tag)
                       <p>{{$tag->name}}</p>
                     @foreach ($tag->posts as $item)
                     <li class="border-top my-3"><a href="/show/{{$item->slug}}">{{$item->title}}</a></li>
                     @endforeach
                    @empty
                    <div class="alert alert-warning">This post is not under any topic</div>
                    @endforelse --}}
                  </ol>
               </div>

               <div class="alert alert-dark shadow col-md-8 mx-auto">
                <img src="{{asset('img/icons/logo.png')}}" class="img-fluid" alt="">
                <hr>
                   <p>Get your business promoted here</p>
                   <small><strong>Call:</strong> <br> 08140005666</small> <br>
                   <small><strong>Email:</strong> <br> icondikenabia@yahoo.com</small>
               </div>
               

             </div>

          </div>
    </div>


    <script src="https://cdn.jsdelivr.net/algoliasearch/3/algoliasearch.min.js"></script>
    <script src="https://cdn.jsdelivr.net/autocomplete.js/0/autocomplete.min.js"></script>
    <script>
    
      var client = algoliasearch( '1FENSVV282' , '4d3eca83dba54fbcef0c7a3f17fabd6d' );
      var index = client.initIndex('posts_index');
      autocomplete('#search-input', { hint: true }, [
        {
          autofocus:false,
          source: autocomplete.sources.hits(index, { hitsPerPage: 3 }),
          displayKey: 'title',
          templates: {
            suggestion: function(suggestion) {
              return suggestion._highlightResult.title.value;
            },
            footer: '<div class="aa-dropdown-footer">Search by<img class="aa-logo" src="https://www.algolia.com/assets/algolia128x40.png" width=80/></div>'
          },
        }
      ])
      .on('autocomplete:selected', function(event, suggestion, dataset, context) {
            window.location = suggestion.slug
            // window.location.href = 'http://blog-app.test/show/' + suggetion;
      });
    </script>
@endsection