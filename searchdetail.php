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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$query="select * from fproject"; // Fetch all the records from the table address
$result=mysqli_query($conn,$query);

?>
<head>


<style>

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

.center-place{
    text-align: center;
    width: 1000px;
    height: 20px;
    padding: 5px 10px;
   
    margin: auto;
    margin-top: 20px;
}

.center-place1{
  
    border: 1px solid #26768e;
    
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
    background-color: lightgrey;
}

.styled-table tbody tr:nth-of-type(even) {
    background-color: lightgoldenrodyellow;
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
</head>
<body>
<div class="form-box">
<div class="topnav">
    <a class="active" href="index.php">Home</a>
    <a href="searchdetail.php">Search</a>
  </div>
  <div class="center-place">
   
   <form action="" method="GET">
       <input type="text" name="search" required value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control" placeholder="Search">
        <button type="submit" class="btn btn-primary"><i class="fa fa-search" style="font-size=50px"></i></button>
 </form>
   </div>
   <?php
  
  $result = mysqli_query($conn,"SELECT * FROM fproject LIMIT 50");
  $data = $result->fetch_all(MYSQLI_ASSOC);
  ?>
    <br>
  <br>
  <table class="styled-table" border="1">
    <tr>
          <th>Certificate Number</th>
          <th>Student Name</th>
          <th>Course</th>
          <th>Date of joining</th>
          <th>Certificate status</th>
          <th>Course status</th>
    </tr>
    
  
    <tbody>
    <?php 
          $i=0; 
          foreach($data as $row){ 
          $i++;
        ?>
       
        <?php } ?>
                                <?php 
                                    $con = mysqli_connect("localhost","root","","project");

                                    

                                    if(isset($_GET['search']))
                                    {
                                        $filtervalues = $_GET['search'];
                                        $query = "SELECT * FROM fproject WHERE CONCAT(CAF,DOJ,RN,NAME,DOB,BG) LIKE '%$filtervalues%' ";
                                        $query_run = mysqli_query($con, $query);

                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $items)
                                            {
                                                ?>
                                                <tr>
                                                
                                                    <td><?= $items['CAF']; ?></td>
                                                    <td><?= $items['DOJ']; ?></td>
                                                    <td><?= $items['RN']; ?></td>
                                                    <td><?= $items['NAME']; ?></td>
                                                    <td><?= $items['DOB']; ?></td>
                                                    <td><?= $items['BG']; ?></td>
                                                   
                                                </tr>
                                                <?php
                                            }
                                        }
                                        else
                                        {
                                            ?>
                                                <tr>
                                                    <td colspan="6">No Record Found</td>
                                                </tr>
                                            <?php
                                        }
                                    }
                                ?>
                            </tbody>
                                  </div>

</body>
</html>