<?php
include 'Config.php';
session_start();
$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
    header('location:loginRO.php');
};

if (isset($_GET['logout'])) {
    unset ($user_id);
    session_destroy();
    header('location:loginRO.php');
}
if(isset($_POST['add_to_cart'])){

    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];
    $product_quantity = $_POST['product_quantity'];

    $select_cart = mysqli_query($conn, "SELECT * FROM cart WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

    if(mysqli_num_rows($select_cart) > 0){
        $message[] = 'Produsul se afla deja in cos!';
    }else{
        mysqli_query($conn, "INSERT INTO cart (user_id, name, price, image, quantity) VALUES('$user_id', '$product_name', '$product_price', '$product_image', '$product_quantity')") or die('query failed');
        $message[] = 'Produsul a fost adaugat in cos!';
    }

};

if(isset($_POST['update_cart'])){
    $update_quantity = $_POST['cart_quantity'];
    $update_id = $_POST['cart_id'];
    mysqli_query($conn, "UPDATE cart SET quantity = '$update_quantity' WHERE id = '$update_id'") or die('query failed');
    $message[] = 'Cantitatea a fost actualizata!';
}

if(isset($_GET['remove'])){
    $remove_id = $_GET['remove'];
    mysqli_query($conn, "DELETE FROM cart WHERE id = '$remove_id'") or die('query failed');
    header('location:indexRO.php');
}

if(isset($_GET['delete_all'])){
    mysqli_query($conn, "DELETE FROM cart WHERE user_id = '$user_id'") or die('query failed');
    header('location:indexRO.php');
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
    <title>HOME DECO - Sesiune de cumparaturi </title>
    <link rel="icon" type="image/png" href="icon.png"/>

    <!-- Legatura cu pagina Style.css -->
    <link rel="stylesheet" href="Style.css">
</head>
<body>

<div class="header">
    <a href="homeRO.php" class="logo"><img src="icon.png"</a>
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
        <a href="homeRO.php">Acasa</a>
        <a href="loginRO.php">Contul meu</a>
        <a  class="active" href="indexRO.php">Cosul meu</a>
        <a href="contactRO.php">Contact</a>
    </div>

</div>
<div style="padding-left:60px">
</div>


<div class="container">
    <div class="user-profile">
        <?php
        $select_user = mysqli_query($conn, "SELECT * FROM user_form WHERE id = '$user_id'") or die('Query failed');
        if(mysqli_num_rows($select_user) > 0){
            $fetch_user = mysqli_fetch_assoc($select_user);
        };
        ?>

        <p> Nume de utilizator : <span><?php echo $fetch_user['name']; ?></span> </p>
        <p> Email : <span><?php echo $fetch_user['email']; ?></span> </p>
        <div class="flex">
            <a href="LoginRO.php" class="btn">Intra</a>
            <a href="RegisterRO.php" class="option-btn">Inregistraza-te</a>
            <a href="IndexRO.php?logout=""<?php echo $user_id; ?>" onclick="return confirm('Esti sigur ca vrei sa iesi din cont?');" class="delete-btn">Iesi</a>
        </div>
    </div>


<div class="products">
    <h1 class="heading">Ultimele produse</h1>
    <div class="box-container">

        <?php
        $select_product = mysqli_query($conn, "SELECT * FROM products ") or die('query failed');
        if(mysqli_num_rows($select_product) > 0){
            while($fetch_product = mysqli_fetch_assoc($select_product)){
                ?>

                <form method="post" class="box" action="">
                    <img src="images/<?php echo $fetch_product['image']; ?>" alt="">
                    <div class="name"><?php echo $fetch_product['name']; ?></div>
                    <div class="price">RON<?php echo $fetch_product['price']; ?></div>
                    <input type="number" min="1" name="product_quantity" value="1">
                    <input type="hidden" name="product_image" value="<?php echo $fetch_product['image']; ?>">
                    <input type="hidden" name="product_name" value="<?php echo $fetch_product['name']; ?>">
                    <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?>">
                    <input type="submit" value="Adauga in cos" name="add_to_cart" class="btn">
                </form>

                <?php
            };
        };
        ?>

    </div></div>

    <div class="shopping-cart">
        <h1 class="heading">Cos de cumparaturi</h1>

        <table>
            <thead>
            <th>Imagine</th>
            <th>Nume</th>
            <th>Pret</th>
            <th>Cantitate</th>
            <th>Total</th>
            <th>Actiune</th>
            </thead>
            <tbody>
            <?php
            $cart_query = mysqli_query($conn, "SELECT * FROM cart WHERE user_id = '$user_id'") or die('query failed');
            $grand_total = 0;
            if(mysqli_num_rows($cart_query) > 0){
                while($fetch_cart = mysqli_fetch_assoc($cart_query)){
                    ?>

                    <tr>
                        <td><img src="images/<?php echo $fetch_cart['image']; ?>" height="100" alt=""></td>
                        <td><?php echo $fetch_cart['name']; ?></td>
                        <td>RON<?php echo $fetch_cart['price']; ?></td>
                        <td>
                            <form action="" method="post">
                                <input type="hidden" name="cart_id" value="<?php echo $fetch_cart['id']; ?>">
                                <input type="number" min="1" name="cart_quantity" value="<?php echo $fetch_cart['quantity']; ?>">
                                <input type="submit" name="update_cart" value="Actualizeaza" class="option-btn">
                            </form>
                        </td>
                        <td>RON<?php echo $sub_total = ($fetch_cart['price'] * $fetch_cart['quantity']); ?></td>
                        <td><a href="indexRO.php?remove=<?php echo $fetch_cart['id']; ?>" class="delete-btn" onclick="return confirm('Elimini produsul?');">Sterge</a></td>
                    </tr>

                    <?php
                    $grand_total += $sub_total;
                }
            }
            else
            {
                echo '<tr><td style="padding:20px; text-transform:capitalize;" colspan="6">Nici un produs adaugat</td></tr>';
            }
            ?>
            <tr class="table-bottom">
                <td colspan="4">Total:</td>
                <td>RON<?php echo $grand_total; ?></td>
                <td><a href="indexRO.php?delete_all" onclick="return confirm('Elimini toate produsele din cos?');" class="delete-btn <?php echo ($grand_total > 1)?'':'disabled'; ?>">Goleste cosul</a></td>
            </tr>
            </tbody>
        </table>

        <div class="cart-btn">
            <a href="CheckoutRO.php" class="btn <?php echo ($grand_total > 1)?'':'disabled'; ?>">Finalizeaza comanda</a>
        </div>
    </div>
</div>

</body>
</html>
