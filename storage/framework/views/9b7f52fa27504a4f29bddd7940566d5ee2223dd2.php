
<?php if($message = Session::get('success')): ?>
    <?php $__env->startPush('scripts'); ?>
        <script>
            var message = '<?php echo e($message); ?>';
            var type = 'success';
            displayMessage(message, type);
        </script>
    <?php $__env->stopPush(); ?>
<?php endif; ?>


<?php if(Session::has('warning')): ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Something went wrong!</strong> <?php echo e(Session::get('warning')); ?>

        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span>&times;</span>
        </button>
    </div>
<?php endif; ?>


<?php if($errors->any()): ?>
    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php $__env->startPush('scripts'); ?>
            <script>
                var message = '<?php echo e($error); ?>';
                var type = 'error';
                displayMessage(message, type);
            </script>
        <?php $__env->stopPush(); ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>

<?php if($message = Session::get('error')): ?>
    <?php $__env->startPush('scripts'); ?>
        <script>
            var message = '<?php echo e($message); ?>';
            var type = 'error';
            displayMessage(message, type);
        </script>
    <?php $__env->stopPush(); ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\blazeyusufloan\resources\views/layouts/partials/_messages.blade.php ENDPATH**/ ?>