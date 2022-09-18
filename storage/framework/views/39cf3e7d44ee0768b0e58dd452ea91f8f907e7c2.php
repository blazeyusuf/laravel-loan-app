<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<!--begin::Head-->

<head>
    <meta charset="utf-8" />
    <meta name="description"
        content="Banks charge a lot for overseas transfers. We don't. Transfer money abroad easily and quickly with our low cost money transfers." />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="author" content="Anthony Joboy (+2349035547107)" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="<?php echo e(config('app.name')); ?>" />
    <meta name="copyright" content="Loan App Demo. All Rights Reserved" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo $__env->yieldContent('title'); ?> | <?php echo e(config('app.name')); ?></title>
    <link rel="shortcut icon" href="<?php echo e(asset('assets/media/logos/icon.png')); ?>" />

    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="<?php echo e(asset('assets/plugins/global/plugins.bundle.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('assets/css/style.bundle.css')); ?>" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->

    <?php if(Route::has('client.home') || Route::has('administrator.home')): ?>
        <link href="<?php echo e(asset('assets/plugins/custom/datatables/dataTables.bs4.css')); ?>" rel="stylesheet"
            type="text/css" />
        <link href="<?php echo e(asset('assets/plugins/custom/datatables/dataTables.bs4-custom.css')); ?>" rel="stylesheet"
            type="text/css" />
    <?php endif; ?>

    <?php echo $__env->yieldPushContent('styles'); ?>
</head>
<!--end::Head-->

<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled">
    <?php echo $__env->make('layouts.partials._messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!--begin::Main-->
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Page-->
        <div class="page d-flex flex-row flex-column-fluid">
            <!--begin::Wrapper-->
            <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                <?php echo $__env->make('layouts.partials._header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo $__env->yieldContent('content'); ?>
                <?php echo $__env->make('layouts.partials._footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>
    <!--end::Root-->
    <!--end::Main-->
    <!--begin::Javascript-->
    <!--begin::Global Javascript Bundle(used by all pages)-->
    <script src="<?php echo e(asset('assets/plugins/global/plugins.bundle.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/scripts.bundle.js')); ?>"></script>
    <?php if(Route::has('client.home') || Route::has('administrator.home')): ?>
        <script src="<?php echo e(asset('assets/plugins/custom/datatables/dataTables.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/plugins/custom/datatables/dataTables.bootstrap.min.js')); ?>"></script>
    <?php endif; ?>
    <script src="<?php echo e(asset('assets/js/general.js')); ?>"></script>
    <!--end::Global Javascript Bundle-->
    <!--begin::Page Custom Javascript(used by this page)-->
    <?php echo $__env->yieldPushContent('scripts'); ?>
    <!--end::Page Custom Javascript-->
    <!--end::Javascript-->
</body>
<!--end::Body-->

</html>
<?php /**PATH C:\xampp\htdocs\blazeyusufloan\resources\views/layouts/app.blade.php ENDPATH**/ ?>