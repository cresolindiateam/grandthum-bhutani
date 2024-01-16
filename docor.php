<?php 
include_once('connection.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer/PHPMailerAutoload.php';
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$name='';
$email='';
$phone='';
$query='';
$project='';
$leadtype='FormFilled';
$ip_address='';
$platform_type='';


date_default_timezone_set('Asia/Kolkata');


		if(isset($_REQUEST['action']) && $_REQUEST['action']='getleadaction')
		{
			 if(isset($_REQUEST['leadtype']) && $_REQUEST['leadtype']!="")
			  {
				 $leadtype=$_REQUEST['leadtype'];
				 $ip_address=$_REQUEST['ip_address'];
				 $platform_type=$_REQUEST['platform_type'];
			  }
               $timestamp = date("Y-m-d H:i:s");
			  $sql1 = "INSERT INTO lead_counts (type,ip_address,platform_type,created_at)
			  VALUES ( '".$leadtype."','".$ip_address."','".$platform_type."','$timestamp')";


			  if ($conn->query($sql1) === TRUE) 
			  {

			  } 
			 
			   //Send Email
				$bodyContent = '
				<html>
				  <head>
					<title>Clicked on '.$leadtype.'</title>
				  </head>
				  <body>
				

					<table cellspacing="0" style="border: 2px dashed #FB4314; width: 100%;">
					  <tr>
						<th>Lead Type:</th><td>'.$leadtype.'</td>
					  </tr>
					  <tr style="background-color: #e0e0e0;">
						<th>Ip Addresss:</th><td>'.$ip_address.'</td>
					  </tr>
					  <tr style="background-color: #e0e0e0;">
						<th>Platform Type:</th><td>'.$platform_type.'</td>
					  </tr>
					
					</table>
				  </body>
				</html>';
		
				//sendEmail($bodyContent,"Clicked on ".$leadtype,"Clicked on ".$leadtype);

		}


		//This below code will work only when we have form data

		if(isset($_REQUEST['Phoneno']) && $_REQUEST['Phoneno']!="")
		{

				if(isset($_REQUEST['Name']) && $_REQUEST['Name']!="")
				{
				$GLOBALS['name']=$_REQUEST['Name'];
				}

				if(isset($_REQUEST['Email']) && $_REQUEST['Email']!="")
				{
				$GLOBALS['email']=$_REQUEST['Email'];
				}

				if(isset($_REQUEST['Phoneno']) && $_REQUEST['Phoneno']!="")
				{
				$GLOBALS['phone']=$_REQUEST['Phoneno'];
				}

				if(isset($_REQUEST['Message']) && $_REQUEST['Message']!="")
				{
				$GLOBALS['query']=$_REQUEST['Message'];
				}


				if(isset($_REQUEST['Project']) && $_REQUEST['Project']!="")
				{
				$GLOBALS['project']=$_REQUEST['Project'];
				}

			   if(isset($_REQUEST['ip_address']) && $_REQUEST['ip_address']!="")
				{
				   $GLOBALS['$ip_address']=$_REQUEST['ip_address'];
				    
				}
			
			     if(isset($_REQUEST['platform_type']) && $_REQUEST['platform_type']!="")
				{
				  $GLOBALS['$platform_type']=$_REQUEST['platform_type'];
				   
				}
                $ip_address=$GLOBALS['$ip_address'];
                $platform_type=$GLOBALS['$platform_type'];
			
			    $timestamp = date("Y-m-d H:i:s");
				$sql = "INSERT INTO leads (name,email,phone_number,form_type,ip_address,platform_type,created_at)
				VALUES ( '".$name."', '".$email."', '".$phone."','".$project."','".$ip_address."','".$platform_type."',' $timestamp')";
			
			 $leadsql = "INSERT INTO lead_counts (type,ip_address,platform_type,created_at)
			  VALUES ( 'Form filled','".$ip_address."','".$platform_type."','$timestamp')";


			

              // echo $sql;
			$data=array();
			if ($conn->query($sql) === TRUE) 
			{

				   $timestamp = date("Y-m-d H:i:s");
			  $leadsql = "INSERT INTO lead_counts (type,ip_address,platform_type,created_at)
			  VALUES ( 'Lead Inserted','".$ip_address."','".$platform_type."','$timestamp')";
				
				if ($conn->query($leadsql) === TRUE) 
				{
				}
				
				$data['success']=true;
				$data['message']="New record created successfully";
				$last_id = $conn->insert_id;
                //Send Email
				$bodyContent = '
				<html>
				  <head>
					<title>A New Enquiry has been Arrived</title>
				  </head>
				  <body>
					<h1>A New Enquiry has been Arrived</h1>

					<table cellspacing="0" style="border: 2px dashed #FB4314; width: 100%;">
					  <tr>
						<th>Name:</th><td>'.$name.'</td>
					  </tr>
					  <tr style="background-color: #e0e0e0;">
						<th>Email:</th><td>'.$email.'</td>
					  </tr>
					  <tr style="background-color: #e0e0e0;">
						<th>Phone:</th><td>'.$phone.'</td>
					  </tr>
						<tr style="background-color: #e0e0e0;">
						<th>Project:</th><td>'.$project.'</td>
					  </tr>
					  <tr>
						<th>Website:</th><td><a href="http://grandthum-bhutanigroup.com">Bhutani Grandthum</a></td>
					  </tr>
					</table>
				  </body>
				</html>';
		
				sendEmail($bodyContent,"New Enquiry Received","New Enquiry Received");
			
			}
			else {
			  $data['success']=false;
			   $data['message']="Error: " . $sql . "<br>" . $conn->error;
			 }

	   echo  json_encode($data);
	
	 		
	}


    function sendEmail($bodyContent,$title,$subject){
	 $recemail='uditshar14@gmail.com';
		$subject = $subject;
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
		$mail->Subject =$title;
		// Mail body content
		
			$mail->Body    = $bodyContent;
			// Send email
			if(!$mail->send()) {
			//echo "<script>alert('Message could not be sent. Mailer Error:  $mail->ErrorInfo');</script>";
			//echo 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo;
			} else {
			//echo "<script>alert('Message has been sent.');</script>";
			//echo 'Message has been sent.';
			}
	}
?>
