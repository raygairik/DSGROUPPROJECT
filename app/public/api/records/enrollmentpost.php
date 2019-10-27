<?php

// Step 0: Validation
use Ramsey\Uuid\Uuid;
$eid = Uuid::uuid4()->toString(); // i.e. 25769c6c-d34d-4bfe-ba98-e0ee856f3e7a

// Step 1: Get a datase connection from our help class
$db = DbConnection::getConnection();
// Step 2: Create & run the query
$stmt = $db->prepare(
  'INSERT INTO CertDetail
    (enrollmentID, certificationID, memberID, certificationIsActive, certificationStartDate, certificationEndDate)
  VALUES (?, ?, ?, ?, ?, ?)'
);
$stmt->execute([
  $eid,
  //$_POST['certificationID'],
  $_POST['certificationID'],
  $_POST['memberID'],
  $_POST['certificationIsActive'],
  $_POST['certificationStartDate'],
  $_POST['certificationEndDate']
]);
// Step 4: Output
header('HTTP/1.1 303 See Other');
header('Location: ../records/enrollment.php/?eid='.$eid);
