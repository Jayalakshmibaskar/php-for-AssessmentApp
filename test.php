<?php
$servername = "localhost";
$username = "root";

$password = "";
$dbname="assessment_db";
$conn=mysqli_connect($servername,$username,$password,$dbname);
if(!$conn){
    die("Connecton failed:" .mysqli_connect_error());
}
else{
    $output=array();
    
    $select="select * from testdata";
    $result= mysqli_query($conn,$select);
    if(mysqli_num_rows($result)>0){
    while($row=mysqli_fetch_assoc($result)){
        array_push($output,array("testid"=>$row["testid"],"testname"=>$row["testname"],"difficulty"=>$row["difficulty"]));
        //$obj=array("data"=>$output);
    }
    echo json_encode($output,JSON_PRETTY_PRINT);
    //echo json_encode(array('data' => json_decode($obj)),JSON_PRETTY_PRINT);
    }
    }
mysqli_close($conn);

?>
  
