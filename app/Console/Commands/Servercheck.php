<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Twilio\Rest\Client;

class Servercheck extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'server:check';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'server check';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
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
         Log::info("server testing");
    }
}
