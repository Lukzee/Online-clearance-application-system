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
    <title>Admin Section</title>

    <link rel="stylesheet" href="../css/boostrapcss/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="../css/boostrapcss/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="../css/boostrapcss/mdb.min.css" type="text/css">
    <link rel="stylesheet" href="../css/style.css">
    
    <link rel="stylesheet" href="../icons/fontawesome-4.3.0.min.css">
    
    <style>
        .txts {
            width: 100%;
            height: 40px%;
        }
        
        #viewReq {
            display: none;
        }
        
    </style>
</head>
<body>
    <div class="lgpage">
        <div class="navbarggs">
            <ul>
                <li><a href="admin.php">Home</a></li>

                <li><a href="#">About</a></li>

                <li><a href="#">Contact</a></li>
                
                <li><a href="#" onclick="showAllreq();">View all clearance requests</a></li>

                <li><a href="logout.php" class="btnP"><i class="fa fa-user-times"> Logout</i></a></li>
            </ul>
            
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-pinterest-p"></i></a>
            <a href="#"><i class="fa fa-google-plus"></i></a>
        </div>
        
        <div style="margin-left:44%;">
            <img src="../images/sch.jpg" width="100px" height="100px">
        </div>
        
        <div style="text-align:center;">
            <h2 style="color:blue;">ADMIN SECTION</h2>
            
            <div id="viewReq">
            <table  style="width:90%; border:none; margin:auto; text-align: left;" border="1">
                <thead>
                    <tr class="thd">
                        <th>Reg no</th>
                        <th>Name</th>
                        <th>Department</th>
                        <th>Program of Study</th>
                    </tr>
                </thead>
                
                <tbody>
                    <?php
                    
                    $ql="select * from crequest";
                    $re = $conn->query($ql);
                    
                    while($ans = $re->fetch_assoc()){
                            echo "
                            <tr>
                            <td>".$ans['regNo']."</td>
                            <td>".$ans['sName']."</td>
                            
                            <td>".$ans['sDepartment']."</td>
                            
                            <td>".$ans['program']." in ".$ans['sDepartment']."</td>
                            
                            ";
                        }
                    
                    ?>
                </tbody>
            </table>
            </div>
            
            <div class="row" id="rowCont">
                <div style="width:45%; margin-left:20px; padding:20px;">
                    <p style="color:blue; font-weight:bold;">Add H.O.D</p>
                    
                    <?php echo '
                    <form method="post" action="'.AddHod($conn).'">
                        <input type="text" name="hName" class="txts" placeholder="H.O.D name"><br><br>
                        
                        <input type="text" name="Hdep" class="txts" placeholder="H.O.D department"><br><br>
                        
                        <input type="submit" name="addAdmin" class="btn btn-primary">
                        
                        <input type="reset" class="btn btn-primary">
                        
                    </form>'; ?>
                </div>
                
                <div style="width:45%; margin-left:20px; padding:20px;">
                    <p style="color:blue; font-weight:bold;">Add Student</p>
                    
                    <?php echo'
                    <form method="post" action="'.addStud($conn).'">
                        <input type="text" name="sName" class="txts" placeholder="Student Name"><br><br>
                        
                        <input type="text" name="sPhone" class="txts" placeholder="Phone Number"><br><br>
                        
                        <input type="text" name="dep" class="txts" placeholder="Department"><br><br>
                        
                        <input type="text" name="program" class="txts" placeholder="Program"><br><br>
                        
                        <input type="text" name="stream" class="txts" placeholder="Stream"><br><br>
                        
                        <input type="text" name="regNo" class="txts" placeholder="Reg no"><br><br>
                        
                        <input type="text" name="yEnt" class="txts" placeholder="Year Entered"><br><br>
                        
                        <input type="text" name="yGrad" class="txts" placeholder="Year Graduate"><br><br>
                        
                        <input type="submit" name="addStud" class="btn btn-primary">
                        
                        <input type="reset" class="btn btn-primary">
                    </form>'; ?>
                </div>
            </div>
            
        </div>
        
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