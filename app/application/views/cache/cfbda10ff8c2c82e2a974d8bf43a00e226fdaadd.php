<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CiBlog - <?php echo e($title); ?></title>

    <!-- Vendors -->
    <link rel="stylesheet" href="<?php echo base_url();?>public/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url();?>public/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url();?>public/css/clean-blog.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="https://getbootstrap.com/docs/4.2/assets/brand/bootstrap-solid.svg" width="30" height="30" class="d-inline-block align-top" alt="">
                CiBlog
            </a>
            <button type="button" class="btn btn-sm align-middle btn-success ml-3 order-lg-last" onclick="window.location = '/login'">Login</button>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Series</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Podcast</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Course</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About us</a>
                    </li>
                </ul>
            </div>

            <div class="nav-right-new collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <i class="fas fa-search"></i>
                    </li>
                </ul>
            </div>

        </div>
    </nav>
    <section class="blog-featured" style="background-image: url('<?php echo base_url();?>public/images/bg-1.jpg')">
        <div class="container container-featured white">
            <div class="feature-contents">
                <p class="cat-feature">
                    <a href="#">Featured Article</a>
                </p>
                <h2>
                    <a href="#" class="link title-feature">The Value of Face Time in a Remote Company</a>
                </h2>
            </div>
        </div>
    </section>
    <div class="page_content">
        <div class="container">
            <div class="main_content d-flex flex-row align-items-center justify-content-start">
                <div class="section_title">Don't Miss</div>
                <div class="section_tags ml-auto">
                    <ul>
                        <li class="active"><a href="#">All</a></li>
                        <li><a href="#">PHP</a></li>
                        <li><a href="#">Javascript</a></li>
                        <li><a href="#">Python</a></li>
                        <li><a href="#">Golang</a></li>
                    </ul>
                </div>
                <div class="section_panel_more">
                    <ul>
                        <li>More
                            <ul>
                                <li><a href="#">PHP</a></li>
                                <li><a href="#">Javascript</a></li>
                                <li><a href="#">Python</a></li>
                                <li><a href="#">Golang</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <?php echo $__env->yieldContent('content'); ?>

    <!-- Vendors -->
    <script src="<?php echo base_url();?>public/js/jquery.min.js"></script>
    <script src="<?php echo base_url();?>public/js/umd.popper.js"></script>
    <script src="<?php echo base_url();?>public/js/bootstrap.min.js"></script>
</body>
</html>