
<?php $__env->startSection('title'); ?>
404
<?php $__env->stopSection(); ?>
<?php $__env->startSection('loader'); ?>
<div id="overlayer"></div><span class="loader"><span class="loader-inner"></span></span>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <style>
        @import  url("https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap");



.gif {
  display: flex;
  justify-content: center;
}

.content {
  text-align: center;
  margin: 3rem 0;
}

.content .main-heading {
  font-size: 2.5rem;
  font-weight: 700;
}
p {
  font-size: 1.3rem;
  padding: 0.7rem 0;
}

button {
  padding: 1rem;
  border-radius: 15px;
  outline: none;
  border: none;
  background: #0046d4;
  color: #fff;
  font-size: 1.3rem;
  cursor: pointer;
}
.departmentpg-main-box {
    margin: 200px 0px;
}

    </style>
    <script
      src="https://kit.fontawesome.com/66aa7c98b3.js"
      crossorigin="anonymous"
    ></script>
 
    <div class="container">
     <div class="departmentpg-main-box">
          <div class="content">
          <h1> 404</h1>
        <h1 class="main-heading"><?php echo e(__("messages.This page is gone")); ?></h1>
        <p>
          ...<?php echo e(__("messages.maybe the page you're looking for is not found or never existed")); ?>

        </p>
        
      </div>
     </div>
     
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\project\company\blank_script\blank_singleclinic_web\singleclinic\resources\views/errors/404.blade.php ENDPATH**/ ?>