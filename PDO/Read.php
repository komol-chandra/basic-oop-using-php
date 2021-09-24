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

$sql = "SELECT * FROM users WHERE city= :city";

$query = $dbh->prepare($sql);

$query->bindParam(':city', $city, PDO::PARAM_STR);

$city = "New York";

$query->execute();

$results = $query->fetchAll(PDO::FETCH_OBJ);

if ($query->rowCount() > 0) {
    foreach ($results as $result) {
        echo $result->name . ", ";
        echo $result->city . ", ";
        echo $result->date_added . "<br>";

    }
}
