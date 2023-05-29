<!doctype html>
<html class="no-js" lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title id="changeunreadcount"><?php echo $__env->yieldContent('title'); ?></title>

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
      <?php echo $__env->yieldContent('meta_title'); ?>
      <link rel="shortcut icon" href="<?php echo e(asset('App_icon.png')); ?>">
      <link rel="stylesheet" href="<?php echo e(asset('adesign/vendors/bootstrap/dist/css/bootstrap.min.css')); ?>">
      <link rel="stylesheet" href="<?php echo e(asset('adesign/vendors/font-awesome/css/font-awesome.min.css')); ?>">
      <link rel="stylesheet" href="<?php echo e(asset('adesign/vendors/themify-icons/css/themify-icons.css')); ?>">
      <link rel="stylesheet" href="<?php echo e(asset('adesign/vendors/flag-icon-css/css/flag-icon.min.css')); ?>">
      <link rel="stylesheet" href="<?php echo e(asset('adesign/vendors/selectFX/css/cs-skin-elastic.css')); ?>">
      <link rel="stylesheet" href="<?php echo e(asset('adesign/vendors/jqvmap/dist/jqvmap.min.css')); ?>">
      <?php if(Session::get("is_rtl")==""||Session::get("is_rtl")=='1'): ?>
      <link rel="stylesheet" href="<?php echo e(asset('adesign/assets/css/style.css?v=9560')); ?>">
      <?php else: ?>
      <link rel="stylesheet" href="<?php echo e(asset('adesign/assets/css/rtl.css?v=dfgdgfd')); ?>">
      <?php endif; ?>
      <link href="<?php echo e(asset('fileupload/dist/css/jquery.dm-uploader.min.css')); ?>" rel="stylesheet">
      <link rel="stylesheet" href="<?php echo e(asset('front/css/app.min.css')); ?>">
      <input type="hidden" id="authid" value="<?php echo e(Auth::id()); ?>">
      <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

   </head>
   <body class="rtl" onload="gettimezone()">
       <?php echo $__env->make('front.firebase_config', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <aside id="left-panel" class="left-panel">
         <nav class="navbar navbar-expand-sm navbar-default">
            <div class="navbar-header">
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
               <i class="fa fa-bars"></i>
               </button>
               <a class="navbar-brand" href="<?php echo e(url('admin/dashboard')); ?>"><?php echo e(__('messages.Clinic')); ?></a>
               <a class="navbar-brand hidden" href="<?php echo e(url('admin/dashboard')); ?>"><?php echo e(__('messages.shortcode')); ?></a>
            </div>
            <div id="main-menu" class="main-menu collapse navbar-collapse admin-main-menu">
               <ul class="nav navbar-nav">
                  <li class="active">
                     <a href="<?php echo e(url('admin/dashboard')); ?>"> <i class="menu-icon fa fa-dashboard"></i><?php echo e(__('messages.Dashboard')); ?> </a>
                  </li>
                  <li class="active">
                     <a href="<?php echo e(url('admin/appointment/0/0')); ?>"> <i class="menu-icon fa fa-calendar"></i><?php echo e(__('messages.Appointment')); ?></a>
                  </li>
                   <li class="active">
                     <a href="<?php echo e(url('admin/tips')); ?>"> <i class="menu-icon fa fa-meetup"></i>Tips</a>
                  </li>
                  <li class="active">
                     <a href="<?php echo e(url('admin/doctor')); ?>"> <i class="menu-icon fa fa-user-md"></i><?php echo e(__('messages.Doctors')); ?></a>
                  </li>
                   <li class="active">
                     <a href="<?php echo e(url('admin/patient')); ?>"> <i class="menu-icon fa fa-user"></i><?php echo e(__('messages.Patient')); ?></a>
                  </li>
                  <li class="active">
                     <a href="<?php echo e(url('admin/package')); ?>"> <i class="menu-icon fa fa-user-md"></i><?php echo e(__('messages.Help Package')); ?></a>
                  </li>
                  <li class="active">
                     <a href="<?php echo e(url('admin/chat')); ?>"> <i class="menu-icon fa fa-comment"></i><?php echo e(__('messages.Chat')); ?> </a>
                  </li>
                  <li class="active">
                     <a href="<?php echo e(url('admin/gallery')); ?>"> <i class="menu-icon fa fa-file-image-o"></i><?php echo e(__('messages.Gallery')); ?></a>
                  </li>
                  <li class="active">
                     <a href="<?php echo e(url('admin/review')); ?>"> <i class="menu-icon fa fa-star"></i><?php echo e(__('messages.Review')); ?></a>
                  </li>
                   <li class="active">
                     <a href="<?php echo e(url('admin/subscription')); ?>"> <i class="menu-icon fa fa-gift"></i><?php echo e(__('messages.Subscription')); ?></a>
                  </li>
                  <li class="active">
                     <a href="<?php echo e(url('admin/news')); ?>"> <i class="menu-icon fa  fa-newspaper-o"></i><?php echo e(__('messages.news')); ?></a>
                  </li>
                  <li class="active">
                     <a href="<?php echo e(url('admin/contactus')); ?>"> <i class="menu-icon fa  fa-address-card"></i><?php echo e(__('messages.Contact Us')); ?></a>
                  </li>
                  <li class="active">
                     <a href="<?php echo e(url('admin/service')); ?>"> <i class="menu-icon fa fa-book"></i><?php echo e(__('messages.Facilities')); ?></a>
                  </li>

                  <li class="active">
                     <a href="<?php echo e(url('admin/department')); ?>"> <i class="menu-icon fa fa-eercast"></i><?php echo e(__('messages.Department')); ?></a>
                  </li>
                  <li class="active">
                     <a href="<?php echo e(url('admin/notification')); ?>"> <i class="menu-icon fa fa-bell"></i><?php echo e(__('messages.Notification')); ?></a>
                  </li>
                  <li class="active">
                     <a href="<?php echo e(url('admin/paymentgateway')); ?>"> <i class="menu-icon fa fa-money"></i><?php echo e(__('messages.Payment Gateway')); ?></a>
                  </li>
                  <li class="active">
                     <a href="<?php echo e(url('admin/setting/1')); ?>"> <i class="menu-icon fa fa-cogs"></i><?php echo e(__('messages.Setting')); ?></a>
                  </li>

               </ul>
            </div>
         </nav>
      </aside>
      <div id="right-panel" class="right-panel">
         <header id="header" class="header">
            <div class="header-menu">
               <div class="col-sm-7">
                  <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                  <div class="header-left">
                  </div>
               </div>
               <div class="col-sm-5">
                  <div class="user-area dropdown float-right">
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     <img class="user-avatar rounded-circle" src="<?php echo e(Session::get('profile_pic')); ?>" alt="User Avatar">
                     </a>
                     <div class="user-menu dropdown-menu">
                        <a class="nav-link" href="<?php echo e(url('admin/editprofile')); ?>"><i class="fa fa-user"></i> <?php echo e(__('messages.My Profile')); ?></a>
                        <a class="nav-link" href="<?php echo e(url('admin/changepassword')); ?>"><i class="fa fa-user"></i> <?php echo e(__('messages.Change password')); ?></a>
                        <a class="nav-link" href="javascript:logout()"><i class="fa fa-power-off"></i> <?php echo e(__('messages.Logout')); ?></a>
                     </div>
                  </div>
               </div>
            </div>
         </header>
         <?php echo $__env->yieldContent('content'); ?>
      </div>
      <div id="chat_new" class="modal" >
                <div class="modal-dialog modal-md modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title"><?php echo e(__("messages.Search Doctor")); ?></h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                        	<div class="input-group">
                                <input type="text" class="form-control search border-right-0 transparent-bg pr-0" id="search-contact1" placeholder="Search users...">
                                    <div class="input-group-append">
                                        <div class="input-group-text transparent-bg border-left-0" role="button">
                                            <svg class="hw-20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                            </svg>
                                        </div>
                                    </div>
                            </div>
                            <div class="sidebar-body" id="chatsidebar1">
                                <ul class="user-list" id="userchatlistall" style="padding: 15px;list-style: none;height: 375px;overflow-y: auto;">
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="chat_new" class="modal" >
                <div class="modal-dialog modal-md modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title"><?php echo e(__('messages.Search')); ?></h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                        	<div class="input-group">
                                <input type="text" class="form-control search border-right-0 transparent-bg pr-0" id="search-contact1" placeholder="Search users...">
                                    <div class="input-group-append">
                                        <div class="input-group-text transparent-bg border-left-0" role="button">
                                            <svg class="hw-20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                            </svg>
                                        </div>
                                    </div>
                            </div>
                            <div class="sidebar-body" id="chatsidebar1">
                                <ul class="user-list" id="userchatlistall" style="padding: 15px;list-style: none;height: 375px;overflow-y: auto;">
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
      <!-- <div class="notification">
        <section class="logo">
            <div id="face" >
                <img id="notificationimg" src="<?php echo e(asset('upload/profile/profile.png')); ?>" class="notificationimg">
            </div>
        </section>
        <section class="body">
            <span class="title"></span>
            <p class="message"></p>
        </section>
    </div> -->
      <input type="hidden" id="site_url" value="<?php echo e(url('/')); ?>" />
      <input type="hidden" id="siteurl" value="<?php echo e(url('/')); ?>" />
      <input type="hidden" id="admin_url" value="<?php echo e(url('/admin')); ?>" />
      <input type="hidden" id="own_url" value="<?php echo e(url('admin')); ?>" />
      <input type="hidden" id="currentusername" value="<?php echo e(Auth::user()->name); ?>">
      <input type="hidden" id="mycurrentuser" value="<?php echo e(Auth::user()->id); ?>">
     <input type="hidden" id="authprofile" value="<?php echo e(Session::get('profile_pic_path')); ?>">
      <input type="hidden" id="usertype" value="<?php echo e(Auth::user()->usertype); ?>">
      <input type="hidden" id="site_type" value="<?php echo e(Session::get('is_demo')); ?>">
      <input type="hidden" id="delete_msg" value="<?php echo e(__('messages.Are sure want to delete this row')); ?>"/>
      <input type="hidden" id="samepwd" value="<?php echo e(__('messages.New password and Re enter password must be same')); ?>">
      <input type="hidden" id="incorrectpwd" value="<?php echo e(__('messages.Please Enter Correct Password')); ?>">
      <input type="hidden" id="invaildimg" value="<?php echo e(__('messages.Image Size Invaild')); ?>">
      <input type="hidden" id="chkworkingtime" value="<?php echo e(__('messages.Please Check You Working Time')); ?>"/>
      <input type="hidden" id="seldate" value="<?php echo e(__('messages.Please Select Date')); ?>">

       <script type="text/javascript" src="<?php echo e(asset('ckeditor/ckeditor.js')); ?>"></script>
      <script type="text/javascript" src="<?php echo e(asset('js/script.js')); ?>"></script>
      <script src="<?php echo e(asset('adesign/vendors/jquery/dist/jquery.min.js')); ?>"></script>
      <script src="<?php echo e(asset('adesign/vendors/popper.js/dist/umd/popper.min.js')); ?>"></script>
      <script src="<?php echo e(asset('adesign/vendors/bootstrap/dist/js/bootstrap.min.js')); ?>"></script>
      <script src="<?php echo e(asset('adesign/assets/js/main.js')); ?>"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
      <script src="<?php echo e(asset('adesign/vendors/datatables.net/js/jquery.dataTables.min.js')); ?>"></script>
      <script src="<?php echo e(asset('adesign/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js')); ?>"></script>
      <script src="<?php echo e(asset('adesign/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')); ?>"></script>
      <script src="<?php echo e(asset('adesign/vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')); ?>"></script>
      <script src="<?php echo e(asset('adesign/vendors/jszip/dist/jszip.min.js')); ?>"></script>
      <script src="<?php echo e(asset('adesign/vendors/pdfmake/build/pdfmake.min.js')); ?>"></script>
      <script src="<?php echo e(asset('adesign/vendors/pdfmake/build/vfs_fonts.js')); ?>"></script>
      <script src="<?php echo e(asset('adesign/vendors/datatables.net-buttons/js/buttons.html5.min.js')); ?>"></script>
      <script src="<?php echo e(asset('adesign/vendors/datatables.net-buttons/js/buttons.print.min.js')); ?>"></script>
      <script src="<?php echo e(asset('adesign/vendors/datatables.net-buttons/js/buttons.colVis.min.js')); ?>"></script>
      <script src="<?php echo e(asset('fileupload/dist/js/jquery.dm-uploader.min.js')); ?>"></script>
      <script src="<?php echo e(asset('fileupload/demo/demo-ui.js')); ?>"></script>
      <script src="<?php echo e(asset('fileupload/demo/demo-config.js?v=296')); ?>"></script>
      <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
      <script src="https://cdn.jsdelivr.net/npm/@joeattardi/emoji-button@3.0.3/dist/index.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>

      <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.23/moment-timezone-with-data-2012-2022.min.js"></script>


      <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

      <script src="<?php echo e(asset('js/admin.js?v=1333324')); ?>"></script>
       <?php echo $__env->yieldContent('footer'); ?>

   </body>
</html>
<?php /**PATH E:\freelance laravel\helping-hand\resources\views/admin/layout.blade.php ENDPATH**/ ?>