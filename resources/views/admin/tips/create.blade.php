@extends('admin.layout')
@section('title')
    Tips
@stop
@section('content')
<div class="breadcrumbs">
   <div class="col-sm-4">
      <div class="page-header float-left">
         <div class="page-title">
            <h1>Save Tips</h1>
         </div>
      </div>
   </div>
   <div class="col-sm-8">
      <div class="page-header float-right">
         <div class="page-title">
            <ol class="breadcrumb text-right">
               <li><a href="{{url('admin/tips')}}">Tips</a></li>
               <li class="active">Save Tips</li>
            </ol>
         </div>
      </div>
   </div>
</div>
<div class="content mt-3">
   <div class="animated fadeIn">
      <div class="row rowcenter">
         <div class="col-md-9">
            <div class="card">
               <div class="card-body">
                  @if(Session::has('message'))
                  <div class="col-sm-12">
                     <div class="alert  {{ Session::get('alert-class', 'alert-info') }} alert-dismissible fade show" role="alert">{{ Session::get('message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                     </div>
                  </div>
                  @endif
                  @if ($errors->any())
                  <div class="alert alert-danger">
                     <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                     </ul>
                  </div>
                  @endif
                  <form action="{{route('tips.store')}}" method="post" novalidate="novalidate" enctype="multipart/form-data">
                     {{csrf_field()}}
{{--                     <input type="hidden" name="id" id="id" value="{{$department_id}}"/>--}}
                     <input type="hidden" name="real_image" id="real_image" value="{{ isset($data->image)?$data->image:''}}"/>
                     <div class="form-group">
                        <label for="name" class=" form-control-label">
                        Title
                        <span class="reqfield">*</span>
                        </label>
                        <input type="text" id="name" placeholder="{{__('messages.Enter') }} Title" class="form-control" required name="title" value="{{ isset($data->name)?$data->name:''}}">
                     </div>
                     <div class="form-group">
                        <label for="file" class=" form-control-label">
                        {{__('messages.Image')}}<span class="reqfield" >*</span>
                        </label>
{{--                        @if($department_id!=0)--}}
{{--                        <img src="{{asset('upload/department').'/'.$data->image}}" class="imgsize1 departmentimg"/>--}}
{{--                        @endif--}}
                        <div>
                           <input type="file" id="file" name="image" class="form-control-file" accept="image/*">
                        </div>
                     </div>
                     <div>
                        @if(Session::get("is_demo")=='1')
                           <button id="payment-button" type="button"  onclick="disablebtn()" class="btn btn-lg btn-info" >
                              {{__('messages.Submit')}}
                              </button>
                        @else
                            <button id="payment-button" type="submit" class="btn btn-lg btn-info" >
                              {{__('messages.Submit')}}
                              </button>
                        @endif

                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

@stop
