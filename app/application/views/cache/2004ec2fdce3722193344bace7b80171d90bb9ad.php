<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="post-preview">
                        <a href="/post/<?php echo e($post->post_slug); ?>">
                            <h2 class="post-title"><?php echo e($post->post_title); ?></h2>
                            <h3 class="post-subtitle"><?php echo word_limiter($post->post_body, 20, '..');?></h3>
                        </a>
                        <p class="post-meta">Posted by
                            <a href="#"><?php echo e($post->name); ?></a>
                            on <?php echo date('F d, Y', strtotime($post->created_at));?>
                        </p>
                    </div>
                    <hr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <!-- Pager -->
                <div class="clearfix">
                    <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>