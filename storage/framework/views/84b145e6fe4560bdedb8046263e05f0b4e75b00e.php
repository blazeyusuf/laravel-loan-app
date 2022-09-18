<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<!--begin::Head-->
<head>
    <meta charset="utf-8" />
    <meta name="description" content="Banks charge a lot for overseas transfers. We don't. Transfer money abroad easily and quickly with our low cost money transfers." />
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
</head>
<!--end::Head-->

<body id="kt_body" class="bg-body">
    <?php echo $__env->make('layouts.partials._messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!--begin::Main-->
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root">
        <?php echo $__env->yieldContent('content'); ?>
    </div>
    <!--end::Root-->
    <!--end::Main-->
    <!--begin::Javascript-->
    <!--begin::Global Javascript Bundle(used by all pages)-->
    <script src="<?php echo e(asset('assets/plugins/global/plugins.bundle.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/scripts.bundle.js')); ?>"></script>

    <!--end::Global Javascript Bundle-->
    <!--begin::Page Custom Javascript(used by this page)-->
    <?php if(Route::has('register')): ?>
        <script src="<?php echo e(asset('assets/js/custom/authentication/sign-up/general.js')); ?>"></script>
    <?php else: ?>
        <script src="<?php echo e(asset('assets/js/custom/authentication/sign-in/general.js')); ?>"></script>
    <?php endif; ?>
    <script>
        /**
         * @description Display session message with Sweet Alert
         * @param string message
         * @param string type
         *
         * @returns toast
         */
        //Feedback from session message to be displayed with Sweet Alert
        function displayMessage(message, type) {
            const Toast = swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 8000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener("mouseenter", Swal.stopTimer);
                    toast.addEventListener("mouseleave", Swal.resumeTimer);
                },
            });
            Toast.fire({
                icon: type,
                //   type: 'success',
                title: message,
            });
        }
    </script>
    <?php echo $__env->yieldPushContent('scripts'); ?>
    <!--end::Page Custom Javascript-->
    <!--end::Javascript-->
</body>
<!--end::Body-->
</html>
<?php /**PATH C:\xampp\htdocs\blazeyusufloan\resources\views/layouts/auth.blade.php ENDPATH**/ ?>