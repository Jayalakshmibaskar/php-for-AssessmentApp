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
     $email=$_POST['email'];
     $password=$_POST['pwd'];
     $select="select email,password from signup where email='$email'and password='$password'";
     $result=mysqli_query($conn,$select);
     $myObj=(object)null;

    if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result)){
         $assesmentdata="select * from testdata";
    $myObj->error = "false";
    $myObj->message = "Login successful";
    
    $myJSON = json_encode($myObj);
    
    echo $myJSON;  }           
           
    }else{
        //array_push($output,array('error'=>'','message'=>'User does not exists'));
        // $object->error="true";
        // $object->message="username does not exists"
        // $myJSON = json_encode($object); 
        // $echo $myJSON;
        $myObj->error = "true";
        $myObj->message = "Username does not exists";
    
    $myJSON = json_encode($myObj);
    
    echo $myJSON;            
    }
     }
mysqli_close($conn);
?>
