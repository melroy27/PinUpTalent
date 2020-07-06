<?php
include_once '../User/userheader.php';
?>
<script> 
          // Function to check Whether both passwords 
          // is same or not. 
          function checkPassword(form) { 
              password1 = form.pwd.value; 
              password2 = form.pwdre.value; 

              // If password not entered 
              if (password1 == '') 
                  alert ("Please enter Password"); 
                    
              // If confirm password not entered 
              else if (password2 == '') 
                  alert ("Please enter confirm password"); 
                    
              // If Not same return False.     
              else if (password1 != password2) { 
                  alert ("\nPassword did not match: Please check again...") 
                  return false; 
              } 

              // If same return True. 
              else{ 
                  alert("Password Match: Successfully Registered!") 
                  return true; 
              } 
          } 
      </script> 
<section class="main-container">
    <div class="main-wrapper"> 
    <h2>SignUp</h2>
    <form class="signup-form" action="../includes/signup.inc.php" method="POST">
                <input type="text" name="first" placeholder="First Name">
                <input type="text" name="last" placeholder="Last Name">
                <input type="text" name="emailid" placeholder="Email Id">
                <input type="text" name="uname" placeholder="UserName">
                <input type="password" name="pwd" placeholder="Password">
                <input type="password" name="pwdre" placeholder="Re-Type">
                <button type="submit" name="submit">Sign Up</button>
                
    </form>
    </div>
</section>

<?php
include_once '../User/userfooter.php'
?>
     