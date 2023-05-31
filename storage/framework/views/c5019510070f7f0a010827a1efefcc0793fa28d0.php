<?php $__env->startSection('title'); ?>
 <?php echo e(__('messages.Home')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('loader'); ?>
<div id="overlayer"></div><span class="loader"><span class="loader-inner"></span></span>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<style>

</style>
<div class="appointment-section">
		<div class="header-img">
		</div>
		<div class="container">
			<div class="header-appo-main-box">
				<h1><?php echo e(__('messages.Appointment Now!')); ?></h1>
					<?php if(Session::get("message")): ?>
                     <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                        <?php echo e(Session::get("message")); ?>

                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                        </button>
                     </div>
                     <?php endif; ?>
                     <span id="loginerrorreview"></span>
				<form action="<?php echo e(url('bookappoinment')); ?>" method="post">
					   <?php echo e(csrf_field()); ?>

					<div class="appo-select-main-box">
						<div class="appo-select-box">
							<select id="department" required class="dropdown" name="department" onchange="getserviceanddoctor(this.value)">
								<option value="" disabled="disabled" selected="selected">- <?php echo e(__('messages.Select Department')); ?></option>
								<?php $__currentLoopData = $department; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								   <option value="<?php echo e($d->id); ?>"><?php echo e($d->name); ?></option>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</select>
						</div>
							<div class="appo-select-box">
							<select id="doctors" required class="dropdown" name="doctors">
								<option value="" disabled="disabled" selected="selected">- <?php echo e(__('messages.Select Doctors')); ?></option>
							</select>
						</div>
						<div class="appo-select-box">
							<select id="service" required class="dropdown" name="service">
								<option value="" disabled="disabled" selected="selected">- <?php echo e(__('messages.Select Services')); ?></option>
							</select>
						</div>

					</div>
					<div class="appo-input-main-box">
						<input type="text" required name="name" id="name" placeholder="Your name" value="<?php echo e(Auth::user()?Auth::user()->name:''); ?>">
						<input type="text" required name="phone_no" id="phone_no" placeholder="Phone number" class="appo-right-input" value="<?php echo e(Auth::user()?Auth::user()->phone_no:''); ?>">
						<input type="date" required name="app_date" id="app_date" data-date-inline-picker="true" min="<?= date('Y-m-d')?>" placeholder="dd/mm/yyyy">
						<input type="time" required name="app_time" placeholder="Time" class="appo-right-input">
						<textarea rows="3" required name="messages" placeholder="Message"></textarea>
					</div>
					<div class="appo-btn-main-box">
						<?php if(Auth::id()): ?>
						   <button type="submit"><?php echo e(__('messages.Book Appointment')); ?></button>
						<?php else: ?>
						   <button type="button" onclick="changehiddenstatus()" data-toggle="modal" data-target="#myModal"><?php echo e(__('messages.Book Appointment')); ?></button>
						<?php endif; ?>

					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="services-main-box">
		<div class="container">
			<div class="services-left-part">
				<div class="left-part-detail">
					<h2><?php echo e(__("messages.Personal care & healthy living")); ?></h2>
					<p><?php echo e(__('messages.facilitydetails')); ?></p>
					<div class="services-btn-main-box">
						<a href="<?php echo e(url('allfacilites')); ?>"><?php echo e(__('messages.Explopre all Facility')); ?></a>
					</div>
					<div class="left-triangle">
					</div>
				</div>
			</div>
			<div class="services-right-part">
				<div class="row">
					<?php if(count($services)>0): ?>
					   <?php $i=0; ?>
					<?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<div class="col-md-4 col-sm-6">
							<?php if($i%2==0): ?>
 							  <div class="services-part-box services-part1-box">
 							<?php else: ?>
 							  <div class="services-part-box services-part2-box">
 							<?php endif; ?>
								<img src="<?php echo e(asset('upload/service').'/'.$s->icon); ?>">
								<div class="text-detail-box">
									<h4><?php echo e($s->name); ?></h4>
									<p><?php echo e($s->description); ?></p>
								</div>
							</div>
						</div>
						<?php $i++; ?>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
	<div class="pricing-main-box">
		<div class="container">
			<div class="global-heading">
				<h2>Tips</h2>
				<p><?php echo e(__("messages.The easiest way to keep life on track")); ?></p>
			</div>
            <div class="row  mb-5">
                <?php if(count($tips)>0): ?>
                    <?php $__currentLoopData = $tips; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tip): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="doctorl-part-box col-lg-3">

                                    <div class="mb-5">
                                        <img class="img-fluid" src="<?php echo e(asset($tip->image)); ?>">
                                    </div>
                                    <div class="doctorl-part-detail">
                                        <h5><?php echo e(ucwords(strtolower($tip->title))); ?></h5>
                                    </div>

                                </div>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>
		</div>
	</div>


	<div class="doctorl-main-box">
		<div class="container">
			<div class="global-heading">
				<h2><?php echo e(__('messages.Meet Our Doctors')); ?></h2>
				<p><?php echo e(__("messages.Talent wins games, but teamwork and intelligence win championships")); ?></p>
			</div>
			<div class="row">
				<?php if(count($doctorls)>0): ?>
				   <?php $__currentLoopData = $doctorls; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<a href="<?php echo e(url('doctordetails/').'/'.$d->user_id); ?>"><div class="col-lg-3 col-md-6 col-sm-6">
								<div class="doctorl-part-box">
									<?php
                                             if($d->image){
                                             	$image=asset('upload/doctor')."/".$d->image;
                                             }else{
                                             	$image=asset('upload/profile/profile.png');
                                             }
									?>
									<div class="doctorl-dp-img doctorl-dp-img-1"
                                         style="background-image: url('<?=$image?>')"></div>
									<div class="doctorl-part-detail">
										<h4><?php echo e(ucwords(strtolower($d->name))); ?></h4>
										<p><?php echo e(substr(trim($d->about_us),0,135)); ?></p>
									</div>
									<div class="icons-images">
										<span class="facebook-doctorl">
											<a href="<?php echo e(isset($d->facebook_id)?$d->facebook_id:''); ?>" target="_blank"><i class="fab fa-facebook-f"></i></a>
										</span>
										<span class="twitter-doctorl">
											<a href="<?php echo e(isset($d->twitter_id)?$d->twitter_id:''); ?>" target="_blank"><i class="fab fa-twitter"></i></a>
										</span>
										<span class="gp-doctorl">
											<a href="<?php echo e(isset($d->google_id)?$d->google_id:''); ?>" target="_blank"><i class="fab fa-google-plus-g"></i></a>
										</span>
										<span class="instagram-doctorl">
											<a href="<?php echo e(isset($d->instagram_id)?$d->instagram_id:''); ?>" target="_blank"><img src="<?php echo e(asset('front/img/instagram.png')); ?>"></a>
										</span>
									</div>
								</div>
							</div></a>
				    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
<div class="testimonial-main-box">
		<div class="container">
			<div class="global-heading">
				<h2><?php echo e(__('messages.Patient Reviews')); ?></h2>
				<p><?php echo e(__('messages.Feedback is the breakfast of champions')); ?></p>
			</div>
			<div class="testimonial-part-main-box">
				<div class="owl-carousel testimonial-carousel">
					<?php if($review): ?>
						<?php $__currentLoopData = $review; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						  	<div class="single-testimonial">
						    	<div class="testimonial-part-box">
						    		<div class="testimonial-inner-images">
						    		    <div class="col-md-3 testimage">
						    		        <?php
						    				 if($r->users->profile_pic!=""){
									     	   		$image=asset('upload/profile')."/".$r->users->profile_pic;
									     	   }elseif(isset($r->doctors)&&isset($r->doctors-> $image)){
									     	   		$image=asset('upload/doctor')."/".$r->doctors->image;
									     	   }else{
									     	   		 $image=asset('upload/profile/profile.png');
									     	   }
						    			?>
						    			<img src="<?php echo e($image); ?>" class="testimonial-profile-img">
						    		    </div>
						    		    <div class="col-md-9 testtext">
						    		        	<p class="testip"><?php echo e(substr($r->review,0,165)); ?></p>
						    			<span class="testimonialspan"></span>
						    			<?php if(isset($r->users->name)): ?>
						    			<h3 class="testimonialh">- <?php echo e($r->users->name); ?></h3>
						    			<?php endif; ?>
						    		    </div>
						    		</div>
						    	</div>
						  	</div>
					  	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				  	<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\freelance laravel\helping-hand\resources\views/front/home.blade.php ENDPATH**/ ?>