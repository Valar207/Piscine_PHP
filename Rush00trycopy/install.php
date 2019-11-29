<?php
    $servername = "localhost";
    $dBUsername = "root";
    $dBPassword = "rootroot";
    $dbName = "JEUX";

    $conn = mysqli_connect($servername, $dBUsername, $dBPassword);
    
    if (!$conn)
        die("Connection failed: ".mysqli_connect_error());

    $sql = "CREATE DATABASE IF NOT EXISTS JEUX";
    $result = mysqli_query($conn, $sql);
    if ($result)
        echo "Created database\n<br>";
    else
        echo mysqli_error($conn);

    $conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dbName);

    $sql1 = "CREATE TABLE users (
            idUsers int (11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
            uidUsers TINYTEXT NOT NULL, 
            emailUsers TINYTEXT NOT NULL,
            adminUsers TINYINT DEFAULT 0,
            pwdUsers LONGTEXT NOT NULL
            );";
    $result1 = mysqli_query($conn, $sql1);
    if ($result1)
        echo "Created users table\n<br>";
    else
        echo mysqli_error($conn);
            
    $sql2 = "CREATE TABLE articles (
            idArticles int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
            nameArticles tinytext NOT NULL,
            priceArticles DECIMAL(18, 2) NOT NULL,
            imgArticles text NOT NULL
            );";
    $result2 = mysqli_query($conn, $sql2);
    if ($result2)
        echo "Created articles table\n<br>";
    else
        echo mysqli_error($conn);
    
    $sql3 = "CREATE TABLE categories (
            idCategories int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
            nameCategories tinytext NOT NULL
            );";
    $result3 = mysqli_query($conn, $sql3);
    if ($result3)
        echo "Created categories table<br>";
    else
        echo mysqli_error($conn);

    $sql4 = "CREATE TABLE articlescategories (
            idAc int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
            idArticles int(11) NOT NULL,
            idCategories int(11) NOT NULL
            );";
    $result4 = mysqli_query($conn, $sql4);
    if ($result4)
        echo "Created articlescategories table\n<br>";
    else
        echo mysqli_error($conn);

    $sql5 = "CREATE TABLE orders (
            idOrders int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL NOT NULL,
            idUsers int(11) DEFAULT NULL,
            idArticles int(11) DEFAULT NULL,
            quantityArticles int(11) NOT NULL,
            dateOrders datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
            );";
    $result5 = mysqli_query($conn, $sql5);
    if ($result5)
        echo "Created orders table\n<br>";
    else
        echo mysqli_error($conn);
            
    $sql6 = "ALTER TABLE articlescategories ADD FOREIGN KEY (idArticles) REFERENCES articles(idArticles) ON DELETE CASCADE;";
    $result6 = mysqli_query($conn, $sql6);
    if ($result6)
        echo "Last modifications done 1\n<br>";
    else
        echo mysqli_error($conn);

    $sql7 = "ALTER TABLE articlescategories ADD FOREIGN KEY (idCategories) REFERENCES categories(idCategories) ON DELETE CASCADE;";
    $result7 = mysqli_query($conn, $sql7);
    if ($result7)
        echo "Last modifications done 2\n<br>";
    else
        echo mysqli_error($conn);

    $sql8 = "ALTER TABLE orders ADD FOREIGN KEY (idUsers) REFERENCES users(idUsers) ON DELETE CASCADE;";
    $result8 = mysqli_query($conn, $sql8);
    if ($result8)
        echo "Last modifications done 3\n<br>";
    else
        echo mysqli_error($conn);

    $sql9 = "ALTER TABLE orders ADD FOREIGN KEY (idArticles) REFERENCES articles(idArticles) ON DELETE CASCADE;";
    $result9= mysqli_query($conn, $sql9);
    if ($result9)
        echo "Last modifications done 4\n<br>";
    else
        echo mysqli_error($conn);

    $sql10 = "INSERT INTO `articles` (`idArticles`, `nameArticles`, `priceArticles`, `imgArticles`) VALUES
    (1, 'GTA V', 69.99, './img/GTA_V.jpeg'),
    (2, 'Spider-Man', 50, './img/SpiderMan.jpg'),
    (3, 'Horizon Zero Dawn', 39.99, './img/HZD.jpeg'),
    (4, 'Call Of Duty MW', 29.99, './img/CODMW.jpeg'),
    (5, 'Street Figther', 10, './img/SF.jpeg'),
    (6, 'God Of War', 59.99, './img/GOW.jpg'),
    (7, 'Battlefield 4', 25, './img/BF4.jpeg'),
    (8, 'Mario Kart 8', 35, './img/MK.jpg'),
    (9, 'Forza 4', 40, './img/FZ4.jpg')";
    $result10= mysqli_query($conn, $sql10);
    if ($result10)
        echo "Added some articles<br>";
    else
        echo mysqli_error($conn);

    $sql11 = "INSERT INTO `categories` (`idCategories`, `nameCategories`) VALUES
    (1, 'FPS'),
    (2, 'Combat'),
    (3, 'Action Aventure'),
    (4, 'Course')";
    $result11= mysqli_query($conn, $sql11);
    if ($result11)
        echo "Added some categories\n<br>";
    else
        echo mysqli_error($conn);

    $sql12 = "INSERT INTO `articlescategories` (`idAc`, `idArticles`, `idCategories`) VALUES
    (1, 1, 3),
    (2, 2, 3),
    (3, 2, 2),
    (4, 3, 3),
    (5, 4, 1),
    (6, 5, 2),
    (7, 6, 2),
    (8, 6, 3),
    (9, 7, 1),
    (10, 8, 4),
    (11, 9, 4);";
    $result12= mysqli_query($conn, $sql12);
    if ($result12)
        echo "Added the link between categories and articles\n<br>";
    else
        echo mysqli_error($conn);

    $sql13 = "INSERT INTO `users` (`idUsers`, `uidUsers`, `emailUsers`, `adminUsers`, `pwdUsers`) VALUES
    (1, 'admin', 'admin@gmail.com', 1, '$2y$10$9pnHvoeVTLa1N2Bd27.F6.A377ONymB4G8.Zu/Y/TSkwJ0kQlYnIG');";
    $result13= mysqli_query($conn, $sql13);
    if ($result13)
        echo "Added one admin user\n<br>";
    else
        echo mysqli_error($conn);

?>