<?php
include "login_handler.php";

if($_SESSION['id'] == ''){
    header("location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home Page</title>
    
    <link rel="stylesheet" href="../css/boostrapcss/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="../css/boostrapcss/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="../css/boostrapcss/mdb.min.css" type="text/css">
    <link rel="stylesheet" href="../css/style.css">
    
    <link rel="stylesheet" href="../icons/fontawesome-4.3.0.min.css">
</head>
<body>
    <div class="lgpage">
        <div class="navbarggs">
            <ul>
                <li><a href="cso.php">Home</a></li>

                <li><a href="#">About</a></li>

                <li><a href="#">Contact</a></li>

                <li><a href="logout.php" class="btnP"><i class="fa fa-user-times"> Logout</i></a></li>
            </ul>
            
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-pinterest-p"></i></a>
            <a href="#"><i class="fa fa-google-plus"></i></a>
        </div>
        
        <div style="margin-left:43%;">
            <img src="../images/sch.jpg" width="100px" height="100px">
        </div>
        
        <div style="text-align:center;">
            <h2 style="color:blue;">CHIEF SECURITY OFFICER'S SECTION</h2>

            <h4 style="color:blue;">All clearance request</h4>
        </div>
        
        <div class="uTable">
            <table  style="width:90%; border:none; margin:auto;" border="1">
                <thead>
                    <tr class="thd">
                        <th>Name</th>
                        <th>Reg no</th>
                        <th>Department</th>
                        <th>Program</th>
                        <th>Approve</th>
                        <th>Dis-approve</th>
                    </tr>
                </thead>
                
                <tbody>
                    <?php
                    $reqst = "pending";
                    
                    $ql="select * from crequest where csoreply='$reqst'";
                    
                    $re = $conn->query($ql);
                    
                    if(mysqli_num_rows($re) > 0){
                        while($ans = $re->fetch_assoc()){
                            echo "
                            <tr>
                            <td>".$ans['sName']."</td>
                            <td>".$ans['regNo']."</td>
                            
                            <td>".$ans['sDepartment']."</td>
                            
                            <td>".$ans['program']."</td>
                            
                            <td><form method='post' action='".csorep($conn)."'>
                            
                            <input type='text' name='rId' value='".$ans['rid']."' hidden>
                            
                            <input type='text' name='repAns' value='check' hidden>
                            
                            <button type='submit' name='approve' style='border:1px solid white;'><i class='fa fa-check'></i></button>
                            </form>
                            </td>
                            
                            <td>
                            <button type='submit' style='border:1px solid white;'><i class='fa fa-remove'></i></button>
                            </td>
                            </tr>
                            ";
                        }
                        
                    }else{
                        echo "<h2 style='color:blue;'>No new request</h2>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <?php
        if(isset($_GET['msg']) && $_GET['msg']=='success')
				{
					echo "<script>
                    alert('Welcome to the Cheif Security Officer section');
                    </script>";
				}
        ?>
        
    </div>
    
    <section class="feature_area section_gap_top">
      <div class="container">
          <div class="txtHed">
            <h2>Awesome Feature</h2>
            <p>
                Replenish man have thing gathering lights yielding shall you
            </p>
          </div>
          
        <div class="row">
          <div class="cntnt">
              <div class="icn"><img src="../images/cp.png" width="100%" height="100%"></div>
              
              <h4>Scholarship Facility</h4>
              
              <p>
                  One make creepeth, man bearing theira firmament won't great heaven
              </p>
            </div>
            
            <div class="cntnt">
                <div class="icn"><img src="../images/bk.png" width="100%" height="100%"></div>
                
                <h4>Sell Online Course</h4>
                
                <p>
                  One make creepeth, man bearing theira firmament won't great heaven
                </p>
            </div>
            
            <div class="cntnt">
                <div class="icn"><img src="../images/gcp.png" width="100%" height="100%"></div>
                
                <h4>Global Certification</h4>
                
                <p>
                    One make creepeth, man bearing theira firmament won't great heaven
                </p>
            </div>
            
        </div>
      </div>
    </section>
    
    <script src="../js/main.js"></script>
</body>
</html>