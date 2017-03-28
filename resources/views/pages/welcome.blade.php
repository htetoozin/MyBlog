@extends('main')

@section('title', '| Homepage')


@section('content')
        <div class="row">
            <div class="col-md-12">
                <div class="jumbotron">
                  <h1>welcome My Blog!</h1>
                  <p class="lead">Thank you so much for visiting. This is my test website built with Laravel. Please read my  popular post!</p>
                  <p><a class="btn btn-primary btn-lg" href="#" role="button">Popular Post</a></p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                @foreach($posts as $post)
                <div class="post">
                    <h3>{{ $post->title }}</h3>
                    <p>{{ substr(strip_tags($post->body), 0, 300) }} {{ strlen($post->body) > 300 ? "..." : "" }}</p>
                    <a href="{{ url('blog/'. $post->slug) }}" class="btn btn-primary">Read More</a>
                    <hr>
                </div>
                @endforeach
            </div>
            <div class="col-md-3 col-md-offset-1">
                <h3>Sidebar</h3>
            </div>
        </div>
@endsection