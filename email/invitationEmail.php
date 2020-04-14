<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

 class InvitationEmail {
    function sendEmailMessage($messageDetails){
      $message_subject = $messageDetails["message_subject"];
      $to_email = $messageDetails["to_email"];
      $from_name = $messageDetails["from_name"];
      $from_email = $messageDetails["from_email"];
      $message_body = $messageDetails["message_body"];
			
      $headers = 'MIME-Version: 1.0' . "\r\n";
      $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
      $headers .= "From: ".$from_name." <".$from_email.">"."\r\n";
			
      mail($to_email, $message_subject, $message_body, $headers);
    }
		
    function generateMessageBody(){
      $myfile = fopen("invitationMessage.html", "r");
      $returnValue = fread($myfile, filesize("invitationMessage.html"));
      fclose($myfile);
			
      return $returnValue;
    }
  }
?>