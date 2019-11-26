<?php
/*CREATE DB*/
$servername = "localhost";
$dBUsername = "root";
$dBPassword = "valar207";
$dBName = "commerce";

$conn = mysqli_connect($servername, $dBUsername, $dBPassword);

if(!$conn){
    die("Connection failed ". mysqli_connect_error());
}

$sql = "CREATE DATABASE IF NOT EXISTS ".$dBName;

if (mysqli_query($conn, $sql))
	echo "Database created successfully\n\n<br>";
else
	echo "Error creating database\n\n<br>";

$conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);


/*CREATE USERS*/
$sql = "CREATE TABLE IF NOT EXISTS users
(
    idUsers int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
    uidUsers TINYTEXT NOT NULL,
    emailUsers TINYTEXT NOT NULL,
    adminUsers TINYINT DEFAULT 0,
    pwdUsers LONGTEXT
)";

if (mysqli_query($conn, $sql)) {
    echo "Table users created successfully<br>";
} else {
    echo "Error creating table users\n\n<br>";
}

/*CREATE ARTICLES*/
$sql = "CREATE TABLE IF NOT EXISTS articles
(
    idArticles int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
    idType int(11) NOT NULL,
    nameArticles tinytext NOT NULL,
    priceArticles DECIMAL(18,2) NOT NULL,
    quantityArticles INT(11),
    imgArticles text NOT NULL
)";

if (mysqli_query($conn, $sql))
	echo "Table products created successfully\n\n<br>";
else
    echo "Error creating table products\n\n<br>";
    
/*CREATE TYPE*/
$sql = "CREATE TABLE IF NOT EXISTS typeGame
(
    idType int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
    nameType tinytext NOT NULL
)";

if (mysqli_query($conn, $sql))
	echo "Table type created successfully\n\n<br>";
else
    echo "Error creating table type\n\n<br>";

/*CREATE ORDERS*/
$sql = "CREATE TABLE IF NOT EXISTS orders 
(
        idOrders int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL NOT NULL,
        idUsers int(11) DEFAULT NULL,
        idArticles int(11) DEFAULT NULL,
        quantity int(11) NOT NULL,
        dateOrders datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
)";
if (mysqli_query($conn, $sql))
    echo "Table orders created successfully\n\n<br>";
else
    echo "Error creating table orders\n\n<br>";

/*ADD FOREIGN KEYS*/
$sql = "ALTER TABLE articles ADD FOREIGN KEY (idType) REFERENCES typeGame(idType) ON DELETE CASCADE;";
if (mysqli_query($conn, $sql))
    echo "Last modifications done to articles->type\n<br>";
else
    echo mysqli_error($conn);

$sql = "ALTER TABLE orders ADD FOREIGN KEY (idUsers) REFERENCES users(idUsers) ON DELETE CASCADE;";
if (mysqli_query($conn, $sql))
    echo "Last modifications done to users->orders\n<br>";
else
    echo mysqli_error($conn);

$sql = "ALTER TABLE orders ADD FOREIGN KEY (idArticles) REFERENCES articles(idArticles) ON DELETE CASCADE;";
if (mysqli_query($conn, $sql))
    echo "Last modifications done to articles->orders\n<br>";
else
    echo mysqli_error($conn);

/*INSERT ARTICLES*/

$sql = "INSERT INTO typeGame(idType,nameType) VALUES
(1, 'FPS'),
(2, 'Combat'),
(3, 'Action Aventure');";

if (mysqli_query($conn, $sql))
    echo "Data typeGame created successfully<br>";
else
    echo "Error inserting type of game\n\n<br>";

$sql = "INSERT INTO articles(idArticles, idType, nameArticles, priceArticles, quantityArticles, imgArticles) VALUES
(1, 3, 'GTA V', 69.99, 10, '/Users/vrossi/Documents/MAMP/apache2/htdocs/rush00/img/GTA_V.jpeg'),
(2, 1, 'Call of Duty', 40, 10, '/Users/vrossi/Documents/MAMP/apache2/htdocs/rush00/img/CODMW.jpeg'),
(3, 2, 'Mortal Kombat X', 39.99, 10, '/Users/vrossi/Documents/MAMP/apache2/htdocs/rush00/img/MKX.jpeg');";

if (mysqli_query($conn, $sql))
    echo "Data articles created successfully<br>";
else
    echo "Error inserting articles\n\n<br>";

