<?php 

session_start();
include_once('connection.php');

$_SESSION['logged']=false;
if(isset($_POST['submit']))
{
$email='';
$password='';
if(isset($_POST['email']) && $_POST['email']!='')
{
   $email=$_POST['email'];
}
if(isset($_POST['password']) && $_POST['password']!='')
{
   $password=$_POST['password'];
}

 $sql = "SELECT id,email,password  FROM authorization_ip_data where email='$email'";
 
 
               $result = $conn->query($sql);
                  
                  if ($result->num_rows > 0) {
                    
                    while($row = $result->fetch_assoc()) {

                     $dbpass= $row['password'];
                     $depass= md5($password);

if($dbpass==$depass)
{
   $_SESSION['logged']=true;
   $_SESSION['email']=$email;
}
else
{
echo "<script language='javascript'>alert('email and password do not match.')</script>";

}


                    }
}
                    else
                    {
echo "<script language='javascript'>
alert('email not exist.')
</script>";


                    }
                 
}

?>
<html lang="en">
   <head>
      <title>Office Spaces and Retail Spaces available in Bhutani Grandthum, Greater Noida West</title>
      <meta name="description" content="Office Spaces and Retail Spaces available for sale in Bhutani Grandthum, Greater Noida West">
      <meta name="keywords" content="commercial property, shop for sale in noida, commercial space, commercial office, retail    shop,grandthum" />
      <meta property="og:title" content="Office Spaces and Retail Spaces available in Bhutani Grandthum, Greater Noida West" />
      <meta property="og:url" content="http://grandthum-bhutanigroup.com/" />
      <meta property="og:type" content="website" />
      <meta property="og:description" content="Office Spaces and Retail Spaces available in Bhutani Grandthum, Greater Noida West" />
      <meta property="og:image" content="http://medalohaadmin.cresol.in/image/grandthum-banner-1.jpeg" />
      <meta property="og:image:secure" content="https://medalohaadmin.cresol.in/image/grandthum-banner-1.jpeg" />
      <meta property="og:image:type" content="image/jpeg" />
      <meta property="og:image:width" content="1344" />
      <meta property="og:image:height" content="840" />
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <link href="css/fontawesome.css" rel="stylesheet">
      <link rel="stylesheet" href="css/font-awesome.min.css">
      <link href="css/aos.css" rel="stylesheet">
      <link rel="stylesheet" href="css/animate.css">
      <link rel="stylesheet" href="css/style.css">
      <link rel="stylesheet" href="css/responsive.css">
      <link rel="stylesheet" href="css/animate.min.css">
      <link rel="stylesheet" href="css/lightgallery.css">
      <link rel="stylesheet" href="css/lightgallery.min.css">
      <link rel="icon" href="images/favicon.ico" type="image/x-icon">


      <title>BHUTANI GRANDTHUM</title>
      <!-- Hotjar Tracking Code for https://grandthum-bhutanigroup.com/ -->
      <script>
         (function(h,o,t,j,a,r){
             h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
             h._hjSettings={hjid:3034720,hjsv:6};
             a=o.getElementsByTagName('head')[0];
             r=o.createElement('script');r.async=1;
             r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
             a.appendChild(r);
         })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
      </script>
      <!-- Google Tag Manager -->
      <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
         new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
         j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
         'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
         
         })(window,document,'script','dataLayer','GTM-5JZWHPD');
      </script>
      <!-- End Google Tag Manager -->
   </head>
   <style>
      body, html{height: auto!important;}
      table, th, td {
      border: 1px solid #dee2e6!important
      }
      th, td {
      padding: 15px;
      text-align: left;
      }
   </style>
   <body id="main" data-aos-easing="ease" data-aos-duration="400" data-aos-delay="0" class="" style="">


<?php 
if($_SESSION['logged'])
{
 /*echo"<script language='javascript'>
//window.location.href='https://grandthum-bhutanigroup.com/ip_status_details.php';
</script>";*/

}
else
{ ?>



  <div class="modal fade show" id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: block;">
         <div class="modal-dialog" role="document">
            <div class="modal-content" style="width:62%; margin-left:19%;">
               <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Login Form</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
               </div>
               <div class="modal-body">
                  <form  method="post"  style="padding:0px;">
                    
                     <div class="form-group" >
                        <label>Email</label>
                        <input type="email" name="email" required class="custom-inp" > 
                     </div>
                     <div class="form-group">
                        <label>Password</label>
                        <input type="password" required name="password"  class="custom-inp"> 
                     </div>
                    
               </div>
               <div class="modal-footer" style="display:block; text-align:center;">
               <input type="submit" class="btn submit-btn " value="Submit" name="submit">
               </div>
               </form>
               <div id="frm1_popup_msg"></div>
            </div>
         </div>
      </div>
      </div>

<?php
return false; 
}?>






      <!-- Modal -->
      <div class="modal fade" id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
         <div class="modal-dialog" role="document">
            <div class="modal-content" style="width:62%; margin-left:19%;">
               <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Get a call back</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
               </div>
               <div class="modal-body">
                  <form id="frm1" name="frm1" method="post" action="docor.php" style="padding:0px;">
                     <div class="form-group" style="display:block;">
                        <label>Name</label>
                        <input type="text" name="name" class="custom-inp" id="frm1_popup_name"> 
                     </div>
                     <div class="form-group" style="display:none;">
                        <label>Email</label>
                        <input type="email" name="email" class="custom-inp" id="frm1_popup_email"> 
                     </div>
                     <div class="form-group">
                        <label>Phone*</label>
                        <input type="number" required name="phone" id="frm1_popup_phone" class="custom-inp"> 
                     </div>
                     <div class="form-group">
                        <input type="hidden" name="project" id="frm1_popup_project" value="PopupForm"> 
                     </div>
                     <span id="mobile_error_popup" style="color:red"></span>
                     <img src="images/loading.gif" id="loader" height="40px" width="40px"/ style="display:none" >    
               </div>
               <div class="modal-footer" style="display:block; text-align:center;">
               <input onclick="theFunction('PopupFormHit');" type="button" class="btn submit-btn btn_frm1_popup" value="Submit">
               </div>
               </form>
               <div id="frm1_popup_msg"></div>
            </div>
         </div>
      </div>
      </div>
      <!--top header-->
      <header>
         <div class="prehedaer-area-wrapper d-block d-lg-block" style="display:none!important;">
            <div class="container">
               <div class="row align-items-center">
                  <div class="col-lg-12 col-xl-12">
                     <div class="pre-header-left d-sm-flex justify-content-center justify-content-lg-start">
                        <div class="pre-header-item" onclick="theFunction('BottomNumber');"> <a href="tel:+919958806559" ><i class="fa fa-phone" ></i>+91 9958806559</a><a href="tel:+919958806559" ><i class="fa fa-map-marker" style="margin-left:5px;"></i>Site Address : Plot No.7, Sector- Techzone- 4, Greater Noida, Gautam Buddha Nagar, Uttar Pradesh, 201308</a> </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="sticky-wrapper" style="height: auto;"></div>
         <nav class="navbar navbar-expand-lg navbar-light top-navbar topnav-bar-custom sticky" data-toggle="sticky-onscroll">
            <div class="container">
               <a class="navbar-brand" href="index.php"> <img src="images/logo.jpg" alt="logo-no-load" class="img-fluid logo_icon" width="100" height="85"> </a>
               <button class="navbar-toggler  ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" style=""> <span class="navbar-toggler-icon"></span> </button>
               <div class="navbar-collapse justify-content-end collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav ">
                     <li class="nav-item"> <a class="nav-link " href="#home">Home</a> </li>
                     <li class="nav-item"> <a class="nav-link" href="#about">About Project</a> </li>
                     <li class="nav-item"> <a class="nav-link" href="#Price">Price</a> </li>
                     <li class="nav-item" style="display:none;"> <a class="nav-link" href="#floor-plan">Floor Plan</a> </li>
                     <li class="nav-item"> <a class="nav-link" href="#Speciality">Highlight</a> </li>
                     <li class="nav-item" style="display:none;"> <a class="nav-link" href="#amenities">Amenities</a> </li>
                     <li class="nav-item"> <a class="nav-link" href="#Gallery">Gallery</a> </li>
                     <li class="nav-item"  > <a class=""   href="tel:9958806559" onclick="theFunction('HeaderNumber');" style="font-size: 19px;margin-right: 15px;color: black;padding: 8px 16px;color: black!important;border-radius: 99px;padding: 8px 16px;background: linear-gradient(#d7b671, #f1e0b2, #dcbd7c);display: block;">+91 9958806559</a> </li>
                  </ul>
               </div>
            </div>
         </nav>
         <div class="social-li-nks" id="whastappcode" style="display:none;">
            <ul>
               <li onclick="theFunction('Whatsapp');">
                  <a href="https://api.whatsapp.com/send?phone=919958806559&amp;text=Hi,%20Please%20share%20some%20information%20about%20the%20project." >
                     <noscript><img src="images/whatsapp.png" alt=""></noscript>
                     <img class="lazyloaded" src="images/whatsapp.png" data-src="images/whatsapp.png" alt="whatsappicon" height="80" width="170">
                  </a>
               </li>
            </ul>
         </div>
      </header>
      <!-- End top header-->
      <section class="specification" id="Price">
         <div class="container">
         <div class=" content text-center">
            <h1 class="heading" style="padding-bottom: 40px;">Ip Status Details</h1>
         </div>
         <div class="row">
         <div class="col-md-12" style="overflow-x:auto;">
            <table class="table table-borderless">
               <tr>
                  <th>Id</th>
                  <th>Ip Address</th>
                  
                  <th>State Position</th>
                  <th>Plateform Type</th>
               </tr>
               <?php 
                  $sql = "SELECT id, ip_address,platform_type, GROUP_CONCAT(type) as type,GROUP_CONCAT(created_at) as created_at  FROM lead_counts WHERE ip_address !=''  GROUP BY ip_address ORDER BY id desc";
                  $result = $conn->query($sql);
                  
                  if ($result->num_rows > 0) {
                    $i=1;
                    while($row = $result->fetch_assoc()) {

                    
                    ?>
               <tr>
                  <td><?php echo $i;?></td>
                  <td><?php echo $row['ip_address'];?></td>
                  
                  <td><?php 

                     $dates = explode(',',$row['created_at']);
                    /* $date1 = strtotime($date);
                    $visittime= date('H:i:s A', $date1);*/
                  $types=explode(',', $row['type']);

$num_of_items = count($types);
  $num_count = 0;

foreach ($types as $key=>$type)
{
  $date1 = strtotime($dates[$key]);
                    $visittime= date('d-m-y H:i:s A', $date1);
 $num_count = $num_count + 1;
 
 echo '<span style="padding:2px;width:30px;border:1px solid #d7b671;background:linear-gradient(#d7b671, #f1e0b2, #dcbd7c);color:#000000;margin-right:5px;font-size:12px;line-height:2.5">'.$type.' '.


 $visittime.'</span>';

   if ($num_count < $num_of_items) {
      echo '<i class="fa fa-angle-double-right" style="margin-right:6px;font-size:12px;"></i>';
    }


}
               ?></td>
                  <td><?php echo $row['platform_type'];?></td>
               </tr>
               <?php  $i++;}}?>
               </tbody>
            </table>
         </div>
      </section>
      <footer class="ftco-footer" id="contact">
         <div class="container mb-5 pb-4">
            <div class="row">
               <div class="col-lg-4 col-md-6">
                  <div class="ftco-footer-widget">
                     <h2 class="ftco-heading-2 d-flex align-items-center">About</h2>
                     <p>Bhutani infra is one of the most reputed real estate developers which is very famous for its superior quality and high-end amenities.</p>
                     <ul class="ftco-footer-social list-unstyled mt-4"> </ul>
                  </div>
               </div>
               <div class="col-lg-4 col-md-6">
                  <div class="ftco-footer-widget">
                     <h2 class="ftco-heading-2">Links</h2>
                     <ul class="list-unstyled">
                        <li><a href="#book-now"><span class="fa fa-chevron-right mr-2"></span>Get In Touch</a></li>
                        <li><a href="#about"><span class="fa fa-chevron-right mr-2"></span>About Us</a></li>
                        <li><a href="#amenities"><span class="fa fa-chevron-right mr-2"></span>Amentities</a></li>
                        <li><a href="#Gallery"><span class="fa fa-chevron-right mr-2"></span>Gallery</a></li>
                        <li><a href="#contact"><span class="fa fa-chevron-right mr-2"></span>Contact Us</a></li>
                     </ul>
                  </div>
               </div>
               <div class="col-lg-4 col-md-6">
                  <div class="ftco-footer-widget">
                     <h2 class="ftco-heading-2">Contact Us</h2>
                     <div class="block-23 mb-3">
                        <ul >
                           <li><span class="fa fa-map-marker mr-3" style="color:white"></span><span class="text" style="color:white">Plot No 7, Techzone 4, Greater Noida West.</span></li>
                           <li onclick="theFunction('HeaderNumber');"><a href="tel:9958806559" ><span class="fa fa-phone mr-3"></span><span class="text">+91 9958806559</span></a></li>
                           <li style="color:white">A Project By BHUTANI GRANDTHUM </li>
                           <li style="color:white">
                              Authorised Sales Partner
                              <!-- <img src="images/logo1.png" alt="logo-no-load" class="img-fluid logo_icon"> --><a href="javascript:void(0)" style="text-decoration: underline;">GOLDEN GATES INFRA</a> 
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <a id="buttonscroll" href="javascript:void(0)"></a>
         <div class="container-fluid" style="color:black;background:#dcbd7c">
            <div class="container">
               <div class="row">
                  <div class="col-md-12 aside-stretch text-center" >
                     <p class="mb-0" style="color:black;">Copyright @ 2022. All Rights Reserved</p>
                     <div class="designby-text" >Designed By <a href="http://www.cresol.in/" target="blank">Cresol.in</a></div>
                  </div>
               </div>
            </div>
         </div>
      </footer>
      <!-------------- quick contact form --------------->
   
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js" crossorigin="anonymous"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/aos.js"></script>
</html>