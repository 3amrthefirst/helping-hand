@extends('front.layout')
@section('title')
 {{__('messages.Department')}}
@stop
@section('content')
  <div class="departmentpg-main-box">
		<div class="container">
			<div class="global-heading">
				<h2>{{__('messages.Department')}}</h2>
				<p>{{__('messages.Goodness and hard work are rewarded with respect')}}</p>
			</div>
			<div class="department-part-main-box">
				<div class="row">
					@if(count($department)>0)
						@foreach($department as $d)
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
						@endforeach
					@endif
				</div>
			</div>
		</div>
	</div>

@stop
