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

if(isset($_REQUEST['Name']) && $_REQUEST['Name']!="")
{
$name=$_REQUEST['Name'];
}

if(isset($_REQUEST['Email']) && $_REQUEST['Email']!="")
{
$email=$_REQUEST['Email'];
}

if(isset($_REQUEST['Phoneno']) && $_REQUEST['Phoneno']!="")
{
$phone=$_REQUEST['Phoneno'];
}

if(isset($_REQUEST['Message']) && $_REQUEST['Message']!="")
{
$query=$_REQUEST['Message'];
}


if(isset($_REQUEST['Project']) && $_REQUEST['Project']!="")
{
$project=$_REQUEST['Project'];
}


$sql = "INSERT INTO leads (name,email,phone_number,form_type)
VALUES ( '".$name."', '".$email."', '".$phone."','".$project."')";


$data=array();
if ($conn->query($sql) === TRUE) 
{
  
$data['success']=true;
$data['message']="New record created successfully";
$last_id = $conn->insert_id;
$recemail='uditshar14@gmail.com';
$subject = "Hello Bhutani Grandthum, A New Enquiry has been Arrived.";
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
$mail->Subject = 'New Enquiry Received';
// Mail body content
$bodyContent = '
<html>
  <head>
    <title>A New Enquiry has been Arrived</title>
  </head>
  <body>
    <h1>A New Enquiry has been Arrived</h1>
    Hello Bhutani Grandthum, i am here to Inform that new enquiry has been reached plz check the details.
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
$mail->Body    = $bodyContent;
// Send email
if(!$mail->send()) {
//echo "<script>alert('Message could not be sent. Mailer Error:  $mail->ErrorInfo');</script>";
//echo 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo;
} else {
//echo "<script>alert('Message has been sent.');</script>";
//echo 'Message has been sent.';
}
} else {
  $data['success']=false;
$data['message']="Error: " . $sql . "<br>" . $conn->error;
 }

echo  json_encode($data);

?>