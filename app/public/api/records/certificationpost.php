<?php

// Step 0: Validation
use Ramsey\Uuid\Uuid;
$cid = Uuid::uuid4()->toString(); // i.e. 25769c6c-d34d-4bfe-ba98-e0ee856f3e7a

// Step 1: Get a datase connection from our help class
$db = DbConnection::getConnection();
// Step 2: Create & run the query
$stmt = $db->prepare(
  'INSERT INTO Certification
    (certificationID, certifyingagency, certificationName, expirationPeriod)
  VALUES (?, ?, ?, ?, ?)'
);
$stmt->execute([
  $cid,
  $_POST['certificationID'],
  $_POST['certifyingAgency'],
  $_POST['certificationName'],
  $_POST['expirationPeriod']
]);
// Step 4: Output
header('HTTP/1.1 303 See Other');
header('Location: ../records/?cid='.$cid);
