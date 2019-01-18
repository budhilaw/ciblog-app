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
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Create a post</h3>
        </div>
        <?php if( !empty($_SESSION['success']) ): ?>
            <div class="notifications" style="margin: 10px 15px;">
                <div class="alert alert-success"><?php echo e($_SESSION['success']); ?></div>
            </div>
        <?php endif; ?>
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
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($cat->cat_id); ?>"><?php echo e($cat->cat_name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                <input type="hidden" name="<?php echo e($csrf['name']); ?>" value="<?php echo e($csrf['hash']); ?>" />
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>