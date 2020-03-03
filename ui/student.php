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
    
    <script type="text/javascript">

        var popupWindow=null;

        function child_open() { 

            popupWindow =window.open('printCl.php',"_blank","directories=no, status=no, menubar=no, scrollbars=yes, resizable=no,width=1050, height=650,top=70,left=100");
        }
    
    </script>
    
</head>
<body>
    <div class="lgpage">
        <div class="navbarggs">
            <ul>
                <li><a href="student.php">Home</a></li>

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
        
        <div style="margin-left:44%; margin-bottom:30px;">
            <img src="../images/sch.jpg" width="100px" height="100px">
        </div>
        
        <?php
        if(isset($_GET['msg']) && $_GET['msg']=='success')
				{
					echo "<script>
                    alert('Welcome to our clearance application portal, you can apply or check for your clearance application now');
                    </script>";
				}
        
        if(isset($_GET['applymsg']) && $_GET['applymsg']=='success')
				{
					echo "
                    <script>alert('Applied successfully')</script>
                ";
				}
        
        ?>
        <div style="width: 100%; display: inline-flex;" id="menu">
            <?php
                getstudInfo($conn);
            ?>
            
            <div class="textM">
                <p>Welcome to the school graduating students clearance application portal.</p>
                
                <p>Kindly apply for your clearance by clicking the link below, or check your application status <i class="fa fa-hand-o-down"></i></p>
                
                <a href="#" onclick="apply();" class="btn btn-primary">Apply Now</a><br>
                <a href="#" onclick="checks();" class="btn btn-primary">Check Now</a>
            </div>
        </div>
        
        <div id="applyCl" style="width:100%;">
            <?php
                $sql = "select * from crequest where sId ='".$_SESSION['id']."'";
            
            $re = $conn->query($sql);
            
            if(mysqli_num_rows($re) == 1){
                echo "<br><br><h3>You have already applied, kindly <a href='#' onclick='checksIt();'>click here</a> to verify welther your request have been granted, or <a href='student.php'>here</a> to move back to the Home page.</h3>";
            }else{
                $ql = "select * from studentinfo where id='".$_SESSION['id']."'";
                
                $re = $conn->query($ql);
                $rows = $re->fetch_assoc();
                
                echo "<h2 style='color:blue;'>Clearance form</h2>
                
                <form method='post' action='".applyclearance($conn)."'>
                
                <input type='text' name='sId' value='".$rows['id']."' hidden>
                
                <p>I, <input type='text' class='applytxt' name='sName' value='".$rows['name']."'> 
                
                with Registration number <input type='text' class='applytxt' name='regNo' value='".$rows['regNo']."'>, 
                
                from Department of <input type='text' class='applytxt' name='sDepartment' value='".$rows['department']."'>,
                
                here by applying for the clearance of the completion of my <input type='text' class='applytxt' name='program' value='".$rows['program']." in ".$rows['department']."'> program.
                
                </p><br>
                
                <div class='aplbtndiv'>
                <input type='submit' name='applyNow' class='btn btn-primary' value='Apply' style='width:40%;'>
                </div>
                
                </form>
                ";
            }
            ?>
        </div>
        
        <div id="checkCl">
            
            <?php
            $qry="select * from crequest where sId='".$_SESSION['id']."'";
            
            $ress=$conn->query($qry);
            
            if(mysqli_num_rows($ress) == 1){
                $qql="select * from studentinfo where id='".$_SESSION['id']."'";
                
                $re= $conn->query($qql);
                
                $row = $re->fetch_assoc();
                
                $rows = $ress->fetch_assoc();
                
                echo "
                <h2 style='color:blue; font-weight:bold;'>THE FEDERAL POLYTECHNIC BAUCHI <br> P.M.B 0231<br> BAUCHI</h2>
            
                <h4 style='color:blue;'>&#40;Office Of The Registrar Academics&#41;</h4>
            
                <p>REF: FPTB/RA/A.1/VOL.1</p>
                
                <strong style='text-decoration:underline; font-weight:bold'>GRADUATING STUDENTS' CLEARANCE FORM:</strong>
            
                <ol>
                
                <li>FULL NAME OF STUDENT: <span style='text-decoration:underline; font-style:italic; padding:5px; font-weight:bold;'> ". $row['name'] ." </span></li>
                
                <li>
                GSM NUMBER: 
                <span style='text-decoration:underline; font-style:italic; padding:5px; font-weight:bold;'> ".$row['phone']." </span>
                </li>
                
                <li>
                DEPARTMENT: 
                <span style='text-decoration:underline; font-style:italic; padding:5px; font-weight:bold;'> ".$row['department']." </span>
                </li>
                
                <li>
                PROGRAMME: 
                <span style='text-decoration:underline; font-style:italic; padding:5px; font-weight:bold;'> ".$row['program']." in ".$row['department']." </span>.. STREAM: <span style='text-decoration:underline; font-style:italic; padding:5px; font-weight:bold;'> ".$row['stream']." </span>
                </li>
                
                <li>
                REGISTRATION NUMBER: 
                <span style='text-decoration:underline; font-style:italic; padding:5px; font-weight:bold;'> ".$row['regNo']." </span>
                </li>
                
                <li>
                YEAR OF ENTRY: 
                <span style='text-decoration:underline; font-style:italic; padding:5px; font-weight:bold;'> ".$row['yearEnt']." </span>.. YEAR OF GRADUATION: <span style='text-decoration:underline; font-style:italic; padding:5px; font-weight:bold;'> ".$row['yearGrad']." <span>
                </li>
                
                </ol>
                
                <div>
                <strong style='text-decoration:underline; font-weight:bold'>A.&nbsp;&nbsp; HEAD OF DEPARTMENT:</strong>
                
                <p>I certify that, to the best of my knowledge, the student whose particulars appear above has passed all examinations leading to the award of 
                <span style='text-decoration:underline; font-style:italic; padding:5px; font-weight:bold;'> ".$rows['program']." </span> and he/she is not indepted to the Department. Any other comments: 
                <span style='text-decoration:underline; font-style:italic; padding:5px; font-weight:bold;'> GOOD ..</span>
                
                </p>
                
                <p>
                HEAD OF DEPARTMENT'S APPROVAL: 
                <span style='text-decoration:underline; font-style:italic; padding:5px; font-weight:bold;'> <i class='fa fa-".$rows['hodreply']."'></i> ".$rows['hodreply']." </span>
                
                DATE: 
                
                <span style='text-decoration:underline; font-style:italic; padding:5px; font-weight:bold;'> ..".$rows['hRepdate'].".. </span>
                </p>
                </div>
                
                <div>
                <strong style='text-decoration:underline; font-weight:bold'>B.&nbsp;&nbsp; POLYTECHNIC LIBRARIAN:</strong>
                
                <p>I certify that, to the best of my knowledge, the student whose particular appear above, is not adebted/is indebted to the Library. Nature of indebtedness(if any): 
                <span style='text-decoration:underline; font-style:italic; padding:5px; font-weight:bold;'> NONE ..</span>
                </p>
                
                <p>POLYTECHNIC LIBRARIAN'S APPROVAL: 
                <span style='text-decoration:underline; font-style:italic; padding:5px; font-weight:bold;'> <i class='fa fa-".$rows['libreply']."'></i> ".$rows['libreply']." </span>
                
                DATE: 
                <span style='text-decoration:underline; font-style:italic; padding:5px; font-weight:bold;'>..".$rows['lRepdate']."..</span>
                </p>
                </div>
                
                <div>
                <strong style='text-decoration:underline; font-weight:bold'>C.&nbsp;&nbsp; CHIEF SECURITY OFFICER:</strong>
                
                <p>I certify that, to the best of my knowledge, the student whose particulars appear above, has no pending case/misconduct with the Unit. Nature of the case (if any):
                <span style='text-decoration:underline; font-style:italic; padding:5px; font-weight:bold;'>None ..</span>
                </p>
                
                <p>CHIEF SECURITY OFFICER'S APPROVAL: 
                <span style='text-decoration:underline; font-style:italic; padding:5px; font-weight:bold;'><i class='fa fa-".$rows['csoreply']."'></i> ".$rows['csoreply']." ..</span>
                
                DATE: 
                <span style='text-decoration:underline; font-style:italic; padding:5px; font-weight:bold;'> ..".$rows['csoRepdate'].".. </span>
                </p>
                </div>
                
                <div>
                <strong style='text-decoration:underline; font-weight:bold'>D.&nbsp;&nbsp; STUDENTS AFFAIRS OFFICER:</strong>
                
                <p>I certify that, to the best of my knowledge, the student whose particulars appear above, is not indebted/is indebted to the Polytechnic. Nature of the case (if any): 
                <span style='text-decoration:underline; font-style:italic; padding:5px; font-weight:bold;'> None ..</span>
                </p>
                
                <p>STUDENTS AFFAIRS OFFICER'S APPROVAL: 
                
                <span style='text-decoration:underline; font-style:italic; padding:5px; font-weight:bold;'><i class='fa fa-".$rows['saoreply']."'></i> ".$rows['saoreply']." ..</span> 
                
                DATE: 
                <span style='text-decoration:underline; font-style:italic; padding:5px; font-weight:bold;'>..".$rows['saoRepdate']."..</span>
                </p>
                </div>
                
                <br>
                <input name='' type='button' value='Print' onclick='javascript:child_open()' style='cursor:pointer; width:120px;' class='btn btn-primary' />
                ";
                
            }else{
                echo "<h3 style='color:blue;'>You have not apply yet! <a href='#' onclick='applys();'>click here</a> to apply now</h3>";
            }
            
            ?>
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