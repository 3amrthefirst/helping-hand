@extends('front.layout')
@section('title')
{{__("messages.Subscription")}}
@stop
@section('content')
<?php
 $res_curr=explode("-",$setting->currency);

?>
<meta name="csrf-token" content="{{ csrf_token() }}" />
<?php
     if(Session::get("payment_done")){
        $cs="block";
     }else{
        $cs="none";
     }
?>
<div class="modal" id="ssuccess" style="display:<?=$cs?>">
        <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-body">
                <div class="ssuccess-main-box">
                  <div class="success-icon">
                    <img src="{{asset('upload/correct.png')}}">
                  </div>
                  <div class="success-bottom-part">
                    <div class="success-heading">
                      <h3>{{__('messages.Subscription successfully')}}</h3>
                    </div>
                    <div class="success-des">
                      <p>{{__('messages.sublin1')}} </p>
                      <p>{{__("messages.sublin2")}}</p>
                    </div>
                    <div class="success-buttons-main-box">
                      <div class="success-buttons">
                        <a href="{{url('chatarea/1')}}" onclick="closemode()" >{{__("messages.lets chat")}}</a>
                      </div>
                      <div class="success-buttons">
                        <a onclick="closemode()" target="_blank" href="https://mail.google.com/mail/?view=cm&fs=1&to={{$setting->email}}&su=Package {{$subscription->name}} &body={{$subscription->description}}">{{__('messages.Send email')}}</a>
                      </div>
                      <div class="success-buttons">
                        <button type="button">{{__("messages.Call")}} ({{$setting->phone_no}})</button>
                      </div>
                      <div class="success-buttons">
                        <a href="{{url('/')}}" >{{__("messages.Visit Hospital")}}</a>
                      </div>
                    </div>
                  </div>
                  <div class="success-close-button">
                    <button type="button" class="btn btn-secondary" onclick="closemode()">{{__("messages.Ok Great")}}</button>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <div class="ssuccess-background-black">
        </div>
    </div>
<div class="d-detailpg-main-box">
   <div class="container">
      <div class="global-heading">
         <h2>{{__("messages.Subscription")}}</h2>
         <p>{{__('messages.The life so short, the craft so long to learn')}}</p>
      </div>
      <div class="d-detailpg-part-main-box">
         <div class="row">
            <div class="col-md-8">
               @if(session('success_msg'))
                    <div class="alert alert-success fade in alert-dismissible show">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                         <span aria-hidden="true">×</span>
                        </button>
                        {{ session('success_msg') }}
                    </div>
                    @endif
                    @if(session('error_msg'))
                    <div class="alert alert-danger fade in alert-dismissible show">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">×</span>
                        </button>
                        {{ session('error_msg') }}
                    </div>
                    @endif
               <div class="container">
                  <div id="accordion" class="accordion">
                     <div class="card mb-0">
                        @if(Auth::id())
                        <div class="card-header collapsed" href="#collapseOne">
                           <a class="card-title">
                           {{Auth::user()->name}}
                           </a>
                        </div>
                        @else
                        <div class="card-header collapsed"  href="#collapseOne">
                           <a class="card-title">
                           {{__("messages.Returning Patient")}} <span class="sublogin"> {{__("messages.Click here to login")}}</span>
                           </a>
                        </div>
                        @endif
                         @if(Auth::id())
                        <div id="collapseOne" class="card-body collapse" data-parent="#accordion" >
                        	@else
                        	 <div id="collapseOne" class="card-body collapse collapse in" data-parent="#accordion" >
                        	@endif
                           <div class="part-form-main-box">
                              <form method="post" action="{{url('userlogin')}}" class="btnsaveoption">
                                 {{csrf_field()}}
                                 <span id="login_error" class="dangerrequired"></span>
                                 <input type="text" class="modelemail" name="email" placeholder="{{__('messages.Enter Your Email')}}" id="login_email">
                                 <span id="login_email_error" class="dangerrequired"></span>
                                 <input type="password" id="login_password" name="password" placeholder="{{__('messages.Enter Your Password')}}">
                                 <span id="login_password_error" class="dangerrequired"></span>
                                 <div class="btnsublogin">
                                    <button type="submit" class="btneee">{{__('messages.Login')}}</button>
                                 </div>
                              </form>
                              <p>{{__("messages.Don't have an account?")}} <a href="" onclick="showregmodel()" data-toggle="modal" data-target="#myModal">{{__('messages.Register Now')}}</a></p>
                           </div>
                        </div>
                        @if(Auth::id())
                        <div class="card-header collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                        @else
                        <div class="card-header collapsed" data-parent="#accordion" href="#collapseTwo">
                        @endif
                           <a class="card-title">
                           {{__("messages.Payment Information")}}
                           </a>
                        </div>
                          @if(Auth::id())
                        <div id="collapseTwo" class="card-body collapse collapse in" data-parent="#accordion" >
                        	@else
                        	  <div id="collapseTwo" class="card-body collapse" data-parent="#accordion" >
                        	@endif

                           <div class="part-form-main-box">
                           	   @php
                                  $months = array(1 => 'Jan', 2 => 'Feb', 3 => 'Mar', 4 => 'Apr', 5 => 'May', 6 => 'Jun', 7 => 'Jul', 8 => 'Aug', 9 => 'Sep', 10 => 'Oct', 11 => 'Nov', 12 => 'Dec');
                               @endphp
                              <form>
                                @foreach($payment as $p)
                                 @if($p->id==2)
                                   <div class="radio" class="subradio">
                                        <input id="radio-{{$p->id}}" name="payment" type="radio" value="{{$p->id}}" onclick="showbrain('1')">
                                        <label for="radio-{{$p->id}}" class="radio-label">
                                          <img src="{{ asset('upload/payment/').'/'.$p->Image }}" id="visa" class="payimg" >
                                        </label>
                                  </div>
                                 @endif
                                 @if($p->id==1)
                                    <div class="radio" class="subradio">
                                        <input id="radio-{{$p->id}}" name="payment" type="radio" value="{{$p->id}}" data-toggle="modal" data-target="#autoization" onclick="showbrain('0')">
                                        <label for="radio-{{$p->id}}" class="radio-label">
                                          <img src="{{ asset('upload/payment/').'/'.$p->Image }}" id="visa" class="payimg" >
                                        </label>
                                   </div>
                                 @endif

                                @endforeach


                              </form>
                              <div id="braintreediv" class="is_hide">
                                 <form method="post" id="payment-form" action="{{url('checkoutbrain')}}">
                                    {{csrf_field()}}
                                              <input type="hidden" name="package_id" value="{{isset($subscription->id)?$subscription->id:''}}">
                                              <div class="row">
                                                <div class="form-group owner col-md-8">
                                                    <label for="owner">{{__('messages.date')}}</label>
                                                    <input type="date" class="form-control" id="package_date" name="package_date" value="" required>

                                                </div>
                                                <div class="form-group CVV col-md-4">
                                                    <label for="cvv">{{__('messages.time')}}</label>
                                                    <input type="time" class="form-control" id="package_time" name="package_time" value="" required>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group owner col-md-8">
                                                    <label for="owner">{{__('messages.Name')}}</label>
                                                    <input type="text" class="form-control" id="owner" name="subscribername" value="{{ old('owner') }}" required>

                                                </div>
                                                 <div class="form-group col-md-4" >
                                                    <label for="amount">{{__('messages.Amount')}}</label>
                                                    <input type="text" class="form-control" id="amount" name="amount" value="{{isset($subscription->price)?$subscription->price:''}}" readonly>


                                                </div>
                                            </div>
                                            <div class="bt-drop-in-wrapper">
                                                <div id="bt-dropin"></div>
                                            </div>
                                                <input id="nonce" name="payment_method_nonce" type="hidden" />
                                                <button class="button" type="submit"><span>{{__('messages.Confirm Payment')}}</span></button>
                                 </form>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-4">
               <div class="card mb-0">
                  <div class="card-header">
                   {{__("messages.Cart Details")}}
                  </div>
                  <div class="card-body">
                     <div>
                        <label>{{__("messages.Package Name")}}</label>
                        <span class="floatright" id="packagename">{{$subscription->name}}</span>
                     </div>
                     <div>
                        <label>{{__("messages.Price")}}</label>
                        <span class="floatright">{{$res_curr[1]}}<span id="packageprice">{{$subscription->price}}</span></span>
                     </div>

                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<script src="https://js.braintreegateway.com/web/dropin/1.23.0/js/dropin.min.js"></script>
    <script>
        var form = document.querySelector('#payment-form');
        var client_token = "{{$token}}";

        braintree.dropin.create({
          authorization: client_token,
          selector: '#bt-dropin',
          paypal: {
            flow: 'vault'
          }
        }, function (createErr, instance) {
          if (createErr) {
            console.log('Create Error', createErr);
            return;
          }
          form.addEventListener('submit', function (event) {
            event.preventDefault();

            instance.requestPaymentMethod(function (err, payload) {
              if (err) {
                console.log('Request Payment Method Error', err);
                return;
              }

              // Add the nonce to the form and submit
              document.querySelector('#nonce').value = payload.nonce;
              form.submit();
            });
          });
        });
    </script>
@stop
