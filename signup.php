<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "assessment_db";
$conn=mysqli_connect($servername,$username,$password,$dbname);
if(!$conn){
    die("Connecton failed:" .mysqli_connect_error());
}
else{
    $output=array();
     $fname=$_POST['fname'];
     $lname=$_POST['lname'];
     $email=$_POST['email'];
     $password=$_POST['pwd'];
     $select="select email from signup where email='$email'";
    $result=mysqli_query($conn,$select);
    if(mysqli_num_rows($result)>0){
        array_push($output,array('error'=>'true','message'=>'user already exists'));
        echo json_encode($output,JSON_PRETTY_PRINT);              
    }else{
        $insert="insert into signup (firstname,lastname,email,password) values ('$fname','$lname','$email','$password')";
        $ins_res=mysqli_query($conn,$insert);
        array_push($output,array('error'=>'false','message'=>'successfully registered '));
        echo json_encode($output,JSON_PRETTY_PRINT);             
    }
     }
mysqli_close($conn);
?>

