<?php $__env->startSection('title'); ?>
<?php echo e(__('messages.Save Department')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="breadcrumbs">
   <div class="col-sm-4">
      <div class="page-header float-left">
         <div class="page-title">
            <h1><?php echo e(__('messages.Save Department')); ?></h1>
         </div>
      </div>
   </div>
   <div class="col-sm-8">
      <div class="page-header float-right">
         <div class="page-title">
            <ol class="breadcrumb text-right">
               <li><a href="<?php echo e(url('admin/department')); ?>"><?php echo e(__('messages.Department')); ?></a></li>
               <li class="active"><?php echo e(__('messages.Save Department')); ?></li>
            </ol>
         </div>
      </div>
   </div>
</div>
<div class="content mt-3">
   <div class="animated fadeIn">
      <div class="row rowcenter">
         <div class="col-md-9">
            <div class="card">
               <div class="card-body">
                  <?php if(Session::has('message')): ?>
                  <div class="col-sm-12">
                     <div class="alert  <?php echo e(Session::get('alert-class', 'alert-info')); ?> alert-dismissible fade show" role="alert"><?php echo e(Session::get('message')); ?>

                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                     </div>
                  </div>
                  <?php endif; ?>
                  <?php if($errors->any()): ?>
                  <div class="alert alert-danger">
                     <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     </ul>
                  </div>
                  <?php endif; ?>
                  <form action="<?php echo e(url('admin/updatedepartment')); ?>" method="post" novalidate="novalidate" enctype="multipart/form-data">
                     <?php echo e(csrf_field()); ?>

                     <input type="hidden" name="id" id="id" value="<?php echo e($department_id); ?>"/>
                     <input type="hidden" name="real_image" id="real_image" value="<?php echo e(isset($data->image)?$data->image:''); ?>"/>
                     <div class="form-group">
                        <label for="name" class=" form-control-label">
                        <?php echo e(__('messages.Name')); ?>

                        <span class="reqfield">*</span>
                        </label>
                        <input type="text" id="name" placeholder="<?php echo e(__('messages.Enter').' '.__('messages.Department Name')); ?>" class="form-control" required name="name" value="<?php echo e(isset($data->name)?$data->name:''); ?>">
                     </div>
                     <div class="form-group">
                        <label for="name" class=" form-control-label">
                        <?php echo e(__('messages.Emergency No')); ?>

                        <span class="reqfield" >*</span>
                        </label>
                        <input type="text" id="emergency_no" placeholder="<?php echo e(__('messages.Enter').' '.__('messages.Emergency No')); ?>" class="form-control" required name="emergency_no" value="<?php echo e(isset($data->emergency_no)?$data->emergency_no:''); ?>">
                     </div>
                     <div class="form-group">
                        <label for="email" class=" form-control-label">
                        <?php echo e(__('messages.Description')); ?><span class="reqfield" >*</span>
                        </label>
                        <textarea required id="description" name="description"  class="form-control"><?php echo e(isset($data->description)?$data->description:''); ?></textarea>
                     </div>
                     <div class="form-group">
                        <label for="file" class=" form-control-label">
                        <?php echo e(__('messages.Image')); ?><span class="reqfield" >*</span>
                        </label>
                        <?php if($department_id!=0): ?>
                        <img src="<?php echo e(asset('upload/department').'/'.$data->image); ?>" class="imgsize1 departmentimg"/>
                        <?php endif; ?>
                        <div>
                           <input type="file" id="file" name="image" class="form-control-file" accept="image/*">
                        </div>
                     </div>
                     <div>
                        <?php if(Session::get("is_demo")=='1'): ?>
                           <button id="payment-button" type="button"  onclick="disablebtn()" class="btn btn-lg btn-info" >
                              <?php echo e(__('messages.Submit')); ?>

                              </button>
                        <?php else: ?>
                            <button id="payment-button" type="submit" class="btn btn-lg btn-info" >
                              <?php echo e(__('messages.Submit')); ?>

                              </button>
                        <?php endif; ?>

                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\freelance laravel\helping-hand\resources\views/admin/department/savedepartment.blade.php ENDPATH**/ ?>