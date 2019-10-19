<?php

// Step 1: Get a datase connection from our help class
$db = DbConnection::getConnection();

// Step 2: Create & run the query
if (isset($_GET['id'])) {
   $stmt = $db->prepare(
    'SELECT * FROM Member
     WHERE memberID = ?'
   );

   $stmt->execute([$_GET['id']]);
 } else {
  $stmt = $db->prepare('SELECT * FROM Member');
  $stmt->execute();
}

$members = $stmt->fetchAll();

// Step 3: Convert to JSON
$json = json_encode($members, JSON_PRETTY_PRINT);

// Step 4: Output
header('Content-Type: application/json');
echo $json;
