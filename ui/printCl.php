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
    <div id="checkCls">
            
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
                <input name='' type='button' value='Print' onclick='javascript:window.print()' style='cursor:pointer; float:left; width:120px;' class='btn btn-primary' />
                ";
                
            }
            
            ?>
        </div>
</body>
</html>