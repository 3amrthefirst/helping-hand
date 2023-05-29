
<?php $__env->startSection('title'); ?>
<?php echo e(__('messages.Dashboard')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="breadcrumbs">
   <div class="col-sm-4">
      <div class="page-header float-left">
         <div class="page-title">
            <h1><?php echo e(__('messages.Dashboard')); ?></h1>
         </div>
      </div>
   </div>
   <div class="col-sm-8">
      <div class="page-header float-right">
         <div class="page-title">
            <ol class="breadcrumb text-right">
               <li class="active"><?php echo e(__('messages.Dashboard')); ?></li>
            </ol>
         </div>
      </div>
   </div>
</div>
<div class="content mt-3">
<div class="col-xl-3 col-lg-6">
   <div class="card">
      <a href="<?php echo e(url('admin/appointment/0/0')); ?>"><div class="card-body">
         <div class="stat-widget-one">
            <div class="stat-icon dib"><i class="fa fa-ambulance  text-primary border-primary"></i></div>
            <div class="stat-content dib">
               <div class="stat-text"><?php echo e(__('messages.Total')); ?></div>
			   <div class="stat-text"><?php echo e(__('messages.Appointment')); ?></div>
               <div class="stat-digit"><?php echo e($totaldoctor); ?></div>
            </div>
         </div>
      </div></a>
   </div>
</div>
<div class="col-xl-3 col-lg-6">
   <div class="card">
     <a href="<?php echo e(url('admin/department')); ?>"> <div class="card-body">
         <div class="stat-widget-one">
            <div class="stat-icon dib"><i class="ti-layout-grid2  text-success border-success"></i></div>
            <div class="stat-content dib">
               <div class="stat-text"><?php echo e(__('messages.Total')); ?></div>
               <div class="stat-text"><?php echo e(__('messages.Department')); ?>

               </div>
               <div class="stat-digit"><?php echo e($totaldepartment); ?></div>
            </div>
         </div>
      </div></a>
   </div>
</div>
<div class="col-xl-3 col-lg-6">
   <div class="card">
      <a href="<?php echo e(url('admin/service')); ?>"><div class="card-body">
         <div class="stat-widget-one">
            <div class="stat-icon dib"><i class="ti-book  text-warning border-warning"></i></div>
            <div class="stat-content dib">
               <div class="stat-text"><?php echo e(__('messages.Total')); ?></div>
               <div class="stat-text"><?php echo e(__('messages.Facilities')); ?></div>
               <div class="stat-digit"><?php echo e($totalservice); ?></div>
            </div>
         </div>
      </div></a>
   </div>
</div>
<div class="col-xl-3 col-lg-6">
   <div class="card">
     <a href="<?php echo e(url('admin/doctor')); ?>"> <div class="card-body">
         <div class="stat-widget-one">
            <div class="stat-icon dib"><i class="fa fa-user-md  text-danger border-danger"></i></div>
            <div class="stat-content dib">
               <div class="stat-text"><?php echo e(__('messages.Total')); ?></div>
               <div class="stat-text"><?php echo e(__('messages.Doctors')); ?></div>
               <div class="stat-digit"><?php echo e($totaldoctor); ?></div>
            </div>
         </div>
      </div></a>
   </div>
</div>
<div class="col-md-12 flt">
   <div class="row">
      <div class="col-md-12 col-xl-6 col-12 flat-r">
         <div class="card">
            <div class="card-body">
               <h4 class="orderh4">
                  <i class="fa fa-ambulance" aria-hidden="true"></i><?php echo e(__('messages.Latest').' '.__('messages.Appointment')); ?> 
                  <a class="btn btn-primary btn-flat m-b-30 m-t-30 elec textorder" href="<?php echo e(url('admin/appointment/0/0')); ?>"><?php echo e(__('messages.Show All')); ?></a>
               </h4>
               <div class="table-responsive dtdiv">
                  <table id="latestorderTable" class="table table-striped dttablewidth">
                     <thead>
                        <tr>
                           <th><?php echo e(__('messages.Id')); ?></th>
                           <th><?php echo e(__('messages.Doctor').' '.__('messages.Name')); ?></th>
                           <th><?php echo e(__('messages.Patient').' '.__('messages.Name')); ?></th>
                           <th><?php echo e(__('messages.Department').' '.__('messages.Name')); ?></th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php if(count($leastappointment)>0): ?>
                            <?php $__currentLoopData = $leastappointment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <tr>
                                     <td><?php echo e($d->id); ?></td>
                                     <td><?php echo e(isset($d->doctors)?$d->doctors->name:""); ?></td>
                                     <td><?php echo e(isset($d->name)?$d->name:""); ?></td>
                                     <td><?php echo e(isset($d->department)?$d->department->name:""); ?></td>
                                  </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
      <div class="col-md-12 col-xl-6 col-12 flat-r">
         <div class="card">
            <div class="card-body">
               <h4 class="orderh4">
                  <i class="fa fa-comments-o" aria-hidden="true"></i><?php echo e(__('messages.Latest').' '.__('messages.Review')); ?>

                  <a class="btn btn-primary btn-flat m-b-30 m-t-30 elec textorder" href="<?php echo e(url('admin/review')); ?>"><?php echo e(__('messages.Show All')); ?></a>
               </h4>
               <div class="table-responsive dtdiv">
                  <table id="myTablereview" class="table table-striped dttablewidth">
                     <thead>
                        <tr>
                           <th><?php echo e(__('messages.Id')); ?></th>
                           <th><?php echo e(__('messages.Doctor').' '.__('messages.Name')); ?></th>
                           <th><?php echo e(__('messages.Patient').' '.__('messages.Name')); ?></th>
                           <th><?php echo e(__('messages.Ratting')); ?></th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php if(count($leastreview)>0): ?>
                            <?php $__currentLoopData = $leastreview; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                   <th><?php echo e($d->id); ?></th>
                                   <td><?php echo e(isset($d->doctors)?$d->doctors->name:""); ?></td>
                                   <td><?php echo e(isset($d->users)?$d->users->name:""); ?></td>
                                   <td><?php echo e(isset($d->ratting)?$d->ratting:""); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>                      
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer'); ?>
<script type="text/javascript">adminchangelogin()</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\freelance laravel\helping-hand\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>