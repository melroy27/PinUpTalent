<?php
session_start();
        if(isset($_SESSION['u_id'])){
            $name = $_SESSION['comp_name'];
            echo '<!DOCTYPE html>
            <html>
            <head>
                <!-- <script defer src="https://use.fontawesome.com/releases/v5.6.3/css/all.css"></script> -->
                <script defer src="https://kit.fontawesome.com/b41bf38fa3.js"></script>
                <link rel="stylesheet" href="../User/dashboard.css">
                <body>
                <nav class="navbar"
                    <div id="content">
                        <span class="slide">
                          <a href="#" onclick="openSlideMenu()">
                          <i class="fas fa-bars"></i>
                          </a>
                        </span>
                        <ul class="navbar-nav">
      <li><a href="#">Home</a></li>
      <li><a href="#">About</a></li>
      <li><a href="#">Services</a></li>
      <li><a href="#">Contact</a></li>
    </ul>
                        </nav>
                        <div id="menu" class="nav">
                            <a href="#" class="close" onclick="closesSideMenu()">
                                <i class="fas fa-times"></i>
                            </a>
                            <a href="#">Home</a>
                            <a href="#">Profile</a>
                            <a href="#">Setting</a>
                            <form action="../includes/complogout.inc.php" method="POST">
                        <input type="hidden">
                        <button type="submit" name="submit">Logout</button>
                        </input>
                        </form>
                        </div>
                         
                    </div>
                 
                </body>
            </head>
            </html>';
        }
        ?>
        <script>
            function openSlideMenu(){
                document.getElementById('menu').style.width= '250px';
                document.getElementById('content').style.marginLeft='250px';
            
            }
            function closesSideMenu(){
                document.getElementById('menu').style.width= '0';
                document.getElementById('content').style.marginLeft='0';
                
            }
                </script>
<?php
include_once '../User/userfooter.php';
?>