@extends('layouts.app')

@section('content')
{{-- @if(!auth()->check())
<small>Please Log in to comment</small>
@endif --}}

    <div class="container">

      <div class="my-5">
        <input type="text" class="form-control" id="search-input" placeholder="Search" />
      </div>

             <div class="row">

              @foreach ($posts as $post)
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
              @endforeach
                  
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
        window.location = 'show/' + suggestion.slug
  });
</script>

@endsection