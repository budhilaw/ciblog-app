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

        <form method="post" action="/admin/user/add/store">
            <div class="box-body">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Name">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Email">
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" class="form-control" id="username" placeholder="Username">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="confirm_password">Password Confirmation</label>
                    <input type="password" name="confirm_password" class="form-control" id="confirm_password" placeholder="Password Confirmation">
                </div>
                <div class="form-group">
                    <label for="profile_picture">Profile Picture</label>
                    <input type="file" id="profile_picture">
                    <p class="help-block">Upload your profile picture.</p>
                </div>
                <input type="hidden" name="{{ $csrf['name'] }}" value="{{ $csrf['hash'] }}" />
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection