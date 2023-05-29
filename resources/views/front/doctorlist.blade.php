@extends('front.layout')
@section('title')
 {{__('messages.Doctor List')}}
@stop
@section('loader')
<div id="overlayer"></div>
<span class="loader"><span class="loader-inner"></span></span>
@stop
@section('content')
  <div class="doctorpg-main-box">
		<div class="container">
			<div class="global-heading">
				<h2>{{__('messages.Doctor List')}} </h2>
				<p>{{__("messages.The best doctor is the one you run to and can't find")}}</p>
			</div>

			<div class="doctorpg-tab-mainbox">
			    <section class="customer-logos slider tab">
			      	<div class="slide tablinks" id="defaultOpen" onclick="openCity(event, 'all')">
			      		{{__('messages.All')}}
			      	</div>
			      	@foreach($department as $d)
				      	<div class="slide tablinks" onclick="openCity(event, '{{$d->id}}')">
				      		{{$d->name}}
				      	</div>
			      	@endforeach
			    </section>
			</div>

			<div class="doctorpg-part-main-box">
				<div id="all" class="tabcontent">
					<div class="row">
						@foreach($doctor as $d)
						  <a href="{{url('doctordetails/').'/'.$d->user_id}}" class="denone">
						  	<div class="col-lg-3 col-md-4 col-sm-6 "
     data-aos="fade-up" >
							<div class="d-detail-collapse-doctor">
								<div class="doctorl-part-box">
									<?php
					                                             if($d->image){
					                                             	$image=asset('upload/doctor')."/".$d->image;
					                                             }else{
					                                             	$image=asset('upload/profile/profile.png');
					                                             }
														?>
									<div class="doctorl-dp-img doctorl-dp-img-1" style="background-image: url('<?=$image?>')"></div>
									<div class="doctor-detail-part">
										<div class="doctorl-part-detail">
											<h5 style="    font-weight: 700;">{{substr(ucwords(strtolower($d->name)),0,20)}}</h5>
											<p>{{substr($d->about_us,0,150)}}</p>
										</div>
										<div class="icons-images">
											<span class="facebook-doctorl">
												<a href="{{isset($d->facebook_id)?$d->facebook_id:'https://www.facebook.com'}}" target="_blank"><i class="fab fa-facebook-f"></i></a>
											</span>
											<span class="twitter-doctorl">
												<a href="{{isset($d->twitter_id)?$d->twitter_id:'https://twitter.com/search-home'}}" target="_blank"><i class="fab fa-twitter"></i></a>
											</span>
											<span class="gp-doctorl">
												<a href="{{isset($d->google_id)?$d->google_id:''}}" target="_blank"><i class="fab fa-google-plus-g"></i></a>
											</span>
											<span class="instagram-doctorl">
												<a href="{{isset($d->instagram_id)?$d->instagram_id:'https://www.instagram.com/?hl=en'}}" target="_blank"><img src="{{asset('front/img/instagram.png')}}"></a>
											</span>
										</div>

									</div>
								</div>
							</div>
						  </div></a>
						@endforeach
					</div>
				</div>
				@foreach($departmentdoctor as $da)
				   <div id="{{$da->id}}" class="tabcontent">
					<div class="row">
						@foreach($da->doctor as $sa)
						<a href="{{url('doctordetails/').'/'.$sa->user_id}}"><div class="col-lg-3 col-md-4 col-sm-6" data-aos="fade-up">
							<div class="d-detail-collapse-doctor">
								<div class="doctorl-part-box">
									<?php
					                                             if($sa->image){
					                                             	$image=asset('upload/doctor')."/".$sa->image;
					                                             }else{
					                                             	$image=asset('upload/profile/profile.png');
					                                             }
														?>
									<div class="doctorl-dp-img doctorl-dp-img-1" style="background-image: url('<?=$image?>')"></div>
									<div class="doctor-detail-part">
										<div class="doctorl-part-detail">
											<h5>{{substr(ucwords(strtolower($sa->name)),0,20)}}</h5>
											<p>{{substr($sa->about_us,0,125)}}</p>
										</div>
										<div class="icons-images">
											<span class="facebook-doctorl">
												<a href="{{isset($sa->facebook_id)?$sa->facebook_id:''}}"><i class="fab fa-facebook-f"></i></a>
											</span>
											<span class="twitter-doctorl">
												<a href="{{isset($sa->twitter_id)?$sa->twitter_id:''}}"><i class="fab fa-twitter"></i></a>
											</span>
											<span class="gp-doctorl">
												<a href="{{isset($sa->google_id)?$sa->google_id:''}}"><i class="fab fa-google-plus-g"></i></a>
											</span>
											<span class="instagram-doctorl">
												<a href="{{isset($sa->instagram_id)?$sa->instagram_id:''}}"><img src="{{asset('front/img/instagram.png')}}"></a>
											</span>
										</div>
									</div>
								</div>
							</div>
						</div></a>
						@endforeach
					</div>
				   </div>
				@endforeach
			</div>
		</div>
	</div>

@stop
@section('footer')
<script>
  AOS.init();
</script>
@stop
