@extends('front.layout')
@section('title')
 {{__('messages.Gallery')}}
@stop
@section('loader')
<div id="overlayer"></div>
<span class="loader"><span class="loader-inner"></span></span>
@stop
@section('content')
  <div class="doctorpg-main-box">
		<div class="container">
			<div class="global-heading">
				<h2>{{__('messages.Gallery')}}</h2>
				<p>{{__('messages.Every artist was first an amateur')}}</p>
			</div>
			<div class="doctorpg-tab-mainbox">
			    <section class="customer-logos slider tab">
			      	<div class="slide tablinks" id="defaultOpen" onclick="openCity(event, 'all')">
			      		All
			      	</div>
			      	@if(count($albumlist)>0)
				      	@foreach($albumlist as $a)
				      	<div class="slide tablinks" onclick="openCity(event, '{{$a->id}}')">
				      		{{$a->name}}
				      	</div>
				       @endforeach
				    @endif
			    </section>
			</div>
			<div id="all" class="tabcontent">
				<div class="row" data-aos-anchor-placement="top-bottom">
						   <?php $arr=array();?>
							@foreach($albumlist as $a)
							   @foreach($a->gallerydata as $ab)
							      <?php $arr[]=$ab->image;?>
						       @endforeach
							@endforeach
							<?php
							      if(count($arr)>0){
							      		$onecolimg=count($arr)/3;
										$onecolimg=round($onecolimg);
										$k=0;
										for ($i=1; $i < 4; $i++) {
											echo '<div class="col-md-4">';
											for ($j=$k; $j < $onecolimg*$i ; $j++) {
											    if(isset($arr[$j])){
											    		echo '<div class="facility-part-main-box"><div class="facility-img-main-box">
													<img src="'.asset('upload/gallery').'/'.$arr[$j].'">
												</div></div>';
												$k=$k+1;
											    }

											}
											echo "</div>";
										}
							      }
							?>
				</div>
			</div>
			@if(count($albumlist)>0)
				@foreach($albumlist as $a)
				    <div id="{{$a->id}}" class="tabcontent" >
						<div class="row" data-aos-anchor-placement="top-bottom">
									<?php $arr=array();?>
									 @foreach($a->gallerydata as $ab)
									<?php $arr[]=$ab->image;?>
									@endforeach
									<?php
							      if(count($arr)>0){
							      		$onecolimg=count($arr)/3;
										$onecolimg=round($onecolimg);
										$k=0;
										for ($i=1; $i < 4; $i++) {
											echo '<div class="col-md-4">';
											for ($j=$k; $j < $onecolimg*$i ; $j++) {
											    if(isset($arr[$j])){
											    		echo '<div class="facility-part-main-box"><div class="facility-img-main-box">
													<img src="'.asset('upload/gallery').'/'.$arr[$j].'">
												</div></div>';
												$k=$k+1;
											    }

											}
											echo "</div>";
										}
							      }
							?>
						</div>
					</div>
				 @endforeach
			@endif
			</div>
		</div>
	</div>
@stop
