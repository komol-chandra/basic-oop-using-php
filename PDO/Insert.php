<?php
define('DB_HOST', '127.0.0.1');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'komol');

// database connection using PDO

try {
    $dbh = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME,
        DB_USER, DB_PASS,
        [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"]);
    if ($dbh) {
        printf("Database Connected using PDO!" . PHP_EOL);
    }
} catch (PDOException $e) {
    exit("Error: " . $e->getMessage());
}

// database connection using mysqli

// $mysql = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
// if ($mysql->connect_errno) {
//     printf('Connection Failed' . PHP_EOL, $mysql->connect_error);
//     exit();
// }
// printf("Database Connected using mysqli !");

// insert data using PDO

$sql = "INSERT INTO `users`(`name`,`phone`,`city`,`date_added`)VALUES (:name,:phone,:city,:date)";

$query = $dbh->prepare($sql);

$query->bindParam(':name', $name, PDO::PARAM_STR);
$query->bindParam(':phone', $phone, PDO::PARAM_INT);
$query->bindParam(':city', $city, PDO::PARAM_STR);
$query->bindParam(':date', $date, PDO::PARAM_STR);

$name  = "Joe";
$phone = "1234567890";
$city  = "New York";
$date  = date('Y-m-d');

$query->execute();
$lastInsertId = $dbh->lastInsertId();
if ($lastInsertId > 0) {echo "OK";} else {echo "not OK";}
// insert data using foreach
$userData = [
    ["Joe", "1231234567", "New York", $date],
    ["Joseph", "037234561", "Tel Aviv", $date],
];

foreach ($userData as $key => $value) {
    $name  = $value[0];
    $phone = $value[1];
    $city  = $value[2];
    $date  = $value[3];
    $query->execute();
    $lastInsertId = $dbh->lastInsertId();
    if ($lastInsertId > 0) {echo "array OK";} else {echo "not OK";}
}
