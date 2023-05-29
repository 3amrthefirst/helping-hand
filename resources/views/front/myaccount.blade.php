@extends('front.layout')
@section('title')
 {{__('messages.My Account')}}
@stop
@section('content')
 <div class="my-accountpg-main-box">
		<div class="myaccountpg-main-tabbox">
			<div class="container d-flex">
			  	<ul id="tabs" class="nav nav-tabs" role="tablist">
			    	<li class="nav-item">
			      		<a id="tab-ap" href="#pane-ap" class="nav-link active" data-toggle="tab" role="tab">
			      			{{__('messages.Appointment history')}}
			      		</a>
			    	</li>
			    	<li class="nav-item">
			      		<a id="tab-su" href="#pane-su" class="nav-link" data-toggle="tab" role="tab">
			      			{{__('messages.Subcription history')}}
			      		</a>
			    	</li>
			    	<li class="nav-item">
			      		<a id="tab-my" href="#pane-my" class="nav-link" data-toggle="tab" role="tab">
			      			{{__('messages.My profile')}}
			      		</a>
			    	</li>
			    	<li class="nav-item">
			      		<a id="tab-ch" href="#pane-ch" class="nav-link" data-toggle="tab" role="tab">
			      			{{__('messages.Change password')}}
			      		</a>
			    	</li>
			    <!--	<li class="nav-item">
			      		<a id="tab-lg" href="javascript:logout()" class="nav-link" role="tab">
			      			{{__('messages.Log out')}}
			      		</a>
			    	</li>-->
			  	</ul>
			</div>
		</div>
		<div class="myaccountpg-main-tabcontentbox">
			<div class="container">
			  	<div id="content" class="tab-content" role="tablist">
			    	<div id="pane-ap" class="card tab-pane fade show active" role="tabpanel" aria-labelledby="tab-ap">
			      		<div class="card-header" role="tab" id="heading-A">
			        		<h5 class="mb-0">
			          			<a data-toggle="collapse" href="#collapse-A" data-parent="#content" aria-expanded="true" aria-controls="collapse-A">
			                		{{__('messages.Appointment history')}}
			              		</a>
			        		</h5>
			      		</div>
			      		<div id="collapse-A" class="collapse in" role="tabpanel" aria-labelledby="heading-A">
			        		<div class="card-body">
			        			 @if(Session::has('message'))
				                     <div class="col-sm-12">
				                        <div class="alert  {{ Session::get('alert-class', 'alert-info') }} alert-dismissible fade show" role="alert">{{ Session::get('message') }}
				                           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				                           <span aria-hidden="true">&times;</span>
				                           </button>
				                        </div>
				                     </div>
				                     @endif
			          			<div class="tab-appointment-main-box">
			          				<h5>{{__('messages.Upcoming')}}</h5>
			          				<div class="tab-appointment-part-box">
			          				  @if(count($upcomming)>0)
			          				    @foreach($upcomming as $u)
			          				       <div class="tab-appointment-box"
     											data-aos-anchor-placement="top-bottom">
			          						<div class="tab-part-box">
				          						<?php
			          									if(isset($u->doctors->image)){
			          										$path=asset("public/upload/doctor").'/'.$u->doctors->image;
			          									}else{
			          										$path=asset("public/upload/profile/profile.png");
			          									}

			          							 ?>
				          						<img src="{{$path}}">
				          						<div class="tab-timingd-box">
					          						<div class="tab-appointment-time-box">
					          							<i class="far fa-clock"></i>
					          							<span><?php
					          							$date=date_create($u->time);
					          							echo date_format($date,"H:i a")?></span>
					          						</div>
					          						<div class="tab-appointment-calendar-box">
					          							<i class="far fa-calendar-alt"></i>
					          							<span><?php
					          							$date=date_create($u->date);
					          							echo date_format($date,"d F,Y")?></span>
					          						</div>
					          					</div>
				          					</div>


				          					<div class="tab-appointment-detail-box">
												<h4>{{$u->doctors->name}}</h4>
												 @if($u->status==3)
					                              <span class="pending">{{__('messages.Approve')}}</span>
					                              @elseif($u->status==6)
					                              <span class="pending">{{__('messages.Reject')}}</span>
					                              @elseif($u->status==0)
					                              <span class="pending">{{__('messages.Absent')}}</span>
					                              @elseif($u->status==1)
					                              <span class="pending">{{__('messages.Receive')}}</span>
					                              @elseif($u->status==2)
					                              <span class="pending">{{__('messages.Reschedule')}}</span>
					                              @elseif($u->status==4)
					                              <span class="pending">{{__('messages.Complete')}}</span>
					                              @elseif($u->status==5)
					                              <span class="pending">{{__('messages.Refer Doctor')}}</span>
					                              @endif

											</div>

											<div class="tab-appointment-detail2-box">
												<span>{{$u->department->name}}</span>
												<h6>{{$u->services->name}}</h6>
											</div>
			          					</div>
			          				    @endforeach
			          				  @else
			          				      <h3>{{__("messages.Upcoming Appointment Not Avilable")}}</h3>
			          				  @endif
			          				</div>
			          				<h5>{{__('messages.Past')}}</h5>
			          				<div class="tab-appointment-part-box">

			          					@if(count($past)>0)
			          					   @foreach($past as $u)
			          					       <div class="tab-appointment-box" 						  data-aos-anchor-placement="top-bottom">
			          						<div class="tab-part-box">
				          						<?php
			          									if(isset($u->doctors->image)){
			          										$path=asset("public/upload/doctor").'/'.$u->doctors->image;
			          									}else{
			          										$path=asset("public/upload/profile/profile.png");
			          									}

			          							 ?>
				          						<img src="{{$path}}">
				          						<div class="tab-timingd-box">
					          						<div class="tab-appointment-time-box">
					          							<i class="far fa-clock"></i>
					          							<span><?php
					          							$date=date_create($u->time);
					          							echo date_format($date,"H:i a")?></span>
					          						</div>
					          						<div class="tab-appointment-calendar-box">
					          							<i class="far fa-calendar-alt"></i>
					          							<span><?php
					          							$date=date_create($u->date);
					          							echo date_format($date,"d F,Y")?></span>
					          						</div>
					          					</div>
				          					</div>
				          					<div class="tab-appointment-detail-box">
												<h4>{{$u->doctors->name}}</h4>
												 @if($u->status==3)
					                              <span class="pending">{{__('messages.Approve')}}</span>
					                              @elseif($u->status==6)
					                              <span class="pending">{{__('messages.Reject')}}</span>
					                              @elseif($u->status==0)
					                              <span class="pending">{{__('messages.Absent')}}</span>
					                              @elseif($u->status==1)
					                              <span class="pending">{{__('messages.Receive')}}</span>
					                              @elseif($u->status==2)
					                              <span class="pending">{{__('messages.Reschedule')}}</span>
					                              @elseif($u->status==4)
					                              <span class="pending">{{__('messages.Complete')}}</span>
					                              @elseif($u->status==5)
					                              <span class="pending">{{__('messages.Refer Doctor')}}</span>
					                              @endif

											</div>
											<div class="tab-appointment-detail2-box">
												<h6>{{$u->services->name}}</h6>
												<span>{{$u->department->name}}</span>
											</div>
			          					</div>
			          					   @endforeach
			          					@else
			          					   <h3>{{__("messages.In Past You dont make it any appointment")}}</h3>
			          					@endif


			          				</div>
			          			</div>
			        		</div>
			      		</div>
		    		</div>
			    	<div id="pane-su" class="card tab-pane fade" role="tabpanel" aria-labelledby="tab-su">
			      		<div class="card-header" role="tab" id="heading-B">
			        		<h5 class="mb-0">
			          			<a class="collapsed" data-toggle="collapse" href="#collapse-B" data-parent="#content" aria-expanded="false" aria-controls="collapse-B">
			                		{{__('messages.Subcription history')}}
			              		</a>
			        		</h5>
			      		</div>
			      		<div id="collapse-B" class="collapse" role="tabpanel" aria-labelledby="heading-B">
			        		<div class="card-body">
			        		    @if(count($subscription)>0)
			        		        @foreach($subscription as $s)
			        		           	<div class="tab-appointment-box" data-aos="fade-up"
    										 data-aos-anchor-placement="top-bottom">
    		          						<div class="tab-appointment-detail-box tab-subcription-detail-box">
    											<h4>{{isset($s->packagedata)?$s->packagedata->name:''}}</h4>
    											@if($s->status=='1')
    											  	<span class="pending">{{__('messages.Receive')}}</span>
    											@elseif($s->status=='2')
    											    <span class="pending">{{__('messages.Accept')}}</span>
    											@elseif($s->status=='3')
    												<span class="pending">{{__('messages.Cancel')}}</span>
    											@elseif($s->status=='4')
    												<span class="pending">{{__("messages.In progress")}}</span>
    											@elseif($s->status=='5')
    												<span class="pending">{{__("messages.Complete")}}</span>
    											@else
    												<span class="pending">{{__("messages.Refund")}}</span>
    											@endif

    										</div>
    										<div class="tab-timingd-box tab-timingd2-box">
    			          						<div class="tab-appointment-time-box">
    			          							<i class="far fa-clock"></i>
    			          							<span>{{$s->time}}</span>
    			          						</div>
    			          						<div class="tab-appointment-calendar-box">
    			          							<i class="far fa-calendar-alt"></i>
    			          							<span>{{$s->date}}</span>
    			          							<p></p>
    			          						</div>
    			          					</div>
		          				      </div>
			        		        @endforeach
			        		    @else
			        		        {{__("messages.No Subscription History avilable ")}}
			        		    @endif

			        		</div>
			      		</div>
			    	</div>
			    	<div id="pane-my" class="card tab-pane fade" role="tabpanel" aria-labelledby="tab-my">
			      		<div class="card-header" role="tab" id="heading-C">
			        		<h5 class="mb-0">
			          			<a class="collapsed" data-toggle="collapse" href="#collapse-C" data-parent="#content" aria-expanded="	false" aria-controls="collapse-C">
			                		{{__('messages.My profile')}}
			              		</a>
			        		</h5>
			      		</div>
			      		<div id="collapse-C" class="collapse" role="tabpanel" aria-labelledby="heading-C">
			        		<div class="card-body">
			          			<div class="tab-chpmainbox">
		          					<div class="part-form-main-box">
										<form action="{{url('updateprofile')}}" method="post"  enctype="multipart/form-data">
											{{csrf_field()}}
											<div class="tab-profile-main-box">
												<div class="tab-profileimg-main-box">
												  @if(Auth::user()->profile_pic)
			          								<img src="{{asset('upload/profile').'/'.Auth::user()->profile_pic}}">
			          							  @else
			          							    <img src="{{asset('upload/profile/profile.png')}}">
			          							  @endif
			          							  <input type="file" name="image">
			          							</div>

			          							<div class="tab-profile-form-box">
													<input type="text" name="name" id="name" placeholder="Your name" required value="{{Auth::user()->name}}">
													<input type="email" readonly name="email" required placeholder="Email address" value="{{Auth::user()->email}}">
													<input type="text" name="phone_no" required id="phone_no" placeholder="Phone number" value="{{Auth::user()->phone_no}}">
												</div>
											</div>
											<button type="submit">{{__("messages.Update")}}</button>
										</form>
									</div>
			          			</div>
			        		</div>
			      		</div>
			    	</div>
			    	<div id="pane-ch" class="card tab-pane fade" role="tabpanel" aria-labelledby="tab-ch">
			      		<div class="card-header" role="tab" id="heading-d">
			        		<h5 class="mb-0">
			          			<a class="collapsed" data-toggle="collapse" href="#collapse-d" data-parent="#content" aria-expanded="	false" aria-controls="collapse-d">
			                		{{__('messages.Change password')}}
			              		</a>
			        		</h5>
			      		</div>
			      		<div id="collapse-d" class="collapse" role="tabpanel" aria-labelledby="heading-d">
			        		<div class="card-body">
			        		    <h2>{{__('messages.Change password')}}</h2>
			          			<div class="tab-chpmainbox">
		          					<div class="part-form-main-box">

										<form action="{{url('changepasswords')}}" method="post">
											{{csrf_field()}}
											<input type="password" name="opwd" id="opwd"placeholder="{{__('messages.Enter current password')}}" required onchange="checkcurrentpwd(this.value)">
											<input type="password" name="npwd" placeholder="{{__('messages.Enter new password')}}" id="npwd" required>
											<input type="password" name="rpwd" placeholder="{{__('messages.Re-enter password')}}" id="rpwd" required onchange="updatecheckbothpwd(this.value)">
											<button type="submit">{{__('messages.Update')}}</button>
										</form>
									</div>
			          			</div>
			        		</div>
			      		</div>
			    	</div>
			  	</div>
			</div>
		</div>
	</div>
@stop
