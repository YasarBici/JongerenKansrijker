<?php 

require_once 'database.php';

$db = new database();
$sql = "INSERT INTO medewerker VALUES (:id, :username, :password)";

$placeholders = [
    // id is auto_increment en wordt gegegeneerd.
    'id'=> NULL,
    'username'=> 'Yasar',
    'password'=> password_hash('admin', PASSWORD_DEFAULT)
];

$db->insert($sql, $placeholders);


?>