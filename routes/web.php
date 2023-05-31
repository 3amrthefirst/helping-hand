<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function() {
   Artisan::call('config:cache');
    return redirect('home');
});
 Route::get("/brain","braintreeController@showbrain");

 Route::get("add_doctor_review","AuthenticatedoctorController@show_product_review_user");
 Route::post("checkoutbrain","braintreeController@checkoutbrain");
Route::get("sendnotification","FrontController@sendnotification");
Route::get("privacy_policy","HomeController@privacy");
Route::group(['prefix' => '/'], function () {
     Route::get('auth/{driver}', 'Auth\FacebookController@redirectToProvider')->name('social.oauth');
     Route::get('auth/{driver}/callback', 'Auth\FacebookController@handleProviderCallback')->name('social.callback');
     Route::get("/","FrontController@showhome");
     Route::get("getserviceanddoctor/{id}","FrontController@getserviceanddoctor");
     Route::post("bookappoinment","FrontController@bookappoinment");
     Route::get("allfacilites","FrontController@allfacilites");
     Route::get("department","FrontController@department");
     Route::get("departmentdetail/{id}","FrontController@departmentdetail");
     Route::get("doctorlist","FrontController@doctorlist");
     Route::get("gallery","FrontController@gallery");
     Route::get("contact_us","FrontController@contact_us");
     Route::any("savecontact","FrontController@savecontact");
     Route::any("savesubscribe/{email}","FrontController@savesubscribe");
     Route::any("pricing","FrontController@pricing");
     Route::any("termcondition","FrontController@termcondition");
     Route::any("privacypolicy","FrontController@privacypolicy");
     Route::get("postregister","FrontController@postregister");
     Route::get("postlogin","FrontController@postlogin");
     Route::get("userlogout","FrontController@userlogout");
     Route::get("postforgot","FrontController@postforgot");
     Route::get("doctordetails/{id}","FrontController@doctordetails");
     Route::any("addreview","FrontController@addreview");
     Route::post("mediaupload","FrontController@mediaupload");
     Route::post("deletemedia","FrontController@deletemedia");


     Route::get("myaccount","FrontController@myaccount");
     Route::post("updateprofile","FrontController@updateprofile");
     Route::get("checkcurrentpwd","FrontController@checkcurrentpwd");
     Route::any("changepasswords","FrontController@changepasswords");

     Route::any("chat/{id}","ChatsController@showchat");
     Route::any("chatarea","FrontController@show_chat_area");
     Route::get("getchannelmessage/{channel_id}/{second_id}","ChatsController@getchannelmessage");
    // Route::any("chatmediaupload","ChatsController@chatmediaupload");
     Route::any("createchannel/{id}","ChatsController@createchannel");
     Route::get("token","ChatsController@gettoken");
     //Route::get("sendnotification","ChatsController@sendnotification");
     Route::get("deletechatmsg/{msg_id}/{channel_id}/{type}/{irow}","ChatsController@deletechatmsg");
     Route::get("updatechannelmsg","ChatsController@updatechannelmsg");
	 Route::get("getchannelmember","ChatsController@getchannelmember");
	 Route::get("timeformat","ChatsController@timeformatfront");
	 Route::get("settimezone/{time}","HomeController@settimezone");
	 Route::get("getmessagebody/{msg_id}/{channel_id}","ChatsController@getmessagebody");

     Route::get("subscription/{package_id}","SubscriptionController@showorderpage");
     Route::post("userlogin","FrontController@userlogin");

     Route::post("paymentsubscription","SubscriptionController@paymentsubscription");
     Route::get("videosendnotification","ChatsController@videosendnotification");
     Route::get("resetpassword/{code}","FrontController@resetpwd");
     Route::any("resetnewpwd","FrontController@resetpassword");
     Route::Get("getcurrenttime/{offset}","HomeController@getcurrenttime");

});

Route::group(['prefix' => 'admin'], function () {
	 Route::get("/","HomeController@showlogin");
	 Route::post("postlogin","HomeController@postlogin");

     Route::group(['middleware' => ['admincheckexiste']], function () {
		 Route::get("dashboard","HomeController@showdashboard")->name("dashboard");
		 Route::get("logout","HomeController@logout");
         Route::get("settimezone/{time}","HomeController@settimezone");
		 //service
		 Route::resource("service","ServiceController");
		 Route::get("saveservice/{id}","ServiceController@saveservice");
		 Route::post("updateservice","ServiceController@updateservice");
		 Route::get("deleteservice/{id}","ServiceController@deleteservice");
         Route::get("settimezone/{time}","HomeController@settimezone");
		 //department
		 Route::resource("department","DepartmentController");
		 Route::get("savedepartment/{id}","DepartmentController@saveddepartment");
		 Route::post("updatedepartment","DepartmentController@updatedepartment");
		 Route::get("deletedepartment/{id}","DepartmentController@deletedepartment");
		 Route::get("departmentservice/{id}","DepartmentController@departmentservice");
		 Route::get("savedepartmentservice/{dept_id}/{id}","DepartmentController@savedepartmentservice");
		 Route::post("updatedepartmentservice","DepartmentController@updatedepartmentservice");
		 Route::get("deletedepartmentservice/{id}","DepartmentController@deletedepartmentservice");

         //tips
         Route::resource("tips","TipsController");
         Route::get("deletedtip/{id}","TipsController@destroy");

         //doctor
		 Route::resource("doctor","DoctorController");
		 Route::get("savedoctor/{id}/{tab_id}","DoctorController@savedoctor");
		 Route::post("updatedoctorprofile","DoctorController@updatedoctorprofile");
		 Route::get("deletedoctor/{id}","DoctorController@deletedoctor");
		 Route::post("updateworkinghours","DoctorController@updateworkinghours");

		     Route::get("editprofile","HomeController@editprofile");
	       Route::post("updateprofile","HomeController@updateprofile");
	       Route::get("changepassword","HomeController@changepassword")->name("changepassword");
         Route::get("samepwd/{id}","HomeController@check_password_same");
         Route::post("updatepassword","HomeController@updatepassword");

         Route::resource("notification","NotificationController");
         Route::post("savenotification","NotificationController@savenotification");

         //album
         Route::resource("gallery","GalleryController");
         Route::get("savealbum/{id}","GalleryController@savealbum");
         Route::post("updatealbum","GalleryController@updatealbum");
         Route::get("deletealbum/{id}","GalleryController@deletealbum");
         Route::get("addphoto/{album_id}","GalleryController@addphoto");


         Route::any("uploadimage/{album_id}","GalleryController@uploadimage");
         Route::get("deletegalleryphoto/{id}","GalleryController@deletegalleryphoto");

         Route::get("setting/{id}","NotificationController@showsetting");
         Route::post("savebasicsetting","NotificationController@savebasicsetting");
         Route::post("saveserverkey","NotificationController@saveserverkey");
         Route::post("savesitesetting","NotificationController@savesitesetting");
         Route::post("saveterms","NotificationController@saveterms");
         Route::post("saveprivacy","NotificationController@saveprivacy");
         Route::post("saveuploadsection","NotificationController@saveuploadsection");

         Route::get("appointment/{start_date}/{end_date}","AppointmentController@showappointment");

         Route::resource("package","PackageController");
         Route::get("savepackage/{id}","PackageController@savepackage");
         Route::post("updatepackage","PackageController@updatepackage");
         Route::get("deletepackage/{id}","PackageController@deletepackage");
         Route::get("changesettingstatus/{fields}","NotificationController@changesettingstatus");

         Route::get("review","DoctorController@showreview");
         Route::get("deletereview/{id}","DoctorController@deletereview");

        Route::get("news","NotificationController@shownews");
        Route::post("sennews","NotificationController@sendnews");
        Route::get("contactus","HomeController@showcontactus");

        Route::get("patient","HomeController@showpatient");

		Route::get("paymentgateway","PackageController@getpaymentgateway");
		Route::get("editpaymentgateway/{id}","PackageController@editpaymentgateway");
		Route::post("updatepaymentgateway","PackageController@updatepaymentgateway");
		Route::get("changestatuspayment/{pay_id}/{status}","PackageController@changestatuspayment");

        Route::get("subscription","SubscriptionController@showsubscription");
        Route::get("changepackagestatus/{status}/{id}","SubscriptionController@changepackagestatus");
        Route::any("chat","HomeController@showchat")->name("chat");

	 });

});

Route::group(['prefix' => 'doctor'], function () {

       Route::get("/","HomeController@doctorlogin");

       Route::group(['middleware' => ['Doctorcheck']], function () {
 Route::get("settimezone/{time}","HomeController@settimezone");
           Route::get("dashboard","AuthenticatedoctorController@showdashboard");
           Route::get("logout","AuthenticatedoctorController@showlogout");

           Route::any("chat","AuthenticatedoctorController@showchat")->name("chat");


            Route::get("editprofile/{tab_id}","AuthenticatedoctorController@editprofile");
            Route::any("updatedoctorprofile","AuthenticatedoctorController@updatedoctorprofile");
            Route::post("updateworkinghours","AuthenticatedoctorController@updateworkinghours");
           // Route::get("sendnotification","ChatsController@sendnotification");

            Route::get("appointment","AppointmentController@showdoctorappointment");
            Route::get("orderstatus/{order_id}/{appointment_id}","AppointmentController@changeorderstatus");
            Route::any("apmreschedule","AppointmentController@apmreschedule");
            Route::get("getreferdoctor/{id}","AppointmentController@getreferdoctor");
            Route::any("apmrefer","AppointmentController@apmrefer");
            Route::get("review","AuthenticatedoctorController@showreview");
            Route::get('sender', function () {

                  event(new App\Events\FormSubmitted("hetal","New Messages"));
            });


       });

});
