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
        printf("Database Connected using PDO!" . "<br>");
    }
} catch (PDOException $e) {
    exit("Error: " . $e->getMessage());
}

//query start
$sql   = "UPDATE users SET `city`= :city, `phone` = :tel WHERE `id` = :id";
$query = $dbh->prepare($sql);
$query->bindParam(':city', $city, PDO::PARAM_STR);
$query->bindParam(':tel', $tel, PDO::PARAM_INT);
$query->bindParam(':id', $id, PDO::PARAM_INT);
$tel  = '02012345678';
$city = 'London';
$id   = 10;
$query->execute();
if ($query->rowCount() > 0) {
    $count = $query->rowCount();
    echo $count . " rows were affected.";
} else {
    echo "No affected rows.";
}
