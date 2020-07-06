<?php
session_start();
if(isset($_POST['submit'])){

    include 'dbh.inc.php';
   if(isset($_POST['uid']) && isset($_POST['pwd']))
   {
    //$email = mysqli_real_escape_string($conn,$_POST['uid']);
    $uid = mysqli_real_escape_string($conn,$_POST['uid']);
    $pwd = mysqli_real_escape_string($conn,$_POST['pwd']);
   }
//ERROR HANDLING
//check if inputs are empty

    if(empty($uid)|| empty($pwd))
    {
        header("Location: ../login/Comapny/compLogin.php?compLogin=empty");
        exit();
    } else{
       $sql = "SELECT * FROM company WHERE comp_name='$uid' or comp_userid='$uid' ";
       $result= mysqli_query($conn,$sql);
       $resultCheck = mysqli_num_rows($result);

       if($resultCheck < 1){
            header("Location: ../login/Company/compLogin.php?UserLogin=1");
            exit();
       }else{
           if($row = mysqli_fetch_assoc($result)){
            //de-hashing the password
            $hashedpasswordcheck = password_verify($pwd, $row['comp_pass']);
            if($hashedpasswordcheck == false){
                header("Location: ../login/Company/compLogin.php?compLogin=2"); 
                exit();
            }elseif($hashedpasswordcheck==true){
                //log in the user here
                $_SESSION['u_id']= $row['comp_id'];
                $_SESSION['comp_name']= $row['comp_name'];
                $_SESSION['comp_email']= $row['comp_email'];
                $_SESSION['comp_cid']= $row['comp_id'];
                header("Location: ../Company/compdashboard.php");
                exit();
            }
            
           }
       }

    }
}
else{

 header("Location: ../login/User/UserReg.php?UserLogin=error");
        exit();
}
