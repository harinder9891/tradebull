<?php
define('HOST', 'localhost'); // Database host name ex. localhost
define('USER', 'mastetnr_tradebull'); // Database user. ex. root ( if your on local server)
define('PASSWORD', 'TradeBull.Io@#2021'); // user password  (if password is not set for user then keep it empty )
define('DATABASE', 'mastetnr_tradebullio'); // Database Database name

function DB()
{
    try {
        $db = new PDO('mysql:host='.HOST.';dbname='.DATABASE.'', USER, PASSWORD);
        return $db;
    } catch (PDOException $e) {
        return "Error!: " . $e->getMessage();
        die();
    }
}
$conn = $DB();
print_r($conn);

?>