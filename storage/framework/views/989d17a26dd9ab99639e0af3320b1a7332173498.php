<!doctype html>
<html class="no-js" lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title><?php echo e(__('messages.Clinic Admin login')); ?></title>
      <meta name="description" content="<?php echo e(__('messages.meta_description_admin')); ?>">
      <meta name="title" content="<?php echo e(__('messages.meta_title_admin')); ?>">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta property="og:type" content="website"/>
      <meta property="og:url" content="<?php echo e(url('/')); ?>"/>
      <meta property="og:title" content="<?php echo e(__('messages.site name')); ?>"/>
      <meta property="og:image" content="<?php echo e(asset('App_icon.png')); ?>"/>
      <meta property="og:image:width" content="250px"/>
      <meta property="og:image:height" content="250px"/>
      <meta property="og:site_name" content="<?php echo e(__('messages.site name')); ?>"/>
      <meta property="og:description" content="<?php echo e(__('messages.meta_description_admin')); ?>"/>
      <meta property="og:keyword" content="<?php echo e(__('messages.meta_keyword')); ?>"/>
      <link rel="apple-touch-icon" href="apple-icon.png">
      <link rel="shortcut icon" href="<?php echo e(asset('App_icon.png')); ?>">
      <link rel="stylesheet" href="<?php echo e(asset('adesign/vendors/bootstrap/dist/css/bootstrap.min.css')); ?>">
      <link rel="stylesheet" href="<?php echo e(asset('adesign/vendors/font-awesome/css/font-awesome.min.css')); ?>">
      <link rel="stylesheet" href="<?php echo e(asset('adesign/vendors/themify-icons/css/themify-icons.css')); ?>">
      <link rel="stylesheet" href="<?php echo e(asset('adesign/vendors/flag-icon-css/css/flag-icon.min.css')); ?>">
      <link rel="stylesheet" href="<?php echo e(asset('adesign/vendors/selectFX/css/cs-skin-elastic.css')); ?>">
      <?php if(Session::get("is_rtl")==""||Session::get("is_rtl")=='1'): ?>
        <link rel="stylesheet" href="<?php echo e(asset('adesign/assets/css/style.css')); ?>">
      <?php else: ?>
      <link rel="stylesheet" href="<?php echo e(asset('adesign/assets/css/rtl.css?v=2')); ?>">
      <?php endif; ?>
      <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
   </head>
   <body class="bg-dark" onload="gettimezone()">
      <div class="sufee-login d-flex align-content-center flex-wrap">
         <div class="container">
            <div class="login-content">
               <div class="login-logo">
                  <a href="index.html">
                  <span><?php echo e(__('messages.site name')); ?></span>
                  <?php if($type==2): ?>
                      <span><?php echo e(__('messages.Admin')); ?></span>
                  <?php else: ?>
                     <span><?php echo e(__('messages.Doctors')); ?></span>
                  <?php endif; ?>

                  </a>
               </div>
               <div class="login-form">
                  <div id="respond" class="comment-respond">
                     <?php if(Session::has('message')): ?>
                     <div class="col-sm-12">
                        <div class="alert  <?php echo e(Session::get('alert-class', 'alert-info')); ?> alert-dismissible fade show" role="alert"><?php echo e(Session::get('message')); ?>

                           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                           </button>
                        </div>
                     </div>
                     <?php endif; ?>
                  </div>
                  <form action="<?php echo e(url('admin/postlogin')); ?>" method="post">
                     <?php echo e(csrf_field()); ?>

                     <input type="hidden" name="type" value="<?php echo e($type); ?>"/>
                     <div class="form-group">
                        <label><?php echo e(__('messages.Email')); ?></label>
                         <?php if($type==3): ?>
                        <input type="email" class="form-control" name="email"  id="email" placeholder="<?php echo e(__('messages.Enter').' '.__('messages.Email')); ?>" value="<?php echo e(isset($_COOKIE['email'])?$_COOKIE['email']:'pol@gmail.com'); ?>">
                        <?php else: ?>
                        <input type="email" class="form-control" name="email"  id="email" placeholder="<?php echo e(__('messages.Enter').' '.__('messages.Email')); ?>" value="<?php echo e(isset($_COOKIE['email'])?$_COOKIE['email']:'admin@gmail.com'); ?>">
                        <?php endif; ?>
                     </div>
                     <div class="form-group">
                         <?php if($type==3): ?>
                        <label><?php echo e(__('messages.Password')); ?></label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="<?php echo e(__('messages.Enter').' '.__('messages.Password')); ?>" value="<?php echo e(isset($_COOKIE['password'])?$_COOKIE['password']:'123'); ?>">
                        <?php else: ?>
                         <input type="password" class="form-control" name="password" id="password" placeholder="<?php echo e(__('messages.Enter').' '.__('messages.Password')); ?>" value="<?php echo e(isset($_COOKIE['password'])?$_COOKIE['password']:'123'); ?>">
                        <?php endif; ?>
                     </div>
                     <div class="checkbox">
                        <label>
                        <input type="checkbox" id="rem_me" name="rem_me" value="1" <?php echo isset($_COOKIE['rem_me']) ? "checked" : ''; ?>> <?php echo e(__('messages.Remember Me')); ?>

                        </label>
                     </div>
                     <?php if($type==2): ?>
                         <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30"><?php echo e(__('messages.Admin').' '.__('messages.Sign in')); ?></button>
                         <a href="<?php echo e(url('doctor/')); ?>" class="btn btn-secondary btn-flat m-b-30 m-t-30 signin" ><?php echo e(__('messages.Doctors').' '.__('messages.Sign in')); ?></a>
                     <?php else: ?>
                         <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30"><?php echo e(__('messages.Doctors').' '.__('messages.Sign in')); ?></button>
                         <a href="<?php echo e(url('admin/')); ?>" class="btn btn-secondary btn-flat m-b-30 m-t-30 signin"><?php echo e(__('messages.Admin').' '.__('messages.Sign in')); ?></a>
                     <?php endif; ?>

                  </form>
               </div>
            </div>
         </div>
      </div>
      <input type="hidden" id="site_url" value="<?php echo e(url('/')); ?>" />
      <script src="<?php echo e(asset('adesign/vendors/jquery/dist/jquery.min.js')); ?>"></script>
      <script src="<?php echo e(asset('adesign/vendors/popper.js/dist/umd/popper.min.js')); ?>"></script>
      <script src="<?php echo e(asset('adesign/vendors/bootstrap/dist/js/bootstrap.min.js')); ?>"></script>
      <script src="<?php echo e(asset('adesign/assets/js/main.js')); ?>"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
      <script src="<?php echo e(asset('adesign/vendors/datatables.net/js/jquery.dataTables.min.js')); ?>"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
      <script src="<?php echo e(asset('js/admin.js?v=88')); ?>"></script>
   </body>
</html>
<?php /**PATH E:\freelance laravel\helping-hand\resources\views/admin/login.blade.php ENDPATH**/ ?>