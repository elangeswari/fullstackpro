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
    
<style>

.header {
  background-color: lightblue;
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

.center-place{
    text-align: center;
    width: 1000px;
    height: 20px;
    padding: 5px 10px;
   
    margin: auto;
    margin-top: 20px;
}

.styled-table {
    position: center;
    border-collapse: collapse;
    margin-left: auto;  
    margin-right: auto;  
    font-size: 0.9em;
    font-family: sans-serif;
    min-width: 600px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
}

.styled-table thead tr {
    background-color: #009879;
    color: #ffffff;
    text-align: center;
}

th{
    background-color: rgba(0, 0, 0, 0.5);
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

.styled-table th,
.styled-table td {
    padding: 12px 15px;
    text-align: center;
}

.styled-table tbody tr {
    border-bottom: 1px solid #dddddd;
}

.styled-table tbody tr:nth-of-type(odd) {
    background-color: #94c5d3;
}

.styled-table tbody tr:nth-of-type(even) {
    background-color: #ffffff;
}

.styled-table tbody tr:last-of-type {
    border-bottom: 2px solid #009879;
}

.styled-table tbody tr.active-row {
    font-weight: bold;
    color: #009879;
}

h2{
    text-align: center;
    color:black;
}
</style>
    <title>BEYCAN</title>
    <link rel='stylesheet' href='style.css'>
  </head>
  <body>
<div class="form-box">   
<div class="topnav">
    <a class="active" href="index.php">Home</a>
    <a href="searchdetail.php">Search</a>
  </div>
    <div class='container'>
      <?php 
        #print flash message
        flash('msg'); 
      ?>
    
      
<?php 
if(count($data)>0){ ?>
    <table>
      <thead>
        <tr>
          <th>SNo</th>
          <th>Certificate Number</th>
          <th>Student Name</th>
          <th>Course</th>
          <th>Date of joining</th>
          <th>Certificate status</th>
          <th>Course status</th>
          <th>Edit</th>
          <th>Delete</th>
        </tr>
      </thead>
      <tbody>
        <?php 
          $i=0; 
          foreach($data as $row){ 
          $i++;
        ?>
        <tr>
          <td><?php echo $i; ?></td>
          <td><?php echo $row["CAF"]; ?></td>
          <td><?php echo $row["DOJ"]; ?></td>
          <td><?php echo $row["RN"]; ?></td>
          <td><?php echo $row["NAME"]; ?></td>
          <td><?php echo $row["DOB"]; ?></td>
          <td><?php echo $row["BG"]; ?></td>
          <td><a href='edit.php?id=<?php echo $row["UID"]; ?>' class='btn-blue'>Edit</a></td>
          <td><a href='delete.php?id=<?php echo $row[ "UID"]; ?>' onclick='return confirm("Are You Sure?")'  class='btn-red'>Delete</a></td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
<?php }else{ ?>
  <div class='alert-red'>No Records</div>
<?php }?>
</div> 

      </div>
</body>
</html>