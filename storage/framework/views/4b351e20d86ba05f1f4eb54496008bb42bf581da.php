<!DOCTYPE html>
<html>
<head>
	<title id="changeunreadcount"><?php echo $__env->yieldContent('title'); ?></title>
	 <?php echo $__env->yieldContent("meta_title"); ?>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.3/css/bootstrap.min.css">
	<link rel="shortcut icon" href="<?php echo e(asset('public/App_icon.png')); ?>">
	<meta property="og:type" content="website"/>
      <meta property="og:url" content="<?php echo e(url('/')); ?>"/>
      <meta property="og:title" content="<?php echo e(__('messages.site name')); ?>"/>
      <meta property="og:image" content="<?php echo e(asset('public/App_icon.png')); ?>"/>
      <meta property="og:image:width" content="250px"/>
      <meta property="og:image:height" content="250px"/>
      <meta property="og:site_name" content="<?php echo e(__('messages.site name')); ?>"/>
      <meta property="og:description" content="<?php echo e(__('messages.meta_description_admin')); ?>"/>
      <meta property="og:keyword" content="<?php echo e(__('messages.meta_keyword')); ?>"/>
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/front/css/bootstrap.css')); ?>">
	<?php if(isset($setting->is_rtl)&&$setting->is_rtl=='0'): ?>
	  
	    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/front/css/rtl-style.css?v=5r12')); ?>">
	<?php else: ?>
	  <link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/front/css/style.css?v=45d')); ?>">
	<?php endif; ?>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="https://rawgit.com/OwlCarousel2/OwlCarousel2/develop/dist/assets/owl.carousel.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/front/css/responsive.css?v=ftgyert4')); ?>">
	
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

	<input type="hidden" id="authid" value="<?php echo e(Auth::id()); ?>">
  
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

</head>
<body onload="gettimezone()" >
    <?php echo $__env->make('front.firebase_config', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>;
	<?php echo $__env->make('front.cssclass', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>;
    <?php echo $__env->yieldContent('loader'); ?>
	 
     
	<div class="header-pinned" id="header">
		<div class="top-header">
			<div class="container">
				<div class="top-left-text">
					<p><?php echo e(isset($setting->working_day)?$setting->working_day:Session::get('working_day')); ?></p>
				</div>
				<div class="top-right-text">
					<p><?php echo e(__('messages.Call us')); ?> : <?php echo e(isset($setting->phone_no)?$setting->phone_no:Session::get("phone")); ?></p>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="navigation-custom-single">
				<nav class="navbar navbar-light bg-faded">
				  	<a class="navbar-brand" href="<?php echo e(url('/')); ?>">
				  	    <?php if(isset($setting->logo)): ?>
				  		<img src="<?php echo e(asset('public/upload/images').'/'.$setting->logo); ?>" class="logo-img">
				  		<?php else: ?>
				  		<img src="<?php echo e(Session::get('logo')); ?>" class="logo-img">
				  		<?php endif; ?>
				  	</a>
			  		<button class="navbar-toggler hidden-md-up" type="button" data-toggle="collapse" data-target="#CollapsingNavbar" aria-controls="exCollapsingNavbar2" aria-expanded="false" aria-label="Toggle navigation">
			    		&#9776;
			  		</button>
			  		<div class="collapse navbar-toggleable-sm" id="CollapsingNavbar">
			    		<ul class="nav navbar-nav pull-sm-right">
			      			<li class="nav-item">
			        			<a class="nav-link" href="<?php echo e(url('/')); ?>"><?php echo e(__('messages.Home')); ?></a>
			  				</li>
			      			<li class="nav-item">
			        			<a class="nav-link" href="<?php echo e(url('department')); ?>"><?php echo e(__('messages.Departments')); ?></a>
			      			</li>
			      			<li class="nav-item">
			        			<a class="nav-link" href="<?php echo e(url('doctorlist')); ?>"><?php echo e(__('messages.Doctors')); ?></a>
			      			</li>
			      			<li class="nav-item">
			        			<a class="nav-link" href="<?php echo e(url('allfacilites')); ?>"><?php echo e(__('messages.Facilities')); ?></a>
			      			</li>
			      			<li class="nav-item">
			        			<a class="nav-link" href="<?php echo e(url('gallery')); ?>"><?php echo e(__('messages.Gallery')); ?></a>
			      			</li>
			      			<li class="nav-item">
			        			<a class="nav-link" href="<?php echo e(url('pricing')); ?>"><?php echo e(__('messages.Help Package')); ?></a>
			      			</li>
			      			<li class="nav-item">
			      				<?php if(Auth::id()&&Auth::user()->usertype=='1'): ?>
			      				   <a class="nav-link" href="<?php echo e(url('myaccount')); ?>">
			        				<span><?php echo e(__('messages.My Account')); ?></span>
			        			  </a>
			      				<?php else: ?>
			        			<a class="nav-link" href="#">
			        				<span type="button" onclick="showloginmodel()" data-toggle="modal" data-target="#myModal"><?php echo e(__('messages.Login')); ?></span>
			        				<span>/</span>
			        				<span id="six" class="button2" onclick="showregmodel()" data-toggle="modal" data-target="#myModal"><?php echo e(__('messages.Register')); ?></span>
			        			</a>
			        			<?php endif; ?>
			      			</li>
			      			<?php if(Auth::id()&&Auth::user()->usertype=='1'): ?>
			      				<li class="nav-item">
			        			<a class="nav-link" href="javascript:logout()"><?php echo e(__('messages.Log out')); ?></a>
			      			</li>
			      			<?php endif; ?>
			    		</ul>
			  		</div>
				</nav>
			</div>
		</div>
	</div>

	<div class="spacefor-global">
	</div>
	 <?php echo $__env->yieldContent('content'); ?>
	
		<div class="modal" id="myModal">
		    <div class="modal-dialog">
		      	<div class="modal-content">
		        	<div class="modal-body">
		        		<div id="loginmodel">
		        			<h2><?php echo e(__('messages.Login')); ?></h2>
			          		<div class="part-form-main-box">
								<form>
									<span id="login_error" class="dangerrequired"></span>
									<input type="text" class="modelemail" name="login_email" placeholder="<?php echo e(__('messages.Enter Your Email')); ?>" id="login_email">
									<span id="login_email_error" class="dangerrequired"></span>
									<input type="password" id="login_password" name="login_password" placeholder="<?php echo e(__('messages.Enter Your Password')); ?>">
									<span id="login_password_error" class="dangerrequired"></span>
									<button type="button" onclick="Postlogin()"><?php echo e(__('messages.Login')); ?></button>
								</form>
								<div class="forgot-pass-modal">
									<a href="javascript:showforgotmodel()"><?php echo e(__('messages.Forgot password')); ?></a>
								</div>
								<p><?php echo e(__("messages.Don't have an account?")); ?> <a href="javascript:showregmodel()"><?php echo e(__('messages.Register Now')); ?></a></p>
								<div class="login-soical">
								<?php if(isset($setting->facebook_active)&&$setting->facebook_active=='1'): ?>
                              <div class="button-facebook">
                                 <a href="<?php echo e(url('auth/facebook')); ?>">
                                    <img src="<?php echo e(asset('public/front/img/facebook.png')); ?>">
                                 </a>
                              <?php endif; ?>
                              <?php if(isset($setting->google_active)&&$setting->google_active=='1'): ?>
                                 <a href="<?php echo e(url('auth/google')); ?>">
                                    <img src="<?php echo e(asset('public/front/img/google.png')); ?>">
                                 </a>
                              </div>
                              <?php endif; ?>
                              </div>
							</div>
		        		</div>
		        		<div id="registermodel">
		        			<h2><?php echo e(__('messages.Register')); ?></h2>
		        			<span id="reg_list"></span>
			          		<div class="part-form-main-box">
								<form>
									<input type="text" name="reg_name" id="reg_name" placeholder="<?php echo e(__('messages.Enter Your Full Name')); ?>">
									<span id="reg_name_error" class="dangerrequired"></span>
									<input type="text" name="reg_email" id="reg_email" placeholder="<?php echo e(__('messages.Enter Your Email')); ?>">
									<span id="reg_email_error" class="dangerrequired"></span>
									<input type="text" name="reg_phone" id="reg_phone" placeholder="<?php echo e(__('messages.Enter Your Phone No')); ?>">
									<span id="reg_phone_error" class="dangerrequired"></span>
									<input type="password" name="reg_pwd" id="reg_pwd" placeholder="<?php echo e(__('messages.Enter Your Password')); ?>">
									<span id="reg_password_error" class="dangerrequired"></span>
									<input type="password" name="reg_cpwd" id="reg_cpwd" placeholder="<?php echo e(__('messages.Re Enter Your Password')); ?>" onchange="checkbothpwd(this.value)">
									<span id="reg_cpwd_error" class="dangerrequired"></span>
									<button type="button" onclick="PostRegister()"><?php echo e(__('messages.Register')); ?></button>
								</form>
								
								<p><?php echo e(__("messages.Already have an account")); ?> <a href="javascript:showloginmodel()"><?php echo e(__('messages.Login')); ?></a></p>
							</div>
		        		</div>
		        		<div id="forgotmodel">
		        			<h2><?php echo e(__("messages.Forgot Password")); ?></h2>
			          		<div class="part-form-main-box">
								<form>
									<span id="forgot_email_success" class="successemail"></span>
									<span id="forgot_email_error" class="dangerrequired"></span>
									<input type="text" class="modelemail" name="forgot_email" id="forgot_email" placeholder="Enter Your Email">

									<button type="button" onclick="Postforgot()"><?php echo e(__('messages.Forgot')); ?></button>
								</form>
								
								<p><a href="javascript:showloginmodel()"><?php echo e(__('messages.Login')); ?></a></p>
							</div>
		        		</div>		        		
		        	</div>
		      	</div>
	    	</div>
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
		<div class="modal" id="appointmentModal">
		    <div class="modal-dialog">
		      	<div class="modal-content">
		        	<div class="modal-body">
		        		<div id="loginmodel">
		        			<h2><?php echo e(__('messages.Appointment Now!')); ?></h2>
			          		<div class="part-form-main-box">
								<form action="<?php echo e(url('bookappoinment')); ?>" method="post">
					   <?php echo e(csrf_field()); ?>      
					<div class="appo-select-main-box">
						<div class="appo-select-box">
							<select id="department" required class="dropdown" name="department" onchange="getserviceanddoctor(this.value)">
								<option value="" disabled="disabled" selected="selected">- <?php echo e(__('messages.Select Department')); ?></option>
								<?php if(isset($department)): ?>
								<?php $__currentLoopData = $department; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								   <option value="<?php echo e($d->id); ?>"><?php echo e($d->name); ?></option>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								<?php endif; ?>
							</select>
						</div>
						<div class="appo-select-box">
							<select id="service" required class="dropdown" name="service">
								<option value="" disabled="disabled" selected="selected">- <?php echo e(__('messages.Select Services')); ?></option>
							</select>
						</div>						
						<div class="appo-select-box">
							<select id="doctors" required class="dropdown" name="doctors">
								<option value="" disabled="disabled" selected="selected">- <?php echo e(__('messages.Select Doctors')); ?></option>
							</select>
						</div>
					</div>
					<div class="appo-input-main-box">
						<input type="text" required name="name" id="name" placeholder="<?php echo e(__('messages.Enter Your Full Name')); ?>" value="<?php echo e(Auth::user()?Auth::user()->name:''); ?>"> 
						<input type="text" required name="phone_no" id="phone_no" placeholder="<?php echo e(__('messages.Enter Phone number')); ?>" class="appo-right-input" value="<?php echo e(Auth::user()?Auth::user()->phone_no:''); ?>">
						<input type="date" required name="app_date" id="app_date" min="<?= date('Y-m-d')?>" placeholder="dd/mm/yyyy">
						<input type="time" required name="app_time" placeholder="Time" class="appo-right-input">
						<textarea rows="3" required name="messages" placeholder="<?php echo e(__('messages.Enter Your Messages')); ?>"></textarea>
					</div>
					<div class="appo-btn-main-box">
						<?php if(Auth::id()): ?>
						   <button type="submit"><?php echo e(__('messages.Book Appointment')); ?></button>
						<?php else: ?>
						   <button type="button" onclick="userloginalert()"><?php echo e(__('messages.Book Appointment')); ?></button>
						<?php endif; ?>
						
					</div>
				</form>
							</div>
		        		</div>
		        			        		
		        	</div>
		      	</div>
	    	</div>
		</div>
		

		<div class="modal" id="autoization">
		    <div class="modal-dialog">
		      	<div class="modal-content">
		        	<div class="modal-body">
		        		<div id="loginmodel">
		        			<h2><?php echo e(__('messages.Order Pay')); ?></h2>
			          		<div class="part-form-main-box">
			          			<?php
							    $months = array(1 => 'Jan', 2 => 'Feb', 3 => 'Mar', 4 => 'Apr', 5 => 'May', 6 => 'Jun', 7 => 'Jul', 8 => 'Aug', 9 => 'Sep', 10 => 'Oct', 11 => 'Nov', 12 => 'Dec');
							?>
								<form id="payment-card-info" method="post" action="<?php echo e(url('paymentsubscription')); ?>">
                                  <?php echo csrf_field(); ?>
                                  <input type="hidden" name="package_id" value="<?php echo e(isset($subscription->id)?$subscription->id:''); ?>">
                                  <div class="row">
                                      <div class="form-group owner col-md-8">
                                          <label for="owner"><?php echo e(__('messages.date')); ?></label>
                                          <input type="date" class="form-control" id="package_date" name="package_date" value="" required>
                                          
                                      </div>
                                      <div class="form-group CVV col-md-4">
                                          <label for="cvv"><?php echo e(__('messages.time')); ?></label>
                                          <input type="time" class="form-control" id="package_time" name="package_time" value="" required>
                                         
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="form-group owner col-md-8">
                                          <label for="owner"><?php echo e(__('messages.Name')); ?></label>
                                          <input type="text" class="form-control" id="owner" name="owner" value="<?php echo e(old('owner')); ?>" required>
                                          
                                      </div>
                                      <div class="form-group CVV col-md-4">
                                          <label for="cvv"><?php echo e(__('messages.CVV')); ?></label>
                                          <input type="number" class="form-control" id="cvv" name="cvv" value="<?php echo e(old('cvv')); ?>" required>
                                          
                                      </div>
                                  </div>    
                                  <div class="row">
                                      <div class="form-group col-md-8" id="card-number-field">
                                          <label for="cardNumber"><?php echo e(__('messages.Card Number')); ?></label>
                                          <input type="text" class="form-control" id="cardNumber" name="cardNumber" value="<?php echo e(old('cardNumber')); ?>" required>
                                         
                                      </div>
                                      <div class="form-group col-md-4" >
                                          <label for="amount"><?php echo e(__('messages.Amount')); ?></label>
                                          <input type="text" class="form-control" id="amount" name="amount" value="<?php echo e(isset($subscription->price)?$subscription->price:''); ?>" required>
                                          
                                          
                                      </div>
                                  </div>    
                                  <div class="row">
                                      <div class="form-group col-md-6" id="expiration-date">
                                          <label>Expiration Date</label><br/>
                                          <select class="form-control expritionmonth" id="expiration-month" name="expiration-month">
                                              <?php $__currentLoopData = $months; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                  <option value="<?php echo e($k); ?>" <?=old('expiration-month') == $k ? 'selected' : ''?> ><?php echo e($v); ?></option>                                                        
                                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                          </select>  
                                          <select class="form-control expriationyear" id="expiration-year" name="expiration-year" >
                                              
                                              <?php for($i = date('Y'); $i <= (date('Y') + 15); $i++): ?>
                                              <option value="<?php echo e($i); ?>"><?php echo e($i); ?></option>            
                                              <?php endfor; ?>
                                          </select>
                                      </div>                                                
                                      <div class="form-group col-md-6 btnsaveoption" id="credit_cards">
                                          <img src="<?php echo e(asset('public/upload/payment/featured-image.gif')); ?>" id="visa" class="payimg">
                                         
                                      </div>
                                  </div>
                                  
                                  <br/>
                                  <div class="form-group" id="pay-now">
                                      <button type="submit" class="btn btn-success themeButton" id="confirm-purchase"><?php echo e(__('messages.Confirm Payment')); ?></button>
                                  </div>
                                </form>
							</div>
		        		</div>    		
		        	</div>
		      	</div>
	    	</div>
		</div>

	<div class="footer-main-box">
		<div class="container">
			<div class="footer-part-main-box">
				<div class="row">
					<div class="col-lg-4 col-md-4">
						<div class="footer-r1-box">
							<div class="footer-logo-box">
							    <?php if(isset($setting->logo)): ?>
							    <img src="<?php echo e(asset('public/upload/images').'/'.$setting->logo); ?>">
							    <?php else: ?>
							      <img src="<?php echo e(Session::get('logo')); ?>">
							    <?php endif; ?>
								
							</div>
							<div class="footer-r1-detail">
								<div class="footer-d1-box">
									<h3><?php echo e(__('messages.About us')); ?></h3>
									<p><?php echo e(__('messages.front_about')); ?></p>
								</div>
								<div class="footer-d1-box">
									<h3><?php echo e(__('messages.Contact Us')); ?></h3>
									<p><span><img src="<?php echo e(asset('public/front/img/phone.png')); ?>"></span><?php echo e(isset($setting->email)?$setting->email:Session::get("email")); ?></p>
									<p><span><img src="<?php echo e(asset('public/front/img/mail.png')); ?>"></span><?php echo e(isset($setting->phone_no)?$setting->phone_no:Session::get("phone")); ?></p>
								</div>
							</div>
						</div>
					</div>
					
					<div class="col-lg-2 col-md-3">
						<div class="footer-r1-box">
							<div class="footer-r1-detail">
								<div class="footer-d1-box">
									<h3><?php echo e(__('messages.Our department')); ?></h3>
									<?php $i=0;?>
									<?php if(isset($department)): ?>
									<?php $__currentLoopData = $department; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									  <?php if($i<5): ?>
									  	<a href="<?php echo e(url('departmentdetail').'/'.$d->id); ?>"><?php echo e($d->name); ?> <?php echo e(__('messages.Department')); ?></a>
									  	<?php $i++; ?>
									  	<?php endif; ?>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									<?php else: ?>
									<?php if(Session::get("departmentlist")): ?>
									   	<?php $__currentLoopData = Session::get("departmentlist"); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									  <?php if($i<5): ?>
									  	<a href="<?php echo e(url('departmentdetail').'/'.$d->id); ?>"><?php echo e($d->name); ?> <?php echo e(__('messages.Department')); ?></a>
									  	<?php $i++; ?>
									  	<?php endif; ?>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									<?php endif; ?>
									<?php endif; ?>
								</div>
							</div>
						</div>
					</div>
					
					<div class="col-lg-2 col-md-3">
						<div class="footer-r1-box">
							<div class="footer-r1-detail">
								<div class="footer-d1-box">
									<h3><?php echo e(__('messages.Helpful links')); ?></h3>
									<a href="<?php echo e(url('allfacilites')); ?>"><?php echo e(__('messages.Facilities')); ?></a>
								
									<a href="<?php echo e(url('termcondition')); ?>"><?php echo e(__("messages.Terms & Condition")); ?></a>
									<a href="<?php echo e(url('privacypolicy')); ?>"><?php echo e(__("messages.Privacy Policy")); ?></a>
									<a href="<?php echo e(url('contact_us')); ?>"><?php echo e(__('messages.Contact Us')); ?></a>
								</div>
							</div>
						</div>
					</div>
					
					<div class="col-lg-4 col-md-4">
						<div class="footer-r1-box">
							<div class="footer-r1-detail">
								<div class="footer-d1-box">
									<h3><?php echo e(__('messages.Address')); ?></h3>
									<p><?php echo e(isset($setting->address)?$setting->address:Session::get("address")); ?></p>
								</div>
								<div class="footer-d1-box">
									<p><?php echo e(__('messages.Subscribe More Info')); ?></p>
									<form>
										<div class="inputWithIcon">
										  	<input type="text" name="subscribeemail" id="subscribeemail" placeholder="Email">
										  	<i class="fa fa-envelope fa-lg fa-fw" aria-hidden="true"></i>
										</div>
										<div class="subcribe-button-box">
											<button type="button" onclick="savesubscribe()"><?php echo e(__('messages.Subscribe')); ?></button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="footer-part2-main-box">
				<div class="footer-bottom-main-box">
					<div class="footer-icons-main-box">
						<div class="footer-icon-box">
							<a href="<?php echo e(isset($setting->facebook_id)?$setting->facebook_id:''); ?>">
								<i class="fab fa-facebook-f"></i>
							</a>
						</div>
						<div class="footer-icon-box">
							<a href="<?php echo e(isset($setting->twitter_id)?$setting->twitter_id:''); ?>">
								<i class="fab fa-twitter"></i>
							</a>
						</div>
						<div class="footer-icon-box">
							<a href="<?php echo e(isset($setting->google_id)?$setting->google_id:''); ?>">
								<i class="fab fa-google-plus-g"></i>
							</a>
						</div>
						<div class="footer-icon-box">
							<a href="<?php echo e(isset($setting->instagram_id)?$setting->instagram_id:''); ?>">
								<i class="fab fa-instagram"></i>
							</a>
						</div>
					</div>
					<p><?php echo e(date('Y')); ?> @ <?php echo e(__('messages.Company private ltd')); ?>.</p>
				</div>
			</div>
		</div>
	</div>
		<input type="hidden" id="is_chat" value="0"/>
  	<div id="gdchat-fixed-bottom-right" class="gdchat-fixed-bottom-right ch1">
      	
		<?php if(isset($chatpage)): ?>
			<div class="chat-home-top-mbox ch2">
						<?php if(Auth::id()&&Auth::user()->usertype=='1'): ?>
						  <a href="<?php echo e(url('chatarea/1')); ?>" data-lp-event="click" class="cha">
						<?php else: ?>
					 	<a href="#" onclick="changehiddenstatus()" data-toggle="modal" data-target="#myModal" data-lp-event="click" class="cha">
						<?php endif; ?>
				<img src="<?php echo e(asset('public/upload/doctor_876303.png')); ?>" class="chimg">
				<span><?php echo e(__("messages.Chat with Us")); ?></span></a>
			</div>
			<div class="chat-home-bottom-mbox">
				<img src="<?php echo e(asset('public/upload/chat.png')); ?>">
				<span><?php echo e(__("messages.We're online")); ?></span>
			</div>
		<?php endif; ?>
</div>
	
	    <input type="hidden" id="siteurl" value="<?php echo e(url('/')); ?>">
	     <input type="hidden" id="own_url" value="<?php echo e(url('/')); ?>" />
	    <input type="hidden" id="soundnotify" value="<?php echo e(asset('public/sound/notification/beltekpar.mp3')); ?>">
	    <input type="hidden" id="site_name_lang" value="<?php echo e(__('messages.site name')); ?>" />
	    <input type="hidden" id="loginalert" value="<?php echo e(__('messages.Please Login Your Account')); ?>" />
	    <input type="hidden" id="currentusername" value="<?php echo e(isset(Auth::user()->name)?Auth::user()->name:''); ?>">
        <input type="hidden" id="mycurrentuser" value="<?php echo e(isset(Auth::user()->id)?Auth::user()->id:''); ?>">
        <input type="hidden" id="authprofile" value="/profile/<?php echo e(isset(Auth::user()->profile_pic)?Auth::user()->profile_pic:'profile.png'); ?>">
	    <input type="hidden" id="newsletteralert" value="<?php echo e(__('messages.Thanks for subscribing we will inform you for Upcoming event')); ?>">
	    <input type="hidden" id="emailreq" value="<?php echo e(__('messages.email_required')); ?>">
	    <input type="hidden" id="vaildemail" value="<?php echo e(__('messages.vaild_email')); ?>">
	    <input type="hidden" id="rtl" value="<?php echo e(isset($setting->is_rtl)?$setting->is_rtl:''); ?>"/>
        <input type="hidden" id="pwdreq" value="<?php echo e(__('messages.pwdreq')); ?>">
        <input type="hidden" id="namereq" value="<?php echo e(__('messages.namereq')); ?>">
        <input type="hidden" id="incomming" value="0" />
        <input type="hidden" id="phonereq" value="<?php echo e(__('messages.phonereq')); ?>">
        <input type="hidden" id="confirmpwdreq" value="<?php echo e(__('messages.confirmpwdreq')); ?>">
        <input type="hidden" id="registersuccess" value="<?php echo e(__('messages.registersuccess')); ?>">
        <input type="hidden" id="alreadyemailexiste" value="<?php echo e(__('messages.alreadyemailexiste')); ?>">
        <input type="hidden" id="checkcpwd" value="<?php echo e(__('messages.Please Enter Correct Password')); ?>">
        <input type="hidden" id="mailsend" value="<?php echo e(__('messages.mailsend')); ?>">
        <input type="hidden" id="notfoundemail" value="<?php echo e(__('messages.notfoundemail')); ?>">
        <input type="hidden" id="bothpwdsame" value="<?php echo e(__('messages.bothpwdsame')); ?>">
		<input type="hidden" id="rightimg" value='<?php echo e(asset("public/front/img/left.png")); ?>' />
		<input type="hidden" id="leftimg" value='<?php echo e(asset("public/front/img/right.png")); ?>' />
		<script type="text/javascript" src="<?php echo e(asset('public/js/script.js')); ?>"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.3.4/js/tether.min.js"></script>
		
	
		<script type="text/javascript" src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
		<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

		<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 
		<script type="text/javascript" src="https://rawgit.com/OwlCarousel2/OwlCarousel2/develop/dist/owl.carousel.min.js"></script>
		
		<script src="https://cdn.jsdelivr.net/npm/@iconfu/svg-inject@1.2.3/dist/svg-inject.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/@joeattardi/emoji-button@3.0.3/dist/index.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
		
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.23/moment-timezone-with-data-2012-2022.min.js"></script>
	   
	    
		
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.3/js/bootstrap.js"></script>
		 <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

	     <?php echo $__env->yieldContent('footer'); ?>

	     <script type="text/javascript" src="<?php echo e(asset('public/js/front.js?v=4543543')); ?>"></script>
		
</body>
</html><?php /**PATH E:\xampp\htdocs\project\company\blank_script\blank_singleclinic_web\singleclinic\resources\views/front/layout.blade.php ENDPATH**/ ?>