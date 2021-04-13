
<?php

session_start();
if ( isset($_POST['oldpassword']) && isset($_POST['oldpassword'])){
    if (!empty($_POST['newpassword']) && !empty($_POST['newpassword'])){

        $old_password = $_POST['oldpassword'];
        $new_password = $_POST['newpassword'];

        $file = fopen("register.txt", "r");
        
        $size = filesize("register.txt");
        $data = fread($file, $size);
        
        $old_data =  $_SESSION['name'].' '.$old_password;
        $new_data =  $_SESSION['name'].' '.$new_password;
        $position = strpos($data, $old_data);
        echo $position;
        $length = strlen($_SESSION['name'].' '.$old_password);
        echo $length;
        $new_data = substr_replace($data, $new_data, $position, $length);
        // $file_write = fopen("register.txt", "a"); 
        // fwrite($file_write, $new_data);
        fclose($file);
        
    }
}




?>

<!DOCTYPE html>
<html>
<head>
    <title>Zuri Forms</title>
</head>
<body>

<h1>Zuri Forms</h1>

<h5>Reset Password</h5>
    <form action="reset.php" method="POST">
        <label>Old Password<label>
        <input type="text" name="newpassword">
        <br><br>
        <label>New Password<label>
        <input type="text" name="oldpassword">
        <br><br>
        <input type="submit">
    </form>
    
</body>
</html>