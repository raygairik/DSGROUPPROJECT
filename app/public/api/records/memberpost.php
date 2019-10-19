<?php

// Step 0: Validation
use Ramsey\Uuid\Uuid;
$mid = Uuid::uuid4()->toString(); // i.e. 25769c6c-d34d-4bfe-ba98-e0ee856f3e7a

// Step 1: Get a datase connection from our help class
$db = DbConnection::getConnection();
// Step 2: Create & run the query
$stmt = $db->prepare(
  'INSERT INTO Member
    (memberID, firstName, lastName, dob, Gender, Email, address, City, State, ZIPCode, workPhoneNumber, mobilePhoneNumber, departmentPosition, Radio, Station, isActive)
  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)'
);
$stmt->execute([
  $mid,
  // $_POST['memberID'],
  $_POST['firstName'],
  $_POST['lastName'],
  $_POST['dob'],
  $_POST['Gender'],
  $_POST['Email'],
  $_POST['address'],
  $_POST['City'],
  $_POST['State'],
  $_POST['ZIPCode'],
  $_POST['workPhoneNumber'],
  $_POST['mobilePhoneNumber'],
  $_POST['departmentPosition'],
  $_POST['Radio'],
  $_POST['Station'],
  $_POST['isActive']
]);

// Step 4: Output
header('HTTP/1.1 303 See Other');
header('Location: ../records/member.php/?mid='.$mid);
