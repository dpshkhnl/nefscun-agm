<?php

namespace App\Models;

use Illuminate\Support\Facades\Mail;

class Helper
{
    public static function sendSms($mobile, $message)
    {
        
        $url = 'https://smsprima.com/api/api/index?username=nefscun&password=nefscun123&sender=NEFSCUN&destination='.$mobile.'&type=1&message='.$message;
        $url = str_replace(" ", '%20', $url);

       
      $ch = curl_init();
$timeout = 5;

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);

$data = curl_exec($ch);

curl_close($ch);
//dd($data);

    }

    public static function sendEmail($toEmail, $subject, $details)
    {
      
        

        $fromEmail = "noreply@nefscun.org.np";
      
        $message = "<html>\n<body>\n";
        $message .= "<h4>Dear Sir/Madam,</h4>";
        
       
        $message .= "<p>$details</p><br /><br /><br />";
        $message .= "<p style='margin: 0'>Thanks & Regards</p>";
        $message .= "<p style='margin: 0'>Nepal Federation of Savings and Credit Cooperative Unions Ltd. (NEFSCUN)</p>";
        $message .= "<p style='margin: 0'> New Baneshwor, Kathmandu</p>";
    
        
        $message .= "<p style='margin: 0'>Post Box No.: 9169</p>";
        $message .= "<p style='margin: 0'>Tel.: +977-1-4781963, 4780201</p>";
        $message .= "<p style='margin: 0'>Fax: +977-1-5550774</p>";
        $message .= "<p style='margin: 0'>URL: http://www.nefscun.org.np</p><br />";
        $message .= "<p style='margin: 0'>Disclaimer</p><hr>";
        $message .= "<p style='margin: 0; text-align: justify;'>The information transmitted, including attachments, is intended only for the person(s) or entity to which it is addressed and may contain confidential and/or privileged material. Any review, retransmission, dissemination or other use of, or taking of any action in reliance upon this information by persons or entities other than the intended recipient is prohibited. If you received this in error, please contact the sender and destroy any copies of this information. NEFSCUN does not guarantee that any email or any attachments are fr ee from computer viruses or other conditions which may damage or interfere with recipient data, hardware or software. The recipient relies on its own procedures and assumes all risk of use and of opening any attachments.</p>";
        $message .= "<p style='margin: 0; color: #00b050'>We encourage paperless environment. Please think before printing this email.</p><br />";
        $message .= "</body>\n</html>";

        $headers  = "From: noreply@nefscun.org.np <" . $fromEmail . ">\r\n";
        $headers .= "To: " . $toEmail . "\r\n";
        $headers .= "X-Mailer: PHP/" . phpversion();
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";

        try {
              mail($toEmail, $subject, $message, $headers);

            // Mail::send([], [], function ($m) use ($toEmail, $subject, $message) {
            //     $m->to($toEmail)
            //         ->subject($subject)
            //         ->setBody($message, 'text/html');
            // });
        } catch (\Exception $e) {
          //  dd($e);
        }
    }
}
