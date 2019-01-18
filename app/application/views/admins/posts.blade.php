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
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Posts List</h3>
                    </div>
                    @if ( !empty($_SESSION['success']) )
                        <div class="notifications" style="margin: 10px 15px;">
                            <div class="alert alert-success">{{ $_SESSION['success'] }}</div>
                        </div>
                    @endif
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Post Title</th>
                                    <th>Post Writter</th>
                                    <th>Category</th>
                                    <th>Comments</th>
                                    <th>Date</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $post)
                                    <tr>
                                        <td>{{ $post->post_title }}</td>
                                        <td><a href="{{ base_url() }}/admin/post/user/{{ $post->posted_by }}">{{ $post->name }}</a></td>
                                        <td><a href="{{ base_url() }}/admin/post/cat/{{ $post->post_cat }}">{{ $post->cat_name }}</a></td>
                                        <td>{{ $post->post_id }}</td>
                                        <td data-th="Lastrun" data-order="[unixTimestamp]">{{ date('d/m/Y', strtotime($post->created_at)) }}</td>
                                        <td><button class="btn btn-danger" onclick="deletePost({{ $post->post_id }})">X</button></td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Post Title</th>
                                    <th>Post Writter</th>
                                    <th>Category</th>
                                    <th>Comments</th>
                                    <th>Date</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        function deletePost(id) {
            if( confirm('Are you sure want to delete this post ?') ){
                window.location = '/admin/post/delete/' + id;
            }
        }
    </script>
@endsection