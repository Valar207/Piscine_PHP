<?php
$servername = "localhost";
$dbUsername = "root";
$dbPwd = "root";
$dbName = "test";

/* CREATE CONNECTION */
$conn = mysqli_connect($servername, $dbUsername, $dbPwd);

if (!$conn)
    echo mysqli_error($conn);

/* CREATE DATABASE */

$sql = "CREATE DATABASE IF NOT EXISTS test";
$res = mysqli_query($conn, $sql);

if (!$res)
    echo mysqli_error($conn);
else
    echo "test database created successfully<br>";

$conn = mysqli_connect($servername, $dbUsername, $dbPwd, $dbName);

if (!$conn)
    echo mysqli_error($conn);

/* CREATE TABLE TYPEG */

$sql = "CREATE TABLE typeg (
    idTG INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nameTG VARCHAR(100) NOT NULL
    );";
$res = mysqli_query($conn, $sql);

if (!$res)
    echo mysqli_error($conn);
else
    echo "typeg table was created successfully<br>";

/* CREATE TABLE ARTICLES */

$sql = "CREATE TABLE articles (
    idA INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    idTG INT NOT NULL,
    FOREIGN KEY (idTG) REFERENCES typeg (idTG),
    nameA VARCHAR(100) NOT NULL,
    priceA DECIMAL(18,2) NOT NULL,
    qA INT NOT NULL,
    imgA text NOT NULL
    );";
$res = mysqli_query($conn, $sql);

if (!$res)
    echo mysqli_error($conn);
else
    echo "articles table was created successfully<br>";

/* CREATE TABLE USERS */

$sql = "CREATE TABLE users(
    idU INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nameU VARCHAR(100) NOT NULL,
    emailU VARCHAR(100) NOT NULL,
    adminU VARCHAR(100) NOT NULL,
    pwdU VARCHAR(255) NOT NULL
    );";
$res = mysqli_query($conn, $sql);

if (!$res)
    echo mysqli_error($conn);
else
    echo "users table was created successfully<br>";

/* CREATE TABLE ORDERS */

$sql = "CREATE TABLE orders(
    idO INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    idU INT NOT NULL,
    idA INT NOT NULL,
    FOREIGN KEY (idU) REFERENCES users (idU),
    FOREIGN KEY (idA) REFERENCES articles (idA),
    qO INT NOT NULL,
    dateO datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
    );";
$res = mysqli_query($conn, $sql);

if (!$res)
    echo mysqli_error($conn);
else
    echo "orders table was created successfully<br>";

/* FILL IN TYPEG */

$sql = "INSERT INTO typeg(idTG, nameTG) VALUES
(1, 'FPS'),
(2, 'Combat'),
(3, 'Action Aventure'),
(4, 'Course')";
$res = mysqli_query($conn, $sql);

if ($res)
    echo "Type game added<br>";
else
    echo mysqli_error($conn);

/* FILL IN ARTICLES */

$sql = "INSERT INTO articles(idA, idTG, nameA, priceA, qA, imgA) VALUES
(1, 3, 'GTA V', 69.99, 10, './img/GTA_V.jpeg'),
(2, 3, 'Spider-Man', 50, 10, './img/SpiderMan.jpg'),
(3, 2, 'Spider-Man', 50, 10, './img/SpiderMan.jpg'),
(4, 3, 'Horizon Zero Dawn', 39.99, 10, './img/HZD.jpeg'),
(5, 1, 'Call Of Duty MW', 29.99, 10, './img/CODMW.jpeg'),
(6, 2, 'Street Figther', 10, 10, './img/SF.jpeg'),
(7, 2, 'God Of War', 59.99, 10, './img/GOW.jpg'),
(8, 3, 'God Of War', 59.99, 10, './img/GOW.jpg'),
(9, 1, 'Battlefield 4', 25, 10, './img/BF4.jpeg'),
(10, 4, 'Mario Kart 8', 35, 10, './img/MK.jpg'),
(11, 4, 'Forza 4', 40, 10, './img/FZ4.jpg')";
$res = mysqli_query($conn, $sql);

if ($res)
    echo "Articles added";
else
    echo mysqli_error($conn);


?>