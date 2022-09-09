<?php 
if(isset($_POST ['submit'])){
   // secret key is for communication between your site and reCAPTCHA.
  $secret="secret-key";
  $response=$_POST['g-recaptcha-response'];
  $remoteip=$_SERVER['REMOTE_ADDR'];
  $url="https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$response&remoteip=$remoteip";
  $data=file_get_contents($url);
  $row=json_decode($data,true);

if( $row['success']=="true"){
    echo "<script>alert('Not a robot, Human pass🚻');</script>";
} else{
    
    echo "<script>alert('DANGER⚠️DANGER ROBOTS TOOK OVER🤖❗️');</script>";
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>reCaptcha</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="stylesheet.css">

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>
    <form  method="post" class="container">
        <h5>reCaptcha<h5>
            <br>
        <div class="row">
                /* your site key to from reCaptcha */
            <div class="g-recaptcha" data-sitekey="site-key"></div>
         </div>
        <button class="btn wave-effect wave-light" type="submit" name="submit">Check</button> 
   </form>
    
   <script src="https://cdnjs.cloudflare.com/ajax/libs/materializa/1.0.0/css/materialize.min.css"></script>
</body>
</html>