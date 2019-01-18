@extends('layouts.admin')

@section('content_header')
    <section class="content-header">
        <h1>
            Posts
            <small>Control Panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Posts</li>
        </ol>
    </section>
@endsection

@section('info')
@endsection

@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Create a post</h3>
        </div>
        @if ( !empty($_SESSION['success']) )
            <div class="notifications" style="margin: 10px 15px;">
                <div class="alert alert-success">{{ $_SESSION['success'] }}</div>
            </div>
        @endif
        <?php if( validation_errors() ): ?>
            <div class="notifications" style="margin: 10px 15px;">
                <?php echo validation_errors();?>
            </div>
        <?php endif;?>

        <form method="post" action="/admin/post/new/store">
            <div class="box-body">
                <div class="form-group">
                    <label for="post_title">Title</label>
                    <input type="text" name="post_title" class="form-control" id="post_title" placeholder="Post title">
                </div>
                <div class="form-group">
                    <label for="post_body">Category</label>
                    <select name="post_cat" id="post_cat" class="form-control">
                        @foreach ($categories as $cat)
                            <option value="{{ $cat->cat_id }}">{{ $cat->cat_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="post_body">Body</label>
                    <textarea name="post_body" id="post_body" class="form-control" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="post_thumb">Post Thumbnail</label>
                    <input type="file" id="post_thumb">
                    <p class="help-block">Upload the post thumbnail.</p>
                </div>
                <input type="hidden" name="{{ $csrf['name'] }}" value="{{ $csrf['hash'] }}" />
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection