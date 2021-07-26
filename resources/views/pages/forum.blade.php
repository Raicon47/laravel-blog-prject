@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">

        <div class="col-md-3">
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

        <div class="col-md-7">
            
            <div class="form-group">
                <h2>Make your post</h2>
               <form action="{{url('/forum/store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control shadow-sm" name="post" id="post" required>
                </div>
                <button type="submit" class="btn btn-danger mt-2">Sbumit</button>
               </form>
            </div>
            <hr>
            <div>
                @forelse ($forum_posts as $post)
                   <div class="alert shadow alert-light">
                    <h4 class="font-weight-bold">{{$post->user->name}}</h4>
                    <p>{{$post->body}}</p>
                    @include('laravelLikeComment::like', ['like_item_id' => 'image_31'])
                     @comments(['model' => $post])
                   </div>
                @empty
                    
                @endforelse
            </div>
        </div>

        <div class="col-md-2">
            <div class="alert alert-dark shadow">
             <img src="{{asset('img/icons/logo.png')}}" class="img-fluid" alt="">
             <hr>
                <p>Get your business promoted here</p>
                <small><strong>Call:</strong> <br> 08140005666</small> <br>
                <small><strong>Email:</strong> <br> icondikenabia@yahoo.com</small>
            </div>
        </div>

    </div>
</div>

@endsection