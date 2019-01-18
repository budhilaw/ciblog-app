@extends('layouts.index')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                @foreach ($posts as $post)
                    <div class="post-preview">
                        <a href="/post/{{ $post->post_slug }}">
                            <h2 class="post-title">{{ $post->post_title }}</h2>
                            <h3 class="post-subtitle"><?php echo word_limiter($post->post_body, 20, '..');?></h3>
                        </a>
                        <p class="post-meta">Posted by
                            <a href="#">{{ $post->name }}</a>
                            on <?php echo date('F d, Y', strtotime($post->created_at));?>
                        </p>
                    </div>
                    <hr>
                @endforeach
                <!-- Pager -->
                <div class="clearfix">
                    <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
                </div>
            </div>
        </div>
    </div>
@endsection