@extends('front.layout')
@section('title')
 {{__('messages.Facilities')}}
@stop
@section('content')
   <div class="departmentpg-main-box">
		<div class="container">
			<div class="global-heading">
				<h2>{{__('messages.Facilities')}}</h2>
				<p>{{__('messages.The best way to predict the future is to invent it')}}</p>
			</div>
			<div class="department-part-main-box">
				<div class="row">
					@if(count($facilites)>0)
					<?php $i=0;?>
						@foreach($facilites as $d)

							<div class="col-lg-3 col-md-4 col-sm-6" data-aos="fade-right">
								@if($i%2==0)
 							  <div class="services-part-box services-part1-box">
 							@else
 							  <div class="services-part-box services-part2-box">
 							@endif

									<div class="department-part-img">
										<img src="{{asset('upload/service').'/'.$d->icon}}">
									</div>
									<div class="text-detail-box">
										<h4>{{$d->name}}</h4>
										<p>{{substr($d->description,0,100)}}</p>
									</div>


							</div>
						</div>
						<?php $i++; ?>
						@endforeach
					@endif
				</div>
			</div>
		</div>
	</div>
@stop
@section('footer')
<script>
  AOS.init();
</script>
@stop
