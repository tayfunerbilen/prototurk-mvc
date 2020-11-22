<?php $__env->startSection('title', 'Makaleler'); ?>

<?php $__env->startSection('content'); ?>

    <h3>
        Makaleler
    </h3>

    <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="card">
            <div class="card-header">
                Featured
            </div>
            <div class="card-body">
                <h5 class="card-title"><?php echo e($article->article_title); ?></h5>
                <a href="<?php echo e(url('article', ['url' => $article->article_url])); ?>" class="btn btn-primary">Görüntüle</a>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/prototurk-mvc/public/views/articles.blade.php ENDPATH**/ ?>