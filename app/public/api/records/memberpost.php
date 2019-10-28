<?php

use Ramsey\Uuid\Uuid;
$mid = Uuid::uuid4()->toString();
$db = DbConnection::getConnection();

$stmt = $db->prepare(
  'INSERT INTO Member
    (memberID, firstName, lastName, dob, Gender, Email, address, City, State, ZIPCode, workPhoneNumber, mobilePhoneNumber, departmentPosition, Radio, Station, isActive)
     VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)'
);
$stmt->execute([
  $mid,
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

header('HTTP/1.1 303 See Other');
header('Location: ../records/member.php/?mid='.$mid);
