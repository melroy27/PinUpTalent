<?php

if(isset($_POST['submit']))
{

    include_once 'dbh.inc.php';

    $first = mysqli_real_escape_string($conn,$_POST['first']);
    $last = mysqli_real_escape_string($conn,$_POST['last']);
    $email = mysqli_real_escape_string($conn,$_POST['emailid']);
    $uid=  mysqli_real_escape_string($conn,$_POST['uname']);
    $pwd = mysqli_real_escape_string($conn,$_POST['pwdre']);
    $combo= $first.$last;

    //error handling
    // check empty fields
    if(empty($first)|| empty($last)||empty($email) ||empty($uid)||empty($pwd))
    {
        header("Location: ../User/UserReg.php?UserReg=empty");
        exit();
    }
    else
    {
        //check if inputs characters are valid
        if( !preg_match("/^[a-zA-Z]*$/",$first))
            {
                header("Location: ../User/UserReg.php?UserReg=invalid");
                exit();
            }
             else
              {
                    if(!filter_var($email, FILTER_VALIDATE_EMAIL))
                {
                    header("Location: ../User/UserReg.php?UserReg=invalid_email");
                    exit();
                }
                else
                {
                    $sql = "select * from user where user_name='$uid'";
                    $result = mysqli_query($conn,$sql);
                    $resultcheck = mysqli_num_rows($result);

                    if($resultcheck >0)
                    {
                        header("Location: ../User/UserReg.php?UserReg=usertaken");
                        exit();
                    }
                        else
                        {
                            //hasing the password
                            $hashedpwd = password_hash($pwd, PASSWORD_DEFAULT);
                            // insert the user into the db
                            $sql = "INSERT INTO user (full_name,user_name,user_email,user_password) values('$combo','$uid','$email','$hashedpwd');";
                            mysqli_query($conn,$sql);
                            header("Location: ../User/UserReg.php?UserReg=Success");
                            exit();
                        }
                 }
              }
    }    }
           else
          {
    header("Location: ../User/UserReg.php");
    exit();
}