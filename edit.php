<?php
  session_start();
  include "config.php";
  
  #Check if form submitted
  $message="";
  if($_SERVER["REQUEST_METHOD"]=='POST'){
    $caf=mysqli_real_escape_string($con,$_POST["frm_caf"]);
    $doj=mysqli_real_escape_string($con,$_POST["frm_doj"]);
    $rn=mysqli_real_escape_string($con,$_POST["frm_rn"]);
    $name=mysqli_real_escape_string($con,$_POST["frm_name"]);
    $dob=mysqli_real_escape_string($con,$_POST["frm_dob"]);
    $bg =mysqli_real_escape_string($con,$_POST["frm_bg"]);
    $sql="UPDATE fproject SET CAF='{$caf}',DOJ='{$doj}',RN='{$rn}',NAME='{$name}',DOB='{$dob}',BG='{$bg}' WHERE UID='{$_GET["id"]}'";
    if($con->query($sql)){
      flash('msg','User Updated Successfully');
    }else{
      flash('msg','User Updated Failed','red');
    }
  }
  
  #Select user details from the table
  $sql="select * from fproject where UID='{$_GET["id"]}'";
  $res=$con->query($sql);
  if($res->num_rows>0){
    $row=$res->fetch_assoc();
?>
<html>
  <head>
    <title>BEYCAN </title>
    <link rel='stylesheet' href='style.css'>
    <style>
      
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

.header {
    background-color: #94c5d3;
  padding: 3px;
  text-align: center;
}


/* Style the top navigation bar */
.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: black;
  color: white;
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
    </style>
  </head>
  
<body >
  <div class="form-box">
  <div class="topnav">
    <a class="active" href="index.php">Home</a>
    <a href="searchdetail.php">Search</a>
  </div>
    <div class='container'>
      <?php flash('msg'); ?>
      <form method='post' action='<?php echo $_SERVER["REQUEST_URI"]; ?>' class='frm'>
        <h1>Beycan Student Certificate Details</h1>
        <div class='group'>
        <label>Certificate Number: </label>
          <input type='text' name='frm_caf'  required value="<?php echo $row["CAF"]; ?>"> 
        </div>
        <div class='group'>
        <label>Student Name: </label>
          <input type='text' name='frm_doj' required value="<?php echo $row["DOJ"]; ?>">
        </div>
        <div class='group'>
        <label>Course: </label>
          <input type='text' name='frm_rn' required value="<?php echo $row["RN"]; ?>">
        </div>
        <div class='group'>
        <label>Date of joining: </label>
          <input type='text' name='frm_name' required value="<?php echo $row["NAME"]; ?>">
        </div>
        <div class='group'>
        <label>Certificate Status: </label>
          <input type='text' name='frm_dob' required value="<?php echo $row["DOB"]; ?>">
        </div>
        <div class='group'>
        <label>Course Status: </label>
          <input type='text' name='frm_bg' required value="<?php echo $row["BG"]; ?>">
        </div>
        <div class="form-box">
                 <center> <button>Update details</button></center>
      </div>
      </form>
    </div>
    </div>
  </body>
</html>
<?php 
  }
