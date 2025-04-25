
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blue Lock</title>
    <link href="styles/nav,foter_style.css" rel="stylesheet">
    <link href="styles/home_style.css" rel="stylesheet">
    <link href="styles/login_style.css" rel="stylesheet">
    <link href="styles/register_style.css" rel="stylesheet">
    <link href="styles/category.css" rel="stylesheet">
    <link href="styles/product_style.css" rel="stylesheet">
    <link href="styles/product_details_style.css" rel="stylesheet">
    <link href="styles/bayment_style.css" rel="stylesheet">
    <link href="styles/chart_style.css" rel="stylesheet">
</head>
<body>


    <header>
        <a href="index.php" class="logo"><img src="imgs/224be13a-7fdf-43d3-966b-f984a033bebc.jpeg" alt="logo"></a>
        <nav class="nav-list-header">
            <ul>
                <?php
                session_start();
                if (isset($_SESSION['id']) and $_SESSION['id']==1){
                ?>
                <li>
                    <a href="catigory.php">Add</a>
                </li>
                <?php
                }
                ?>
                <li>
                    <a href="catigory.php">Leagues</a>
                </li>
                <li>
                    <a href="clubs.php">Clubs</a>
                </li>
                <li>
                    <a href="kits.php">Kits</a>
                </li>
                <?php
                if (isset($_SESSION['id'])){
                    echo "<a href='cart.php'><p>{$_SESSION['fname']}&nbsp;&nbsp;{$_SESSION['lname']}</p></a>";

                ?>
                <li>

                    <a href="logout.php">Logout</a>
                </li>
                <?php
                }else {
                ?>
                <li>
                    <a href="register.php">Register</a>
                </li>
                <li>
                    <a href="login.php">Login</a>
                </li>
               <?php } ?>
            </ul>
        </nav>

    </header>
