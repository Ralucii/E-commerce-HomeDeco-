<?php
include 'Config.php';
session_start();

if(isset($_POST['submit'])){

    // Preluam datele de pe formular
    $email = htmlentities($_POST['email'], ENT_QUOTES);
    $password = htmlentities($_POST['password'], ENT_QUOTES);

    // Extragem informatiile din baza de date
    $sql="SELECT * FROM user_form WHERE email = '$email' AND password = '$password'";
    $select = mysqli_query($conn, $sql) or die('Query failed');
    $rowcount=mysqli_num_rows($select);

    if (($rowcount) > 0){
        $row = mysqli_fetch_assoc($select);
        $_SESSION['user_id'] = $row['id'];
        header('location:index.php?login=success');
    }
    else {
        $message[] = 'Incorrect password or email!';
    }
}
?>

<?php
if(isset($message)){
    foreach($message as $message){
        echo '<div class="message" onclick="this.remove();">'.$message.'</div>';
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME DECO - Login </title>
    <link rel="icon" type="image/png" href="icon.png"/>
    <!-- Legatura cu pagina Style.css -->
    <link rel="stylesheet" href="Style.css">

</head>
<body>
<div class="header">
    <a href="homeUK.php" class="logo"><img src="icon.png"</a>
    <div class="header-right">
        <div class="dropdown">
            <button class="header"><img src="arrow.png" width="20" height="20"</a>
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a href=homeUS.php>US</a>
                <a href="homeUK.php">UK</a>
                <a href="homeRO.php">RO</a>
            </div>
        </div>
        <a href="homeUK.php">Home</a>
        <a class="active" href="loginUK.php">Account</a>
        <a href="indexUK.php">Shopping Cart</a>
        <a href="contactUK.php">Contact</a>
    </div>

</div>
<div style="padding-left:60px">
</div>

<div class="form-container">
    <form action="" method="post">
        <h3>Login Here</h3>
        <input type="email" name="email" required placeholder="Enter email" class="box">
        <input type="password" name="password" required placeholder="Enter password" class="box">
        <input type="submit" name="submit" class="btn" value="login now">
        <p>Don't have an account? <a href="register.php">Register now</a></p>
    </form>
</div>

</body>
</html>