<?php
define('DB_HOST', '127.0.0.1');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'pdo_test');

class Db
{
    private $dbh;

    /**
     * make PDO connection and put  the value in $dbh
     */
    public function __construct()
    {
        try {
            $this->dbh = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME,
                DB_USER, DB_PASS,
                [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"]);
            if ($this->dbh) {
                printf("Database Connected using PDO! <br>");
            }
        } catch (PDOException $e) {
            exit("Error: " . $e->getMessage());
        }
    }

    /**
     * get the PDO connection for private $dbh for user;
     */
    public function get()
    {
        return $this->dbh;
    }

    /**
     * close the database connection when needed
     */

    public function close()
    {
        $this->dbh = null;
    }
}

class User
{
    private $table = 'users';
    private $dbConnection;

    /**
     * make database connection using dependance injection
     */
    public function __construct($dbConnection)
    {
        $this->dbConnection = $dbConnection;
    }

    /**
     * this method using for insert single data in database
     * return bool parameter
     */

    public function insert($name, $phone, $city)
    {
        $sql = "INSERT INTO `{$this->table}` (`name`,`phone`,`city`,`date_added`)VALUES (:name,:phone,:city,:created)";

        // bind the filter
        $query = $this->dbConnection->prepare($sql);

        //bind every field
        $query->bindParam(':name', $name, PDO::PARAM_STR);
        $query->bindParam(':phone', $phone, PDO::PARAM_STR);
        $query->bindParam(':city', $city, PDO::PARAM_STR);
        $now = date('Y-m-d');
        $query->bindParam(':created', $now, PDO::PARAM_STR);
        $query->execute();

        // The id of the newly created row in the table.
        $lastInsertId = $this->dbConnection->lastInsertId();
        if ($lastInsertId > 0) {
            return $lastInsertId . "Data Inserted Successfully! <br>";
        } else {
            return false;
        }

    }

    public function getUserById($id)
    {
        $sql = "SELECT * FROM `{$this->table}` WHERE `id`= :id LIMIT 1";
        // bind the filter
        $query = $this->dbConnection->prepare($sql);
        //bind every field
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);
        if ($query->rowCount() > 0) {
            // return gettype($results);
            return $results[0];
        } else {
            return false;
        }

    }
    /**
     * in this method we get all data
     */
    public function getAll()
    {
        $sql   = "SELECT * FROM `{$this->table}` WHERE 1";
        $query = $this->dbConnection->prepare($sql);
        // $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);
        if ($query->rowCount() < 1) {
            return false;
        }
        foreach ($results as $key => $value) {
            echo "#" . $key . " " . $value->name . "<br>";
        }
    }

    /**
     * in this method using to delete data using $id
     */
    public function delete($id)
    {
        $sql   = "DELETE FROM `{$this->table}` WHERE id=:id;";
        $query = $this->dbConnection->prepare($sql);
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();
        if ($query->rowCount() < 1) {
            return false;
        }
        return "Data Deleted Successfully";

    }

    public function update(int $id, array $array)
    {
        $sql     = "UPDATE `{$this->table}` SET ";
        $columns = [];
        foreach ($array as $fieldName => $value) {
            $columns[] = "`{$fieldName}` = :{$fieldName}";
        }
        $sql .= implode(',', $columns);
        $sql .= ' WHERE `id` = :id';
        $query = $this->dbConnection->prepare($sql);
        foreach ($array as $fieldName => $value) {
            // Use bindValue, not bindParam because
            // bindParam only gets its value at the time of execution.
            $query->bindValue(":{$fieldName}", $value);
        }
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();
        if ($query->rowCount() < 0) {
            return false;
        } else {
            return $id;
        }

    }
}

$db   = new Db();
$user = new User($db->get());
echo "<h1>Single Data Insert</h1>";
// var_dump($user->insert("komol", '091876876', 'feni'));
echo "<h1>Get Single Data</h1>";
var_dump($user->getUserById(14)) . "<br>";
echo "<br>";
echo "<h1>Get All</h1>";
var_dump($user->getAll());
echo "<br>";
echo "<h1>Delete Data</h1>";
// var_dump($user->delete(15));
echo "<h1>Update Data using Id</h1>";
$array = ['name' => 'komol Kirk', 'city' => 'Tarsus IV', 'date_added' => '2233-03-22'];
var_dump($user->update(14, $array));
