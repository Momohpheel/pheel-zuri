<?php

session_start();

if ( isset($_POST['username']) && isset($_POST['password'])){
    if (!empty($_POST['username']) && !empty($_POST['password'])){

        $username = $_POST['username'];
        $password = $_POST['password'];

        $file = fopen("register.txt", "r");
        $size = filesize("register.txt");
        $data = fread($file, $size);
        fclose($file);

        $arr = explode(",",$data);
        for($i=0; $i<count($arr); $i++){
            if ($arr[$i] == $username.' '.$password){
                $_SESSION['name'] = $username;
                Header("Location: index.php");

            }
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

<h5>Login</h5>
    <form action="login.php" method="POST">
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