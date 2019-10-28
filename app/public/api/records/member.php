<?php

$db = DbConnection::getConnection();

  $stmt = $db->prepare('SELECT * FROM Member');
  $stmt->execute();

$members = $stmt->fetchAll();

$json = json_encode($members, JSON_PRETTY_PRINT);

header('Content-Type: application/json');
echo $json;
