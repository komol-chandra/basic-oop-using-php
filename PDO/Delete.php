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

//sql start

$sql = "DELETE FROM `users` where `id`=:id";

$query = $dbh->prepare($sql);

$query->bindParam(':id', $id, PDO::PARAM_INT);

$id = 12;

$query->execute();

if ($query->rowCount() > 0) {
    echo $query->rowCount() . "data deleted";

} else {
    echo "error to delete data";
}
