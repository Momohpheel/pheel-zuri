<?php

error_reporting(0);
if (isset($_POST['name']) && isset($_POST['username']) && isset($_POST['password'])){
    if (!empty($_POST['name']) && !empty($_POST['username']) && !empty($_POST['password'])){

        $name = $_POST['name'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        $file = fopen("register.txt", "a");
        $file_r = fopen("register.txt", "r");
        $size = filesize("register.txt");
        $response = 0;
       
        if ($size > 0){
            $data = fread($file_r, $size);
            $arr = explode(",",$data);
            for($i=0; $i<count($arr); $i++){
                if ($arr[$i] == $username.' '.$password){
                    $response = 1;
                    
                }
            }
        }
      
        
        
        if ($response == 1){
            echo "Username already exists";
        }else{
            fwrite($file, $username.' '.$password.',');
            fclose($file);
            Header("Location: login.php");
        }
        
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

<h5>Register</h5>
    <form action="zuri.php" method="POST">
        <label>Name<label>
        <input type="text" name="name">
        <br><br>
        <label>Username<label>
        <input type="text" name="username">
        <br><br>
        <label>Password<label>
        <input type="text" name="password">
        <br><br>
        <input type="submit">
    </form>

</body>
</html>