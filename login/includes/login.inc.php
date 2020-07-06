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
        header("Location: ../login/User/UserLogin.php?UserLogin=empty");
        exit();
    } else{
       $sql = "SELECT * FROM user WHERE user_name='$uid'";
       $result= mysqli_query($conn,$sql);
       $resultCheck = mysqli_num_rows($result);

       if($resultCheck < 1){
            header("Location: ../login/User/UserLogin.php?UserLogin=1");
            exit();
       }else{
           if($row = mysqli_fetch_assoc($result)){
            //de-hashing the password
            $hashedpasswordcheck = password_verify($pwd, $row['user_password']);
            if($hashedpasswordcheck == false){
                header("Location: ../login/User/UserLogin.php?UserLogin=2"); 
                exit();
            }elseif($hashedpasswordcheck==true){
                //log in the user here
                $_SESSION['u_id']= $row['user_id'];
                $_SESSION['u_fullname']= $row['full_name'];
                $_SESSION['u_name']= $row['user_name'];
                $_SESSION['u_email']= $row['user_email'];
                $_SESSION['u_uid']= $row['user_id'];
                header("Location: ../User/userdashboard.php");
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
