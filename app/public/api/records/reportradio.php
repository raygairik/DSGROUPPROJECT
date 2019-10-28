<?php

$db = DbConnection::getConnection();

$stmt = $db->prepare('SELECT firstName,lastName,Radio,dob,Station,Email,Gender
FROM Member');
$stmt->execute();

$patients = $stmt->fetchAll();

$json = json_encode($patients, JSON_PRETTY_PRINT);

header('Content-Type: application/json');
echo $json;
