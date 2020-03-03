<?php
include "db.php";
SESSION_START();

function logUser($conn){
    if(isset($_POST['login'])){
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        $usertype = $_POST['usertype'];

        if($user !='' and $pass !='' and $usertype !=''){
            if($usertype=='admin'){
                $ql="select * from admin where user='$user' and pass='$pass'";

                $re = $conn->query($ql);
                if(mysqli_num_rows($re) == 1){
                    if($row = $re->fetch_assoc()){
                        $_SESSION['id']= $row['id'];

                        header("location: admin.php");
                    }
                    
                }else{
                    echo "<script>alert('Invalid user info, please enter again')</script>";
                }

            }
            elseif($usertype=='cso'){
                $ql="select * from csoinfo where name='$user' and pass='$pass'";
                
                $re = $conn->query($ql);
                if(mysqli_num_rows($re) == 1){
                    if($row = $re->fetch_assoc()){
                        $_SESSION['id'] = $row['csoId'];
                        
                        header("location: cso.php?msg=success");
                    }
                }else{
                    echo "<script>alert('Invalid user info, please enter again')</script>";
                }
            }elseif($usertype=='hod'){
                $ql="select * from hodinfo where name='$user' and pass='$pass'";

                $re = $conn->query($ql);
                if(mysqli_num_rows($re) == 1){
                    if($row = $re->fetch_assoc()){
                        $_SESSION['id'] = $row['hodId'];
                        $_SESSION['dep'] = $row['department'];

                        header("location: hod.php?msg=success");
                    }
                }else{
                    echo " <script>alert('Invalid user info, please enter again')</script>";
                }
            }elseif($usertype=='librarian'){
                $ql="select * from librarianinfo where name='$user' and pass='$pass'";
                
                $re = $conn->query($ql);
                if(mysqli_num_rows($re) == 1){
                    if($row = $re->fetch_assoc()){
                        $_SESSION['id'] = $row['libId'];
                        
                        header("location: librarian.php?msg=success");
                    }
                }else{
                    echo "<script>alert('Invalid user info, please enter again')</script>";
                }
            }elseif($usertype=='sao'){
                $ql="select * from saoinfo where name='$user' and pass='$pass'";
                
                $re = $conn->query($ql);
                if(mysqli_num_rows($re) == 1){
                    if($row = $re->fetch_assoc()){
                        $_SESSION['id'] = $row['saoId'];
                        
                        header("location: sao.php?msg=success");
                    }
                }else{
                    echo "<script>alert('Invalid user info, please enter again')</script>";
                }
            }elseif($usertype=='student'){
                $ql="select * from studentinfo where regNo='$user' and pass='$pass'";
                
                $re = $conn->query($ql);
                if(mysqli_num_rows($re) == 1){
                    if($row = $re->fetch_assoc()){
                        $_SESSION['id'] = $row['id'];
                        
                        header("location: student.php?msg=success");
                    }
                }else{
                    echo "<script>alert('Invalid user info, please enter again')</script>";
                }
            }
        }else{
            echo "<script>alert('User info cannot be null, please enter again')</script>";
        }
    }  
}


function getstudInfo($conn){
    $ql="select * from studentinfo where id='".$_SESSION['id']."'";
    
    $re = $conn->query($ql);
    $row = $re->fetch_assoc();
    
    echo"<table class='studTable' border='1'>
    <tr style='margin-left: 40px;'>
    <th colspan='2'><img src='../images/pro.png' width='100%' height='100%' class='proPic'></th>
    </tr>
    
    <tr>
    <th>Name:</th><td>". $row['name'] ."</td>
    </tr>
    
    <tr>
    <th>Reg no:</th><td>". $row['regNo'] ."</td>
    </tr>
    
    <tr>
    <th>Department:</th><td>". $row['department'] ."</td>
    </tr>
    
    <tr>
    <th>Stream:</th><td>". $row['stream'] ."</td>
    </tr>
    
    <tr>
    <th>Program:</th><td>". $row['program'] ."</td>
    </tr>
    
    <tr>
    <th>G.S.M:</th><td>". $row['phone'] ."</td>
    </tr>
    
    <tr>
    <th>Year entered:</th><td>". $row['yearEnt'] ."</td>
    </tr>
    
    <tr>
    <th>Year graduate:</th><td>". $row['yearGrad'] ."</td>
    </tr>
    
    </table>";
}


function applyclearance($conn){
    if(isset($_POST['applyNow'])){
        $sId = $_POST['sId'];
        $sName = $_POST['sName'];
        $regNo = $_POST['regNo'];
        $sDepartment = $_POST['sDepartment'];
        $program = $_POST['program'];
        
        if($sId !='' and $sName !='' and $regNo !='' and $sDepartment !='' and $program !=''){
            
            $sql="insert into crequest (sId, sName, regNo, sDepartment, program, hodreply, hRepdate, libreply, lRepdate, csoreply, csoRepdate, saoreply, saoRepdate) values ('$sId', '$sName', '$regNo', '$sDepartment', '$program', 'pending', '', 'pending', '', 'pending', '', 'pending', '')";
        
            if($res = $conn->query($sql)){
                
                header("location: student.php?applymsg=success");
            }
        }else{
            echo "
            <script>alert('Please fill all the blanks !!')</script>
            ";
        }
        
    }
}

function csorep($conn){
    if(isset($_POST['approve'])){
        $repId = $_POST['rId'];
        $reply = $_POST['repAns'];
        $date = date("Y-m-d");
        
        $ql="update crequest set csoreply='$reply', csoRepdate='$date' where rid='$repId'";
        
        if($res = $conn->query($ql)){
            header("location: cso.php");
        }
    }
}


function hodReply($conn){
    if(isset($_POST['acpt'])){
        $repId = $_POST['rId'];
        $reply = $_POST['repAns'];
        $date = date("Y-m-d");

        $ql="update crequest set hodreply='$reply', hRepdate='$date' where rid='$repId'";

        if($re = $conn->query($ql)){
            header("location: hod.php");
        }else{
            echo "error!!";
        }
    }
}

function libReply($conn){
    if(isset($_POST['acpt'])){
        $repId = $_POST['rId'];
        $reply = $_POST['repAns'];
        $date = date("Y-m-d");
        
        $ql="update crequest set libreply='$reply', lRepdate='$date' where rid='$repId'";

        if($re = $conn->query($ql)){
            header("location: librarian.php");
        }else{
            echo "error!!";
        }
    }
}

function saoReply($conn){
    if(isset($_POST['acpt'])){
        $repId = $_POST['rId'];
        $reply = $_POST['repAns'];
        $date = date("Y-m-d");
        
        $ql="update crequest set saoreply='$reply', saoRepdate='$date' where rid='$repId'";

        if($re = $conn->query($ql)){
            header("location: sao.php");
        }else{
            echo "error!!";
        }
    }
}

function addStud($conn) {
    if(isset($_POST['addStud'])){
        $name=$_POST['sName'];
        $sPhone=$_POST['sPhone'];
        $dep=$_POST['dep'];
        $program=$_POST['program'];
        $stream=$_POST['stream'];
        $regNo=$_POST['regNo'];
        $yEnt=$_POST['yEnt'];
        $yGrad=$_POST['yGrad'];
        $pass="stud";
        
        if($name !='' and $sPhone !='' and $dep !='' and $program !='' and $stream !='' and $regNo !='' and $yEnt !='' and $yGrad !=''){
            
            $ql="insert into studentinfo (name, phone, department, program, stream, regNo, yearEnt, yearGrad, pass) values ('$name', '$sPhone', '$dep', '$program', '$stream', '$regNo', '$yEnt', '$yGrad', '$pass')";
            
            if($rest = $conn->query($ql)){
                echo"<script>alert('Student Record added successfully')</script>";
            }else{
                echo"<script>alert('Error!!')</script>";
            }
            
        }else{
            echo"<script>alert('Fill all the blanks pls!!')</script>";
        }
        
    }
}

function AddHod($conn){
    if(isset($_POST['addAdmin'])){
        $hName=$_POST['hName'];
        $pass="hod";
        $hdep = $_POST['Hdep'];
        
        if($hName !='' and $hdep !=''){
            $ql="insert into hodinfo (name, pass, department) values ('$hName', '$pass', '$hdep')";
        
            if($re = $conn->query($ql)){
                echo "<script>alert('HOD added Successfully...')</script>";
            }else{
                echo "<script>alert('Failed to add H.O.D !!')</script>";
            }
        }else{
            echo "<script>alert('Fill all the form pls !!')</script>";
        }
        
        
    }
}














