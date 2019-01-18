<?php $__env->startSection('content_header'); ?>
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('info'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Posts List</h3>
                    </div>
                    <?php if( !empty($_SESSION['success']) ): ?>
                        <div class="notifications" style="margin: 10px 15px;">
                            <div class="alert alert-success"><?php echo e($_SESSION['success']); ?></div>
                        </div>
                    <?php endif; ?>
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
                                <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($post->post_title); ?></td>
                                        <td><a href="<?php echo e(base_url()); ?>/admin/post/user/<?php echo e($post->posted_by); ?>"><?php echo e($post->name); ?></a></td>
                                        <td><a href="<?php echo e(base_url()); ?>/admin/post/cat/<?php echo e($post->post_cat); ?>"><?php echo e($post->cat_name); ?></a></td>
                                        <td><?php echo e($post->post_id); ?></td>
                                        <td data-th="Lastrun" data-order="[unixTimestamp]"><?php echo e(date('d/m/Y', strtotime($post->created_at))); ?></td>
                                        <td><button class="btn btn-danger" onclick="deletePost(<?php echo e($post->post_id); ?>)">X</button></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>