<?php
include ('Config.php');
$error='';

if(isset($_POST['submit'])){

    // Preluam datele de pe formular
    $name = htmlentities($_POST['name'], ENT_QUOTES);
    $email = htmlentities($_POST['email'], ENT_QUOTES);
    $password = htmlentities($_POST['password'], ENT_QUOTES);
    $confirm_pass = htmlentities($_POST['confirm_pass'], ENT_QUOTES);

    // Extragem informatiile din baza de date
    $sql="SELECT * FROM user_form where email='$email' AND password='$password'";
    $select = mysqli_query($conn,$sql);

    // Verificam daca sunt completate
    if ($name == '' || $email== ''||$password=='' || $confirm_pass=='')
    {
        $message[] = "Please fill the empty spaces!";
    }

    // Verificam daca userul exista deja in baza de date
    else if (mysqli_num_rows($select) > 0)
    {
        $message[] = "User already exist!";
    }

    // Trimitem datele spre baza de date
    else {
        if ($stmt = $conn->prepare("INSERT into user_form (name, email, password,confirm_pass) VALUES (?, ?, ?, ?)"))
        {
            $stmt->bind_param("ssss", $name, $email,$password,$confirm_pass);
            $stmt->execute();
            $stmt->close();
            $message[] = "Registered successfully!";
        }
        else echo 'SQL ERROR!';
    } }

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
    <title>HOME DECO - Register</title>
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
        <a  href="homeUK.php">Home</a>
        <a href="loginUK.php" class="active"  href="">Account</a>
        <a href="indexUK.php">Shopping Cart</a>
        <a href="contactUK.php">Contact</a>
    </div>

</div>
<div style="padding-left:60px">
</div>
</div>
<br>
<div class="form-container">
    <form action="" method="post">
        <h3 style="font-family:'Arial Unicode MS'">Register as a new user</h3>
        <input type="text" name="name" required placeholder="Enter username" class="box">
        <input type="email" name="email" required placeholder="Enter email" class="box">
        <input type="password" name="password" required placeholder="Enter password" class="box">
        <input type="password" name="confirm_pass" required placeholder="Confirm password" class="box">
        <input type="submit" name="submit" class="btn" value="Register now">
        <p>Already have an account? <a href="login.php">Login now</a></p>
    </form>

</div>

</body>
</html>