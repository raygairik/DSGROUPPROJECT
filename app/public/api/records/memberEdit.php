<?php


// Step 1: Get a datase connection from our help class
$db = DbConnection::getConnection();
// Step 2: Create & run the query
$stmt = $db->prepare(
  'UPDATE Member
     -- set certifyingAgency = ?, certificationName = ?, expirationPeriod = ? where certificationID = ?
    set firstName = ?, lastName = ?, dob = ?, Gender = ?, Email = ?, address = ?, City = ?, State = ?, ZIPCode = ?, workPhoneNumber = ?, mobilePhoneNumber = ? , departmentPosition = ?, Radio = ?, Station = ?, isActive = ?');
$stmt->execute([
  // $_POST['certifyingAgency'],
  // $_POST['certificationName'],
  // $_POST['expirationPeriod'],
  // $_POST['certificationID']
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

$mid=$_POST['memberID'];
// Step 4: Output
header('HTTP/1.1 303 See Other');
header('Location: ../records/?mid='.$mid);
