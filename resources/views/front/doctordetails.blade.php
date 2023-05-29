@extends('front.layout')
@section('title')
{{__('messages.Doctor Details')}}
@stop
@section('content')
<div class="d-detailpg-main-box">
<div class="container">
   <div class="d-detailpg-part-main-box">
      <div class="row">
         <div class="col-lg-9 col-md-12">
            @if(Session::get("message"))
            <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
               {{Session::get("message")}}
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">×</span>
               </button>
            </div>
            @endif
            <div class="row">
               <div class="col-md-5">
                  <?php if ($doctor->image) {
                     $image = asset('upload/doctor') . "/" . $doctor->image;
                     } else {
                     $image = asset('upload/profile/profile.png');
                     }
                     ?>
                  <div class="doctor-detail-img-box" style="background-image: url('<?= $image ?>')">
                  </div>
               </div>
               <div class="col-md-7">
                  <div class="doctor-detail-main-box">
                     <h4>{{$doctor->name}}</h4>
                     <h6>{{isset($doctor->department)?$doctor->department->name:""}}</h6>
                     <span>
                        <?php
                           $arr = explode(".", $doctor->ratting);

                           if (!empty($arr[0])) {
                               $i = 0;
                               if (isset($arr[0])) {
                                   for ($i = 0; $i < $arr[0]; $i++) {
                                       echo '<i class="fas fa-star"></i>';
                                   }
                               }
                               if (isset($arr[1])) {
                                   $remaing = 5 - $i;
                                   for ($j = 0; $j < $remaing; $j++) {
                                       echo '<i class="fas fa-star doctor-review-s-color"></i>';
                                   }
                               } else {
                                   $remaing = 5 - $i;
                                   for ($j = 0; $j < $remaing; $j++) {
                                       echo '<i class="fas fa-star doctor-review-s-color"></i>';
                                   }
                               }
                               if ($i == 0) { ?>
                        <i class="fas fa-star doctor-review-s-color"></i>
                        <i class="fas fa-star doctor-review-s-color"></i>
                        <i class="fas fa-star doctor-review-s-color"></i>
                        <i class="fas fa-star doctor-review-s-color"></i>
                        <i class="fas fa-star doctor-review-s-color"></i>
                        <?php }
                           } else {
                                ?>
                        <i class="fas fa-star doctor-review-s-color"></i>
                        <i class="fas fa-star doctor-review-s-color"></i>
                        <i class="fas fa-star doctor-review-s-color"></i>
                        <i class="fas fa-star doctor-review-s-color"></i>
                        <i class="fas fa-star doctor-review-s-color"></i>
                        <?php
                           }
                           ?>
                        <h3>( {{$doctor->total_ratting}} {{__('messages.Rating')}} )</h3>
                     </span>
                     <p>{{substr($doctor->about_us,0,250)}}</p>
                     <div class="icons-images doctor-detail-icon-box">
                        <span class="facebook-doctorl">
                        <a href="{{isset($doctor->facebook_id)?$doctor->facebook_id:''}}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                        </span>
                        <span class="twitter-doctorl">
                        <a href="{{isset($doctor->twitter_id)?$doctor->twitter_id:''}}" target="_blank"><i class="fab fa-twitter"></i></a>
                        </span>
                        <span class="gp-doctorl">
                        <a href="{{isset($doctor->google_id)?$doctor->google_id:''}}" target="_blank"><i class="fab fa-google-plus-g"></i></a>
                        </span>
                        <span class="instagram-doctorl">
                        <a href="{{isset($doctor->instagram_id)?$doctor->instagram_id:''}}" target="_blank"><img src="{{asset('front/img/instagram.png')}}"></a>
                        </span>
                     </div>
                     <div class="appo-btn-main-box">
                        @if(Auth::id())
                        <a href="#" data-toggle="modal" data-target="#appointmentModal" onclick="changedatamodelapp('{{$doctor->department_id}}','{{$doctor->department->name}}','{{$doctor->user_id}}','{{$doctor->name}}')">{{__('messages.Make an appointment')}}</a>
                        @else
                        <a href="#" type="button" onclick="changehiddenstatus()" data-toggle="modal" data-target="#myModal">{{__('messages.Make an appointment')}}</a>
                        @endif
                        <a href="{{url('chatarea/').'/'.$doctor->user_id}}">{{__('messages.Chat with Doctor')}}</a>
                     </div>
                  </div>
               </div>
            </div>
            <div class="d-detail-main-box">
               <div class="d-pricelist-main-box">
                  <div class="global-part-heading global-heading">
                     <h3>{{__('messages.Working time')}}</h3>
                  </div>
                  <div class="row">
                     <div class="col-lg-6 col-md-6">
                        <div class="pricelist-part-detail-mainbox">
                           <?php $arr = [__('messages.Monday'), __('messages.Tuesday'), __('messages.Wednesday'), __('messages.Thursday'), __('messages.Friday'), __('messages.Saturday'), __('messages.Sunday')]; ?>
                           <div class="pricelist-part-detail-box">
                              <p>{{$arr[0]}}</p>
                              <?php if (isset($doctor->TimeTabledata[0])) {
                                 $starttime = date_format(date_create($doctor->TimeTabledata[0]->from), "H:i a");
                                 $endtime = date_format(date_create($doctor->TimeTabledata[0]->to), "h:i a");
                                 } ?>
                              <span>- {{$starttime}} {{__('messages.To')}} {{$endtime}}</span>
                           </div>
                           <div class="pricelist-part-detail-box">
                              <p>{{$arr[1]}}</p>
                              <?php if (isset($doctor->TimeTabledata[1])) {
                                 $starttime = date_format(date_create($doctor->TimeTabledata[1]->from), "H:i a");
                                 $endtime = date_format(date_create($doctor->TimeTabledata[1]->to), "h:i a");
                                 } ?>
                              <span>- {{$starttime}} {{__('messages.To')}} {{$endtime}}</span>
                           </div>
                           <div class="pricelist-part-detail-box">
                              <p>{{$arr[2]}}</p>
                              <?php if (isset($doctor->TimeTabledata[2])) {
                                 $starttime = date_format(date_create($doctor->TimeTabledata[2]->from), "H:i a");
                                 $endtime = date_format(date_create($doctor->TimeTabledata[2]->to), "h:i a");
                                 } ?>
                              <span>- {{$starttime}} {{__('messages.To')}} {{$endtime}}</span>
                           </div>
                           <div class="pricelist-part-detail-box">
                              <p>{{$arr[3]}}</p>
                              <?php if (isset($doctor->TimeTabledata[3])) {
                                 $starttime = date_format(date_create($doctor->TimeTabledata[3]->from), "H:i a");
                                 $endtime = date_format(date_create($doctor->TimeTabledata[3]->to), "h:i a");
                                 } ?>
                              <span>- {{$starttime}} {{__('messages.To')}} {{$endtime}}</span>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-6 col-md-6">
                        <div class="pricelist-part-detail-mainbox">
                           <div class="pricelist-part-detail-box">
                              <p>{{$arr[4]}}</p>
                              <?php if (isset($doctor->TimeTabledata[4])) {
                                 $starttime = date_format(date_create($doctor->TimeTabledata[4]->from), "H:i a");
                                 $endtime = date_format(date_create($doctor->TimeTabledata[4]->to), "h:i a");
                                 } ?>
                              <span>- {{$starttime}} to {{$endtime}}</span>
                           </div>
                           <div class="pricelist-part-detail-box">
                              <p>{{$arr[5]}}</p>
                              <?php if (isset($doctor->TimeTabledata[5])) {
                                 $starttime = date_format(date_create($doctor->TimeTabledata[5]->from), "H:i a");
                                 $endtime = date_format(date_create($doctor->TimeTabledata[5]->to), "h:i a");
                                 }
                                 ?>
                              <span>- {{$starttime}} to {{$endtime}}</span>
                           </div>
                           <div class="pricelist-part-detail-box">
                              <p>{{$arr[6]}}</p>
                              <?php if (isset($doctor->TimeTabledata[6])) {
                                 $starttime = date_format(date_create($doctor->TimeTabledata[6]->from), "H:i a");
                                 $endtime = date_format(date_create($doctor->TimeTabledata[6]->to), "h:i a");
                                 }
                                 ?>
                              <span>- {{$starttime}} to {{$endtime}}</span>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="doctorpg-tab-mainbox doctordetailpg-tab-mainbox">
               <section class="customer-logos slider tab">
                  <div class="slide tablinks" id="defaultOpen" onclick="openCity(event, 'aboutus')">
                     {{__('messages.About us')}}
                  </div>
                  <div class="slide tablinks" onclick="openCity(event, 'services')">
                     {{__('messages.Service')}}
                  </div>
                  <div class="slide tablinks" onclick="openCity(event, 'addreview')">
                     {{__('messages.Add review')}}
                  </div>
               </section>
            </div>
            <div id="aboutus" class="tabcontent">
               <div class="dd-tab-part-mbox">
                  <div class="global-part-heading global-heading">
                     <h3>{{__('messages.About us')}}</h3>
                     <p>{{$doctor->about_us}}</p>
                  </div>
               </div>
            </div>
            <div id="services" class="tabcontent">
               <div class="dd-tab-part-mbox">
                  <div class="global-part-heading global-heading">
                     <h3>{{__('messages.Service')}}</h3>
                     <p>{{$doctor->service}}</p>
                  </div>
               </div>
            </div>
            <div id="addreview" class="tabcontent">
               @if(Auth::id())
               <div class="dd-tab-part-mbox">
                  <div class="global-part-heading global-heading">
                     <h3>{{__('messages.Add review')}}</h3>
                     <span id="loginerrorreview"></span>
                     <form action="{{url('addreview')}}" method="post">
                        {{csrf_field()}}
                        <input type="hidden" name="doctor_id" value="{{$id}}">
                        <div class="yourrating-main-box">
                           <h5>{{__("messages.Your rating")}}</h5>
                           <span class="star-rating">
                           <input type="radio" id="5-stars" name="rating" value="5" />
                           <label for="5-stars" class="star"><i class="fas fa-star"></i></label>
                           <input type="radio" id="4-stars" name="rating" value="4" />
                           <label for="4-stars" class="star"><i class="fas fa-star"></i></label>
                           <input type="radio" id="3-stars" name="rating" value="3" />
                           <label for="3-stars" class="star"><i class="fas fa-star"></i></label>
                           <input type="radio" id="2-stars" name="rating" value="2" />
                           <label for="2-stars" class="star"><i class="fas fa-star"></i></label>
                           <input type="radio" id="1-star" name="rating" value="1" />
                           <label for="1-star" class="star"><i class="fas fa-star"></i></label>
                           </span>
                        </div>
                        <div class="yourrating-main-box">
                           <h5>{{__('messages.Your review')}}</h5>
                           <textarea id="messages" name="messages" required=""></textarea>
                           <div class="appo-btn-main-box">
                              @if(Auth::id())
                              <button type="submit">{{__('messages.submit')}}</button>
                              @else
                              <button type="button" onclick="userloginalert()">{{__('messages.submit')}}</button>
                              @endif
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
               @else
               <p style="margin-top: 15px;">
                  {{__("messages.Please")}} <a href="#" onclick="showloginmodel()" data-toggle="modal" data-target="#myModal">{{__("messages.Login")}}</a> {{__("messages.Your Account Then Try To Review")}}
                  @endif
               </p>
            </div>
         </div>
         <div class="col-lg-3 col-md-12">
            <div class="d-detail-emergency-mainbox">
               <img src="{{asset('front/img/emergency.png')}}">
               <p>{{__('messages.Emergency Number')}}</p>
               <h4>{{$doctor->phone_no}}</h4>
            </div>
            <div class="d-detail-emergency-mainbox">
               <img src="{{asset('front/img/mailoutline.png')}}">
               <p>{{__('messages.Email address')}}</p>
               <h4>{{$doctor->email}}</h4>
            </div>
            <div class="d-detail-collapse-doctor">
               <div class="accordion indicator-plus-before round-indicator" id="accordionH" aria-multiselectable="true">
                  <div class="card m-b-0">
                     @if($departmentdetails->doctor)
                     <?php $i = 0; ?>
                     @foreach($departmentdetails->doctor as $doc)
                     @if($doc->user_id!=$id)
                     <div class="card-header collapsed" role="tab" id="heading{{$i}}" href="#collapse{{$i}}" onclick="changedoctorblog('{{$i}}')" data-parent="#accordion{{$i}}" aria-expanded="false" aria-controls="collapse{{$i}}">
                        <a class="card-title">
                        {{ucwords(strtolower($doc->name))}}
                        </a>
                     </div>
                     @if($i==0)
                     <div class="collapse in" id="collapse{{$i}}" role="tabpanel" aria-labelledby="heading{{$i}}">
                        @else
                        <div class="collapse" id="collapse{{$i}}" role="tabpanel" aria-labelledby="heading{{$i}}">
                           @endif
                           <div class="card-body">
                              <div class="doctorl-part-box">
                                 <?php if ($doc->image) {
                                    $image = asset('upload/doctor') . "/" . $doc->image;
                                    } else {
                                    $image = asset('upload/profile/profile.png');
                                    } ?>
                                 <div class="doctorl-dp-img doctorl-dp-img-1" style="background-image: url('<?= $image ?>')"></div>
                                 <div class="doctor-detail-part">
                                    <div class="doctorl-part-detail">
                                       <h4>{{$doc->name}}</h4>
                                       <p>{{substr($doc->about_us,0,50)}}</p>
                                    </div>
                                    <div class="icons-images">
                                       <span class="facebook-doctorl">
                                       <a href="{{isset($doc->facebook_id)?$doc->facebook_id:''}}"><i class="fab fa-facebook-f"></i></a>
                                       </span>
                                       <span class="twitter-doctorl">
                                       <a href="{{isset($doc->twitter_id)?$doc->twitter_id:''}}"><i class="fab fa-twitter"></i></a>
                                       </span>
                                       <span class="gp-doctorl">
                                       <a href="{{isset($doc->google_id)?$doc->google_id:''}}"><i class="fab fa-google-plus-g"></i></a>
                                       </span>
                                       <span class="instagram-doctorl">
                                       <a href="{{isset($doc->instagram_id)?$doc->instagram_id:''}}"><img src="{{asset('front/img/instagram.png')}}"></a>
                                       </span>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <?php $i++; ?>
                        @endif
                        @endforeach
                        @endif
                        <input type="hidden" id="avilabledoctor" value="{{$i}}">
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@if(count($review)>0)
<div class="testimonial-main-box">
   <div class="container">
      <div class="global-heading">
         <h2>{{__('messages.Patient Reviews')}}</h2>
         <p>{{__('messages.reviewline')}}</p>
      </div>
      <div class="testimonial-part-main-box">
         <div class="owl-carousel testimonial-carousel">
            @foreach($review as $r)
            @if(isset($r->users))
           	<div class="single-testimonial">
						    	<div class="testimonial-part-box">
						    		<div class="testimonial-inner-images">
						    		    <div class="col-md-3 testimage">
						    		        <?php
						    				 if($r->users->profile_pic!=""){
									     	   		$image=asset('upload/profile')."/".$r->users->profile_pic;
									     	   }elseif(isset($r->doctors)&&isset($r->doctors-> $image)){
									     	   		$image=asset('upload/doctor')."/".$r->doctors->image;
									     	   }else{
									     	   		 $image=asset('upload/profile/profile.png');
									     	   }
						    			?>
						    			<img src="{{$image}}" class="testimonial-profile-img">
						    		    </div>
						    		    <div class="col-md-9 testtext">
						    		        	<p class="testip">{{$r->review}}</p>
						    				<span class="testimonialspan"></span>
						    			@if(isset($r->users->name))
						    			<h3 class="testimonialh">- {{$r->users->name}}</h3>
						    			@endif
						    		    </div>
						    		</div>
						    	</div>
						  	</div>
            @endif
            @endforeach
         </div>
      </div>
   </div>
</div>
@endif
@stop
