<?php

namespace App\Http\Controllers\api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Response;
use Sentinel;
use Validator;
use App\User;
use Twilio\Rest\Client;
use Twilio\Jwt\AccessToken;
use Twilio\Jwt\Grants\VideoGrant;
use Twilio\Jwt\Grants\SyncGrant;
use Twilio\Jwt\Grants\ChatGrant;
use App\Model\Resetpassword;
use App\Model\Subscription;
use DateTime;
use Image;
use Auth;
use Mail;
use DB;
class ServerController extends Controller {
   
   public function server_restart_process(){
            $curl = curl_init();
            curl_setopt_array($curl, array(
              CURLOPT_URL => "http://drawing-how-to-draw.com/howtodraw/webservice/language.php?key=9904444091",
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => "",
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 30,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => "GET",
              CURLOPT_HTTPHEADER => array(
                "cache-control: no-cache",
                "postman-token: b5121403-4efa-7135-cc83-6ac9e1208ec1"
              ),
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);
            curl_close($curl);
            if ($err) {
              echo "cURL Error #:" . $err;
            } else {
                $result = json_encode($response);
                if(isset($result)&&isset($result->success)&&$result->success=="1"){
                    echo "site is working";
                }else{
                    $msg = "drawing-how-to-draw domain is not working you need to replace";
                    mail("express.template@gmail.com","Domain Notification",$msg);
                    
                    $sid    = "AC7b7486634848f2eec6952cf754d3a66b"; 
                    $token  = "313394071143c3b28cb5431f2ee5c3e3"; 
                    $twilio = new Client($sid, $token); 
 
                    $message = $twilio->messages 
                                       ->create("+919904444091", // to 
                                       array(        
                                           "body" => "Domain Notification : drawing-how-to-draw server not working",
                                           "from"=> "+18482942680"
                                       ) 
                    ); 
 
                    print($message);
                }
            }
   }
}
?>