<?php
require_once("../libraries/PHPMailer/src/PHPMailer.php");
require_once('../libraries/PHPMailer/src/Exception.php');
require_once('../libraries/PHPMailer/src/SMTP.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class EmailApi{
   //https://beefree.io/ 
   //Email Template
   function index(){
        echo "Method not found";
    }

     function email($data,$files){  
        $mail = new PHPMailer(true);
        //print_r($mail);
        try {

            // Email server settings
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';             //  smtp host
            $mail->SMTPAuth = true;

            //$mail->Username = 'vcampus.co@gmail.com';   //  sender username
            //$mail->Password = '****';        // sender password

            $mail->Username = 'mdkazimahdi@gmai.com';   //  sender username
            $mail->Password = 'dmczhhydomugfhuk';        // sender password

            $mail->SMTPSecure = 'tls';                  // encryption - ssl/tls
            $mail->Port = 587;                          // port - 587/465

             $from=isset($data["from"])?$data["from"]:"mdkazimahdi@gmail.com";             
             $from_name=isset($data["from_name"])?$data["from_name"]:"Kazi Mahdi";

             $mail->setFrom($from,$from_name);
            

            $mail->addAddress($data["to"]);  
            
            if(isset($data["cc"])){
                $mail->addCC($data["cc"]);
            }
            
            if(isset($data["bcc"])){
                $mail->addBCC($data["bcc"]);
            }
           
            $reply_to=isset($data["reply_to"])?$data["reply_to"]:"mdkazimahdi@gmail.com";
            $reply_to_name=isset($data["reply_to_name"])?$data["reply_to_name"]:"Kazi Mahdi";

            $mail->addReplyTo($reply_to,$reply_to_name);

            
            if(is_array($_FILES['files']['name'])) {
                for ($i=0; $i < count($_FILES['files']['name']); $i++) {
                    $mail->addAttachment($_FILES['files']['tmp_name'][$i], $_FILES['files']['name'][$i]);
                }
            }else{
                $mail->addAttachment($_FILES['files']['tmp_name'], $_FILES['files']['name']);
            }

           
            $mail->isHTML(true);                // Set email content format to HTML

            $mail->Subject = isset($data["subject"])?$data["subject"]:"No Subject";
            $mail->Body    = $data["body"];

            // $mail->AltBody = plain text version of email body;

            if( !$mail->send() ) {
                echo json_encode(["fail" => $mail->ErrorInfo]);
               // return back()->with("failed", "Email not sent.")->withErrors($mail->ErrorInfo);
            } else {
                echo json_encode(["status" =>$files]);
                //return back()->with("success", "Email has been sent.");
            }

        } catch (Exception $e) {
            // return back()->with('error','Message could not be sent.');
           // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            echo json_encode(["exception" =>$e]);
        }


       
    }

}
?>