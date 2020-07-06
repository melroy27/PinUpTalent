<?php

if(isset($_POST['submit']))
{

    include_once 'dbh.inc.php';

    $comp_name = mysqli_real_escape_string($conn,$_POST['comp_name']);
    $email = mysqli_real_escape_string($conn,$_POST['emailid']);
    $uid=  mysqli_real_escape_string($conn,$_POST['uname']);
    $pwd = mysqli_real_escape_string($conn,$_POST['pwdre']);

    //error handling
    // check empty fields
    if(empty($comp_name)||empty($email) ||empty($uid)||empty($pwd))
    {
        header("Location: ../Company/compReg.php?CompReg=empty");
        exit();
    }
    else
    {
        //check if inputs characters are valid
        if( !preg_match("/^[a-zA-Z]*$/",$comp_name))
            {
                header("Location: ../Company/compReg.php?CompReg=invalid");
                exit();
            }
             else
              {
                    if(!filter_var($email, FILTER_VALIDATE_EMAIL))
                {
                    header("Location: ../Company/compReg.php?compReg=invalid_email");
                    exit();
                }
                else
                {
                    $sql = "select * from company where comp_userid='$uid' or comp_email='$email' ";
                    $result = mysqli_query($conn,$sql);
                    $resultcheck = mysqli_num_rows($result);

                    if($resultcheck >0)
                    {
                        header("Location: ../Company/compReg.php?compReg=usertakenORemailtaken");
                        exit();
                    }
                        else
                        {
                            //hasing the password
                            $hashedpwd = password_hash($pwd, PASSWORD_DEFAULT);
                            // insert the user into the db
                            $sql = "INSERT INTO company (comp_name,comp_email,comp_userid,comp_pass) values('$comp_name','$email','$uid','$hashedpwd');";
                            mysqli_query($conn,$sql);
                            header("Location: ../Company/compReg.php?cserReg=Success");
                            exit();
                        }
                 }
              }
    }    }
           else
          {
    header("Location: ../Company/compReg.php");
    exit();
}