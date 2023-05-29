@extends('front.layout')
@section('title')
{{__('messages.Help Package')}}
@stop
@section('content')
<?php $res_curr=explode("-",$setting->currency);?>
   <div class="pricingpg-main-box">
		<div class="container">
			<div class="global-heading">
				<h2>{{__('messages.Help Package')}}</h2>
				<p>{{__("messages.The easiest way to keep life on track")}}</p>
			</div>
			<div class="facility-main-box">

				<div class="pricing-main-box pricingpg-part-main-box">
					<div class="container">
						<div class="pricing-part-main-box">
							<div class="row">
								@foreach($pricing as $p)
								  <div class="col-md-4">
									<div class="pricing-all-content">
										<div class="pricing-part-box">
											<h3>{{$p->name}}</h3>
											<div class="pricing-cost">
												<h3>{{$res_curr[1]}}</h3>
												<span>{{$p->price}}</span>
												<h6><i>/Session</i></h6>
											</div>
											<p>{{$p->description}}</p>
										</div>
										<div class="pricing-part-btn">
											<a class="btn" href="{{url('subscription').'/'.$p->id}}">{{__('messages.Order now')}}</a>
										</div>
									</div>
								  </div>
								@endforeach
							</div>
						</div>
					</div>
				</div>

				<div class="pricingpg-des-box">
					<div class="d-detail-main-box">
						<div class="global-part-heading global-heading">
							<h3>{{__('messages.Additional Information')}}</h3>
							<p>{{__("messages.a1")}}</p>
							<p>{{__("messages.a2")}}</p>
						</div>
					</div>
				</div>

				<div class="pricingpg-departmentlist-main-box">
					<div class="global-heading">
						<h2>{{__('messages.Department')}}</h2>
						<p>{{__('messages.Goodness and hard work are rewarded with respect')}}</p>
					</div>
					<div class="department-part-main-box">
						<div class="row">
						    <?php $i=0;?>
							@if(count($department)>0)
								@foreach($department as $d)
								@if($i<=7)
								  <div class="col-lg-3 col-md-4 col-sm-6">
									<div class="department-part-box">
										<div class="department-part-img">
											<img src="{{asset('upload/department').'/'.$d->image}}">
										</div>
										<div class="text-detail-box">
											<h4>{{$d->name}}</h4>
											<p>{{substr($d->description,0,75)}}</p>
										</div>
										<div class="department-viewd-btn services-btn-main-box">
											<a href="{{url('departmentdetail').'/'.$d->id}}">{{__('messages.View Detail')}}</a>
										</div>
									</div>
								  </div>
								  @endif
								  <?php $i++?>
								@endforeach
							@endif
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

@stop
