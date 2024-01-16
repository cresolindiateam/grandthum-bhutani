<?php 
include_once('connection.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer/PHPMailerAutoload.php';
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';


date_default_timezone_set('Asia/Kolkata');

	$ipAddress="";
	$platformType="";


	//Check if this is called for Visitor entry
	if(isset($_REQUEST['ipAddress']) && $_REQUEST['ipAddress']!="")
	      { 

	         $ipAddress=strval($_REQUEST['ipAddress']);
	         $platformType=strval($_REQUEST['platformType']);

	         VisitorEntry($ipAddress,$platformType,$conn);

	      }
	   

	 function VisitorEntry($ipAddress,$platformType,$conn)
	{		
		// $date = date('m/d/Y h:i:s a', time());
		 //$datetime=strtotime($date);
		 $timestamp = date("Y-m-d H:i:s");
		  $sql1 = "INSERT INTO visitor_entries(platform_type,ip_address,created_at)
	            VALUES ('$platformType','$ipAddress', '$timestamp')";
		//echo  $sql1;
	 	//Send Email
		 $bodyContent = '
							<html>
							  <head>
							    <title>Visitor Arrived</title>
							  </head>
							  <body>
							    <h1>Visitor Detail</h1>
							   
							    <table cellspacing="0" style="border: 2px dashed #FB4314; width: 100%;">
							      <tr>
							        <th>Platform:</th><td>'.$ipAddress.'</td>
							      </tr>
							      <tr style="background-color: #e0e0e0;">
							        <th>IP Address:</th><td>'.$platformType.'</td>
							      </tr>
							      
							    </table>
							  </body>
							</html>';
		  
             //SendEmailForVisitors($bodyContent);  
		 
		
	       
			  if ($conn->query($sql1) === TRUE) 
			  { echo "Inserted";
			  }
		 else{
		echo  $conn->error;
		 }

      
		
	}

 function SendEmailForVisitors($bodyContent){
	    $recemail='nitesh@cresol.in';
		$subject = "Hello Bhutani Grandthum, Visitor Arrived";
		$mail = new PHPMailer();
		                 

		$mail->SMTPAuth = false;     
		$mail->SMTPSecure = 'none';
		$mail->Host = 'relay-hosting.secureserver.net';   
		$mail->Port = 25;
		$mail->setFrom('uditshar14@gmail.com', 'Bhutani Grandthum Support');
		// Add a recipient
		$mail->addAddress($recemail);
		$mail->addCC('');
		$mail->addBCC('nitesh@cresol.in');
		// Set email format to HTML
		$mail->isHTML(true);
		// Mail subject
		$mail->Subject = 'Visitor Arrived';
		
		$mail->Body    = $bodyContent;
		// Send email
		if(!$mail->send()) {
		//echo "<script>alert('Message could not be sent. Mailer Error:  $mail->ErrorInfo');</script>";
		echo 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo;
		} else {
		//echo "<script>alert('Message has been sent.');</script>";
		echo 'Mail has been sent.';
		}

	}




	


?>