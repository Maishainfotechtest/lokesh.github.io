<?php 

include 'conn.inc.php';
 
if (isset($_POST['submit'])) {
    $username = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];
    $gender = $_POST['rate'];
     
     
    
    
    foreach ($_FILES['img']['tmp_name'] as $key => $value) {
      $upload_dir = "uploades/";
     
        $file_tmpname = $_FILES['img']['tmp_name'][$key]; 
        $file_name = $_FILES['img']['name'][$key]; 
        $filepath = $upload_dir.time().$file_name; 
        move_uploaded_file($file_tmpname , $filepath);

       
    }

    
    $insert = "INSERT INTO `form` (`id`, `username`, `email`, `phone`, `password`, `gender`, `time`) VALUES (NULL, '$username', '$email', '$mobile', '$password', '$gender', current_timestamp())";

    
    $insertimg= "INSERT INTO `images` (`id`, `username` , `img`, `time`) VALUES (NULL, '$username' ,'$filepath', current_timestamp())" ;
   
    $run = mysqli_query($conn , $insert);
    $runimgquery = mysqli_query($conn , $insertimg);
    
    
    if ( $run && $runimgquery) {
         echo " inserted succesfully";
    }
    else{
        "data not inserted";
    }

}
?>
 <!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" integrity="sha512-PgQMlq+nqFLV4ylk1gwUOgm6CtIIXkKwaIHp/PAIWHzig/lKZSEGKEysh0TCVbHJXCLN7WetD8TFecIky75ZfQ==" crossorigin="anonymous" />
    <style>
    body{
        font-family: 'Texturina', serif;
       
    }
    *{
          margin:0;
          padding:0;
        }
     span {
         font-size : 14px;
     }

     i{
        font-weight: 900;
    position: absolute;
    margin: 10px -20px;
    font-size: 21px;
    
     }

      

     input{
        box-shadow: 3px 4px 6px rgba(150, 150, 150, 1);
     }
       </style>
       <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Texturina:wght@200&display=swap" rel="stylesheet">
  <script src="main.js"></script>
    <title>FORM </title>
  </head>
  <body class="bg-light">
 
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#">Disabled</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
  <div class="  m-2 w-50 ">
 
  
  <form action="" method="post" class="    " enctype="multipart/form-data" style=" width: 26%;
    
    position: absolute;
    top: 10%;
    left: 35%;
     ">
     <h1 class="text-capitalize text-center" style="
    position: relative;
    margin:4px 0 ;
    left: 0%;
    text-shadow: 3px 4px 6px rgba(150, 150, 150, 1);
    "> registration form</h1>
       <div style="margin:12px;">
           
       <i class="fa text-light fa-user" aria-hidden="true"></i> <input type="text" id="name" name="name" onkeyup="submitpage()"  required placeholder="Enter your name " class="w-100 m-2 form-control" >
          <span id="errMsg" style="color:red;" class="w-50    " ></span>
      </div> 

      <div style="margin:12px;"> 
      <i class="fa text-warning fa-envelope" aria-hidden="true"></i>  <input type="email" id="email" placeholder="Enter you Email" name="email" class="w-100 m-2 form-control"  onkeyup="submitpage()" required > <span id="emailerror" style="color:red;" class="w-50    " ></span>
      </div>
  
      <div style="margin:12px;">
          
      <i class="fa text-success fa-phone" aria-hidden="true"></i><input type="text" name="mobile" onkeyUP="phonevalidation()"   id="mobile" class="w-100 m-2 form-control" required placeholder="Enter phone number"><span id="phoneerror" style="color:red;"></span> 
      </div>
  
      <div style="margin:12px;"> 
      <i class="fa text-info fa-lock" aria-hidden="true"></i>
          <input type="password" placeholder="Enter password" name="password" onkeyup="submitpage()" id="pass" required class="w-100 m-2 form-control"> <span id="passError" style="color:red;"></span> 
      </div>
  
      <div style="margin:12px;">  
      <i class="fa text-info fa-lock" aria-hidden="true"></i>
          <input type="password" placeholder="Enter  Confirm password" name="cpass" onkeyup="submitpage()" id="cpass" class="w-100 m-2 form-control" ><span id="cpasserror" class="w-75" style="color:red;"></span> 
      </div>
  
  
      <div class="font-weight-bold text-white">Gender</div>
      <div id="gender " class="container" >
      <i class="fa fa-male" aria-hidden="true"></i> <input type="radio" id="r1" name="rate" value="male" > Male <span id=maleerror style="color: red;"></span>
      <i class="fa fa-female" aria-hidden="true" style="margin: 11px 76px;"></i> <input type="radio" id="r2" name="rate" value="female"  > Female <span id="fmerror" style="color:red"></span>
  
      </div>
      <div style="margin:12px;">
          <label for="Fil Up"> UPLOAD IMAGE </label><br>
          <input type="file" name="img[]" id="img" multiple  required>
      </div>
      <div style="margin:12px;">
          <input type="submit" class="btn btn-primary W-100 font-weight-bold text-uppercase" style="letter-spacing:2px; box-shadow: 3px 4px 6px rgba(150, 150, 150, 1);"  name="submit" value="Submit" id="submit" onclick="submitpage()"  >
      </div> 
   
</form>
 
  </div>
 
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>

<?php 
  $multiArray = [
    ["lokesh","student","rohini"],
    ["cars" , "bike" , "plane"],
    ["mobile" , "pc" , "laptop"]
  ];

echo "<table border=1 cellspacing=5 >
      <tr>";

foreach ($multiArray as $value) {
  
}
echo "
</tr>
</table>"
?>
 

 
 
     
    
 

 