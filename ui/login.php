<?php
include "login_handler.php";
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
    <div class="bgim">
        <a href="index.php" class="arrowbk"><i class="fa fa-home"> Home</i></a>
        <div class="logfrm">
            <div>
                <img src="../images/sch.jpg" width="100px" height="100px" style="border-radius:50%;">
            </div>
            
            <?php echo '
            <form method="post" action="'.logUser($conn).'">
                
                <div class="input"><input type="text" name="user" class="txt" placeholder="Username">
                <i class="fa fa-user" id="icn"></i></div>
                
                <div class="input"><input type="password" name="pass" class="txt" placeholder="Password">
                <i class="fa fa-lock" id="icn"></i></div>
                
                <div class="input"><select name="usertype" class="txt">
                    <option value="admin">Admin</option>
                
                    <option value="cso">C.S.O</option>
                    
                    <option value="hod">H.O.D</option>
                    
                    <option value="librarian">Librarian</option>
                    
                    <option value="sao">S.A.O</option>
                    
                    <option value="student">Student</option>
                </select>
                <i class="fa fa-users" id="icn"></i></div><br>
                
                <input type="reset" class="btn btn-primary"><br>
                
                <input type="submit" name="login" class="btn btn-primary">
            </form>'; ?><br>
            
            <p>Note: Students should login with their Registration Number.</p>
        </div>
        
    </div>
</body>
</html>