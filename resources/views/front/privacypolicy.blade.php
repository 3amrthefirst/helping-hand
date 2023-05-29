@extends('front.layout')
@section('title')
 {{__("messages.Privacy Policy")}}
@stop
@section('content')
   <div class="departmentpg-main-box">
		<div class="container">
			<div class="global-heading">
				<h2>{{__("messages.Privacy Policy")}}</h2>
				<p>{{__("messages.People should think things out fresh and not just accept conventional terms and the conventional way of doing things")}}</p>
			</div>
			<div class="department-part-main-box">
				<div class="row termsmar">
					<?=html_entity_decode($setting->privacy_policy)?>
				</div>
			</div>
		</div>
	</div>
@stop