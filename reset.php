
<?php

session_start();
if ( isset($_POST['oldpassword']) && isset($_POST['oldpassword'])){
    if (!empty($_POST['newpassword']) && !empty($_POST['newpassword'])){

        $old_password = $_POST['oldpassword'];
        $new_password = $_POST['newpassword'];
       
        $filepath = 'register.txt';
        $content = file_get_contents($filepath);
        $file = file("register.txt");
        
        $old_data =  $_SESSION['name'].' '.$old_password;
        $new_data =  $_SESSION['name'].' '.$new_password;
        //$file[$old_data] = $new_data;

        $newcontent = str_replace($_SESSION['name'].' '.$old_password, $new_data, $content);
        file_put_contents($filepath, $newcontent);
        echo "Success, you can go back to the <a href='home.php'>home page</a> now";
       
        
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
        <input type="text" name="oldpassword">
        <br><br>
        <label>New Password<label>
        <input type="text" name="newpassword">
        <br><br>
        <input type="submit">
    </form>
    
</body>
</html>