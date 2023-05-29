@extends('front.layout')
@section('title')
 {{__('messages.Terms & Condition')}}
@stop
@section('content')
   <div class="departmentpg-main-box">
		<div class="container">
			<div class="global-heading">
				<h2>{{__('messages.Terms & Condition')}}</h2>
				<p>{{__("messages.People should think things out fresh and not just accept conventional terms and the conventional way of doing things")}}</p>
			</div>
			<div class="department-part-main-box">
				<div class="row termsmar">
					<?=html_entity_decode($setting->terms_condition)?>
				</div>
			</div>
		</div>
	</div>
@stop