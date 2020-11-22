<?php $__env->startSection('title', 'Üye ' . $username); ?>

<?php $__env->startSection('content'); ?>
<h3>
    Hoşgeldin, <?php echo e($username); ?>

</h3>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/prototurk-mvc/public/views/index.blade.php ENDPATH**/ ?>