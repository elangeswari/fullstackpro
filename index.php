<?php
  session_start();
  include "config.php";

  #Check if form submitted
  if($_SERVER["REQUEST_METHOD"]=='POST'){
    $caf=mysqli_real_escape_string($con,$_POST["frm_caf"]);
    $doj=mysqli_real_escape_string($con,$_POST["frm_doj"]);
    $rn=mysqli_real_escape_string($con,$_POST["frm_rn"]);
    $name=mysqli_real_escape_string($con,$_POST["frm_name"]);
    $dob=mysqli_real_escape_string($con,$_POST["frm_dob"]);
    $bg =mysqli_real_escape_string($con,$_POST["frm_bg"]);
    $sql="INSERT INTO fproject (CAF,DOJ,RN,NAME,DOB,BG) VALUES ('{$caf}','{$doj}','{$rn}','{$name}','{$dob}','{$bg}')";
    if($con->query($sql)){
      #set flash message
      flash('msg','User Added Successfully');
    }else{
      #set flash message
      flash('msg','User Added Failed','red');
    }
  }

  #select all records from the table
  $data=[];
  $sql="select * from fproject";
  $res=$con->query($sql);
  if($res->num_rows>0){
    while($row=$res->fetch_assoc()){
      $data[]=$row;
    }
  }
?>
<html>
  <head>  
    
	<meta charset="UTF-8">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="https://kit.fontawesome.com/e92f685ffc.js" crossorigin="anonymous"></script>
  
    
    <title>BEYCAN</title>
    <link rel='stylesheet' href='style.css'>
    <style>
      .ex {
  width:100%;
  overflow:auto;
}
.ex div {
  width:50%;
  float:left;
} 
.des {
  width:100%;
  overflow:auto;
}
.des div {
  width:49%;
  float:left;
}
* {
	box-sizing: border-box;
}
body {
	font-family: poppins;
	font-size: 16px;
	color: #fff;
}
.form-box {
	background-color: rgba(0, 0, 0, 0.5);
	margin: auto auto;
	padding: 40px;
	border-radius: 5px;
	box-shadow: 0 0 10px #000;
	position: absolute;
	top: 0;
	bottom: 0;
	left: 0;
	right: 0;
	width: 500px;
	height: 650px;
}
.form-box:before {
	background-image: url("https://i.postimg.cc/8cnYLpfc/ddddd.jpg");
	width: 100%;
	height: 100%;
	background-size: cover;
	content: "";
	position: fixed;
	left: 0;
	right: 0;
	top: 0;
	bottom: 0;
	z-index: -1;
	display: block;
	filter: blur(2px);
}
.form-box .header-text {
	font-size: 32px;
	font-weight: 600;
	padding-bottom: 30px;
	text-align: center;
}
.form-box input {
	margin: 10px 0px;
	border: none;
	padding: 10px;
	border-radius: 5px;
	width: 100%;
	font-size: 18px;
	font-family: poppins;
}
.form-box input[type=checkbox] {
	display: none;
}
.form-box label {
	position: relative;
	margin-left: 5px;
	margin-right: 10px;
	top: 5px;
	display: inline-block;
	width: 20px;
	height: 20px;
	cursor: pointer;
}
.form-box label:before {
	content: "";
	display: inline-block;
	width: 20px;
	height: 20px;
	border-radius: 5px;
	position: absolute;
	left: 0;
	bottom: 1px;
	background-color: #ddd;
}
.form-box input[type=checkbox]:checked+label:before {
	content: "\2713";
	font-size: 20px;
	color: #000;
	text-align: center;
	line-height: 20px;
}
.form-box span {
	font-size: 14px;
}
.form-box button {
	background-color: rgba(0, 0, 0, 0.5);
	color: #fff;
	border: none;
	border-radius: 5px;
	cursor: pointer;
	width: 40%;
	font-size: 18px;
	padding: 10px;
	margin: 20px 0px;
}
span a {
	color: #BBB;
}
</style>
<meta charset="utf-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href=
"https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src=
"https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
    </script>
    <script src=
"https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js">
    </script>
    <script src=
"https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js">
    </script>
  </head>
  <body>
        <div class='container'>
      <?php 
        #print flash message
        flash('msg'); 
      ?>
      <form method='post' action='<?php echo $_SERVER["PHP_SELF"]; ?>' class='frm'>
   
       
      <div class="form-box">
		<div class="header-text">
			<h1>BEYCAN</h1>
		</div>
    <input placeholder="Enter Certificate Number" type="text"  name='frm_caf' required> 
    <input placeholder="Enter Student Name" type="text"  name='frm_doj' required> 
    <input placeholder="Enter Course" type="text"  name='frm_rn' required> 
    <input placeholder="Enter Date of joining" type="text"  name='frm_name' required> 
    <input placeholder="Enter Certificate status" type="text"  name='frm_dob' required> 
    <input placeholder="Enter Course status" type="text"  name='frm_bg' required> 
            <button>Submit</button>&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <button ><a href="signin.php" style="color:white">Details </a></div></button>
          
        </div>
      </form>
      </div>
      <div style="text-align:right;margin: top 50%;">
      <h4>Developed by,</h4>
      <h6><a href="#" style="color: #000;">Nandhini.G</a></h6>
      <h6><a href="#" style="color: #000;">Elangeswari.R</a></h6>
      </div>
      </body>
</html>