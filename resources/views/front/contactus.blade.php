@extends("front.layout")
@section("title")
{{__("messages.Contact Us")}}
@stop
@section("meta_title")
<meta name="title" content='{{__("messages.Contact Us")}}'>
<meta name="description" content='{{__("messages.Do you have any questions? Please do not hesitate to contact us directly")}}'/>
@stop
@section("content")
 <div class="contactpg-main-box">
		<div class="contactpg-part1-main-box">
			<div class="part1-part-main-box">
				<div class="part1-part-box">
					<div class="global-heading">
						<h2>{{__("messages.Contact Us")}}</h2>
						<p>{{__("messages.Do you have any questions? Please do not hesitate to contact us directly")}}</p>
					</div>
					<div class="part-form-main-box">
						@if(Session::get("message"))
                     <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                        {{Session::get("message")}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                        </button>
                     </div>
                     @endif
						<form action="{{url('savecontact')}}" method="post">
							 {{csrf_field()}}
							<input type="text" required name="name" id="name" placeholder="{{__('messages.Enter Your Full Name')}}">
							<input type="email" required name="email" id="name" placeholder="{{__('messages.Enter Your Email')}}">
							<input type="text" required name="topic" id="topic" placeholder="{{__('messages.Your query topic')}}">
							<input type="text" required name="phone" id="phone" placeholder="{{__('messages.Enter Phone number')}}">
							<textarea name="message" required id="message" placeholder="{{__('messages.Enter Your Messages')}}"></textarea>
							<button type="submit">{{__("messages.Submit")}}</button>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="contactpg-part2-main-box">
			<div class="part1-part-main-box">
				<div class="part2-first-main-box">
					<div class="part2-part-main-box">
						<div class="part2-icon-main-box">
							<img src="{{asset('front/img/cphone.png')}}">
						</div>
						<h3>{{__('messages.Call us')}}</h3>
						<p>{{$setting->phone_no}}</p>
					</div>
					<div class="part2-part-main-box">
						<div class="part2-icon-main-box">
							<img src="{{asset('front/img/cmail.png')}}">
						</div>
						<h3>{{__('messages.Email address')}}</h3>
						<p>{{$setting->email}}</p>
					</div>
					<div class="part2-part-main-box part2-part-font-main-box">
						<p>{{__('messages.Our team will come back to you within a matter of hours to help you')}}</p>
						<div class="part2-icon-main-box">
							<a href="{{$setting->facebook_id}}"><i class="fab fa-facebook-f"></i></a>
						</div>
						<div class="part2-icon-main-box">
							<a href="{{$setting->instagram_id}}"><i class="fab fa-instagram"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop
