<?php $__env->startPush('scripts'); ?>
    <script src="<?php echo e(asset('assets/js/cleave.min.js')); ?>"></script>
    <script>
        $('.select').select2({
            placeholder: 'Select...',
            closeOnSelect: false,
        });

        $('.select').val(null);

        // Numeral Formatting
        const sourceAmount = new Cleave('#loan_amount', {
            numeral: true,
            numeralThousandsGroupStyle: 'thousand'
        });
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\xampp\htdocs\blazeyusufloan\resources\views/form/loan/script.blade.php ENDPATH**/ ?>