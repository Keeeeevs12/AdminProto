<?php
    session_start();
    include 'includes/auth.php';
    include 'includes/dbconnection.php';
?>

    <html>
    <head>
        <title>Login</title>
    </head>
    <body>
    <form action="" method="post">
        <input type="text" name="contact_num" placeholder="Enter your contact number">
        <input type="password" name="password" placeholder="Enter your password">
        <input type="submit" name="submit" value="Submit">
    </form>
    </body>
    </html>

<?php

if ( isset($_POST['submit']) ) {
    if (empty($_POST['contact_num']) || empty($_POST['password'])) {
        echo '<script>alert("Both Fields are required.")</script>';
    }
    else {
        $contact_num = mysqli_real_escape_string($con, $_POST['contact_num']);
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $hshpsw = md5($password);

        $query = mysqli_query($con,"SELECT * FROM users WHERE contact_num = '$contact_num' AND password = '$hshpsw'");
        $rows = mysqli_fetch_assoc($query);
        $num=mysqli_num_rows($query);
        if ($num == 1) {
            $_SESSION['contact_num']=$rows['contact_num'];
            $_SESSION['full_name']=$rows['full_name'];
            $_SESSION['bday']=$rows['bday'];
            $_SESSION['email_add']=$rows['email_add'];
            $_SESSION['patients_id']=$rows['patients_id'];
            header( "Location: index-user.php");
        }

        $query1 = mysqli_query($con,"SELECT * FROM sec_accnts WHERE contact_num = '$contact_num' AND password = '$hshpsw'");
        $rows1 = mysqli_fetch_assoc($query1);
        $num1=mysqli_num_rows($query1);
        if ($num1 == 1) {
            $_SESSION['contact_num']=$rows1['contact_num'];
            $_SESSION['full_name']=$rows1['full_name'];
            $_SESSION['email_add']=$rows1['email_add'];
            $_SESSION['sec_id']=$rows1['sec_id'];
            $_SESSION['clinic']=$rows1['clinic'];
            header( "Location: index-sec.php");
        }

        $query2 = mysqli_query($con,"SELECT * FROM admin_accnt WHERE contact_num = '$contact_num' AND password = '$hshpsw'");
        $rows2 = mysqli_fetch_assoc($query2);
        $num2=mysqli_num_rows($query2);
        if ($num2 == 1) {
            $_SESSION['contact_num']=$rows2['contact_num'];
            $_SESSION['full_name']=$rows2['full_name'];
            $_SESSION['admin_id']=$rows2['admin_id'];
            header( "Location: index-admin.php");
        }

        else
        {

            $error = "Contact Number or Password is invalid";
        }
    }
}
?>