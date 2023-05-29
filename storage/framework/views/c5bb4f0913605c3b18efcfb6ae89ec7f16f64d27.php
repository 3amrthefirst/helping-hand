<?php $__env->startSection('title'); ?>
<?php echo e(__('messages.Save Doctor')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="breadcrumbs">
   <div class="col-sm-4">
      <div class="page-header float-left">
         <div class="page-title">
            <h1><?php echo e(__('messages.Save Doctor')); ?></h1>
         </div>
      </div>
   </div>
   <div class="col-sm-8">
      <div class="page-header float-right">
         <div class="page-title">
            <ol class="breadcrumb text-right">
               <li><a href="<?php echo e(url('admin/doctor')); ?>"><?php echo e(__('messages.Doctors')); ?></a></li>
               <li class="active"><?php echo e(__('messages.Save Doctor')); ?></li>
            </ol>
         </div>
      </div>
   </div>
</div>
<div class="content mt-3">
   <div class="animated fadeIn">
      <div class="row rowcenter">
         <div class="col-md-10">
            <div class="card">
               <div class="card-body">
                  <?php if(Session::get("message")): ?>
                  <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                     <?php echo e(Session::get("message")); ?>

                     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">×</span>
                     </button>
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
                  <ul class="nav nav-tabs" id="myTab" role="tablist">
                     <li class="nav-item">
                        <a class="nav-link <?= $tab_id == 1 ? 'active' : "" ?>" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><?php echo e(__('messages.Basic Information')); ?></a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link <?= $tab_id == 2 ? 'active' : "" ?>" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><?php echo e(__('messages.Working Hours')); ?></a>
                     </li>
                  </ul>
                  <div class="tab-content pl-3 p-1" id="myTabContent">
                     <div class="tab-pane fade <?= $tab_id == 1 ? 'show active' : "" ?>" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <form action="<?php echo e(url('admin/updatedoctorprofile')); ?>" method="post"  enctype="multipart/form-data">
                           <?php echo e(csrf_field()); ?>

                           <input type="hidden" name="id" id="id" value="<?php echo e($doctor_id); ?>"/>
                           <input type="hidden" name="real_image" id="real_image" value="<?php echo e(isset($data->image)?$data->image:''); ?>"/>
                           <div class="form-group">
                              <div class="col-md-6" >
                                 <label for="name" class=" form-control-label">
                                 <?php echo e(__('messages.Select Department')); ?>

                                 <span class="reqfield" >*</span>
                                 </label>
                                 <select id="department" name="department" required class="form-control">
                                    <option value=""><?php echo e(__('messages.Select Department')); ?></option>
                                    <?php $__currentLoopData = $department; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($d->id); ?>" <?= isset($data->department_id) && $data->department_id == $d->id ? "selected='selected'" : "" ?> ><?php echo e($d->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                 </select>
                              </div>
                              <div class="col-md-6">
                                 <label for="name" class=" form-control-label">
                                 <?php echo e(__('messages.Doctor Name')); ?>

                                 <span class="reqfield" >*</span>
                                 </label>
                                 <input type="text" id="name" placeholder="<?php echo e(__('messages.Enter').' '.__('messages.Doctor Name')); ?>" class="form-control" required name="name" value="<?php echo e(isset($data->name)?$data->name:''); ?>">
                              </div>
                           </div>
                           <div class="form-group">
                              <div class="col-md-6">
                                 <label for="email" class=" form-control-label">
                                 <?php echo e(__('messages.Email')); ?>

                                 <span class="reqfield" >*</span>
                                 </label>
                                 <input type="text" id="email" placeholder="<?php echo e(__('messages.Enter').' '.__('messages.Email')); ?>" class="form-control" required name="email" value="<?php echo e(isset($data->email)?$data->email:''); ?>">
                              </div>
                              <div class="col-md-6">
                                 <label for="name" class=" form-control-label">
                                 <?php echo e(__('messages.Password')); ?>

                                 <span class="reqfield" >*</span>
                                 </label>
                                 <input type="text" id="password" placeholder="<?php echo e(__('messages.Enter').' '.__('messages.Password')); ?>" class="form-control" required name="password" value="<?php echo e(isset($data->password)?$data->password:''); ?>">
                              </div>
                           </div>
                           <div class="form-group">
                              <div class="col-md-6">
                                 <label for="phone" class=" form-control-label">
                                 <?php echo e(__('messages.Phone No')); ?>

                                 <span class="reqfield" >*</span>
                                 </label>
                                 <input type="text" id="phone_no" placeholder="<?php echo e(__('messages.Enter').' '.__('messages.Phone No')); ?>" class="form-control" required name="phone_no" value="<?php echo e(isset($data->phone_no)?$data->phone_no:''); ?>">
                              </div>
                              <div class="col-md-6">
                              </div>
                           </div>
                           <div class="form-group">
                              <div class="col-md-6">
                                 <label for="phone" class=" form-control-label">
                                 <?php echo e(__('messages.Facebook ID')); ?>

                                 </label>
                                 <input type="text" id="facebook" required placeholder="<?php echo e(__('messages.Enter').' '.__('messages.Facebook ID')); ?>"  class="form-control"  name="facebook" value="<?php echo e(isset($data->facebook_id)?$data->facebook_id:''); ?>">
                              </div>
                              <div class="col-md-6">
                                 <label for="name" class=" form-control-label">
                                 <?php echo e(__('messages.Twitter ID')); ?>

                                 </label>
                                 <input type="text" id="twitter_id" required placeholder="<?php echo e(__('messages.Enter').' '.__('messages.Twitter ID')); ?>"  class="form-control"  name="twitter_id" value="<?php echo e(isset($data->twitter_id)?$data->twitter_id:''); ?>">
                              </div>
                           </div>
                           <div class="form-group">
                              <div class="col-md-6">
                                 <label for="phone" class=" form-control-label">
                                 <?php echo e(__('messages.Google ID')); ?>

                                 </label>
                                 <input type="text" id="google_id" required placeholder="<?php echo e(__('messages.Enter').' '.__('messages.Google ID')); ?>"  class="form-control"  name="google_id" value="<?php echo e(isset($data->google_id)?$data->google_id:''); ?>">
                              </div>
                              <div class="col-md-6">
                                 <label for="name" class=" form-control-label">
                                 <?php echo e(__('messages.Instagram ID')); ?>

                                 </label>
                                 <input type="text" id="instagram_id" required placeholder="<?php echo e(__('messages.Enter').' '.__('messages.Instagram ID')); ?>"  class="form-control"  name="instagram_id" value="<?php echo e(isset($data->instagram_id)?$data->instagram_id:''); ?>">
                              </div>
                           </div>
                           <div class=" col-md-12 form-group">
                              <label for="email" class=" form-control-label">
                              <?php echo e(__('messages.About us')); ?><span class="reqfield" >*</span>
                              </label>
                              <textarea required id="description" name="aboutus" class="form-control"><?php echo e(isset($data->about_us)?$data->about_us:''); ?></textarea>
                           </div>
                           <div class="col-md-12 form-group">
                              <label for="email" class=" form-control-label">
                              <?php echo e(__('messages.Service')); ?><span class="reqfield" >*</span>
                              </label>
                              <textarea required id="servicedoctor" name="service"  class="form-control"><?php echo e(isset($data->service)?$data->service:''); ?></textarea>
                           </div>
                           <div class="col-md-12 form-group">
                              <label for="file" class=" form-control-label">
                              <?php echo e(__('messages.Image')); ?><span class="reqfield" >*</span>
                              </label>
                              <?php if($doctor_id!=0): ?>
                              <img src="<?php echo e(asset('upload/doctor').'/'.$data->image); ?>" class="imgsize1 btndepartwarning" />
                              <?php endif; ?>
                              <div>
                                 <input type="file" id="file" name="image" class="form-control-file" accept="image/*">
                              </div>
                           </div>
                           <div>
                               <?php if(Session::get("is_demo")=='1'): ?>
                            <button id="payment-button" type="button" onclick="disablebtn()"  class="btn btn-lg btn-info floatright">
                              <?php echo e(__('messages.Submit')); ?>

                              </button>
                        <?php else: ?>
                             <button id="payment-button" type="submit" class="btn btn-lg btn-info floatright">
                              <?php echo e(__('messages.Submit')); ?>

                              </button>
                        <?php endif; ?>

                           </div>
                        </form>
                     </div>
                     <div class="tab-pane fade <?= $tab_id == 2 ? 'show active' : "" ?> btnsaveoption" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <form action="<?php echo e(url('admin/updateworkinghours')); ?>" method="post"  enctype="multipart/form-data">
                           <?php echo e(csrf_field()); ?>

                           <input type="hidden" name="id" id="id" value="<?php echo e($doctor_id); ?>"/>
                           <div class="table-responsive">
                           <table class="table table-bordered">
                              <thead>
                                 <tr>
                                    <th>#</th>
                                    <th><?php echo e(__('messages.Day')); ?></th>
                                    <th><?php echo e(__('messages.From')); ?></th>
                                    <th><?php echo e(__('messages.To')); ?></th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php $arr = [__('messages.Monday'), __('messages.Tuesday'), __('messages.Wednesday'), __('messages.Thursday'), __('messages.Friday'), __('messages.Saturday'), __('messages.Sunday')]; ?>
                                 <?php $i = 0; ?>
                                 <?php if(count($workinghour)>0): ?>
                                 <?php $__currentLoopData = $workinghour; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $work): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                 <tr>
                                    <td><input type="hidden" name="work_id[]" id="id<?php echo e($i); ?>" value="<?= isset($work->id) ? $work->id : 0 ?>"></td>
                                    <td><input type="hidden" name="day[]" id="day<?php echo e($i); ?>" readonly="" value="<?php echo e($i+1); ?>" class="form-control" />
                                       <?php if(($i+1)==1): ?>
                                       <span><?php echo e($arr[0]); ?></span>
                                       <?php elseif(($i+1)==2): ?>
                                       <span> <?php echo e($arr[1]); ?></span>
                                       <?php elseif(($i+1)==3): ?>
                                       <span><?php echo e($arr[2]); ?></span>
                                       <?php elseif(($i+1)==4): ?>
                                       <span> <?php echo e($arr[3]); ?></span>
                                       <?php elseif(($i+1)==5): ?>
                                       <span> <?php echo e($arr[4]); ?></span>
                                       <?php elseif(($i+1)==6): ?>
                                       <span> <?php echo e($arr[5]); ?></span>
                                       <?php else: ?>
                                       <span> <?php echo e($arr[6]); ?></span>
                                       <?php endif; ?>
                                    </td>
                                    <td><input type="time" required name="from[]" id="from<?php echo e($i); ?>" class="form-control" value="<?= isset($work->from) ? $work->from : "" ?>" /></td>
                                    <td><input type="time" required name="to[]" id="to<?php echo e($i); ?>" value="<?= isset($work->to) ? $work->to : "" ?>" class="form-control" onchange="checktime(this.value,'<?php echo e($i); ?>')" /></td>
                                 </tr>
                                 <?php $i++; ?>
                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                 <?php else: ?>
                                 <?php $__currentLoopData = $arr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                 <tr>
                                    <td><input type="hidden" name="work_id[]" id="id<?php echo e($i); ?>" value="0"></td>
                                    <td><input type="hidden" name="day[]" id="day<?php echo e($i); ?>" readonly="" value="<?php echo e($i+1); ?>" class="form-control" />
                                       <span><?php echo e($a); ?></span>
                                    </td>
                                    <td><input type="time" required name="from[]" id="from<?php echo e($i); ?>" class="form-control" value="<?php echo e(time()); ?>"  /></td>
                                    <td><input type="time" required name="to[]" id="to<?php echo e($i); ?>" value="" class="form-control" onchange="checktime(this.value,'<?php echo e($i); ?>')"  /></td>
                                 </tr>
                                 <?php $i++; ?>
                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                 <?php endif; ?>
                              </tbody>
                           </table>
                        </div>
                         <?php if(Session::get("is_demo")=='1'): ?>
                            <button id="payment-button" type="button" onclick="disablebtn()"  class="btn btn-lg btn-info floatright">
                              <?php echo e(__('messages.Submit')); ?>

                            </button>
                        <?php else: ?>
                             <button id="payment-button" type="submit" class="btn btn-lg btn-info floatright">
                              <?php echo e(__('messages.Submit')); ?>

                             </button>
                        <?php endif; ?>

                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\freelance laravel\helping-hand\resources\views/admin/doctor/savedoctor.blade.php ENDPATH**/ ?>