<?php $__env->startSection('title', 'Makale - ' . $article_title); ?>

<?php $__env->startSection('content'); ?>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title"><?php echo e($article_title); ?></h5>
            <?php echo e(htmlspecialchars_decode($article_text)); ?>

        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/prototurk-mvc/public/views/article.blade.php ENDPATH**/ ?>