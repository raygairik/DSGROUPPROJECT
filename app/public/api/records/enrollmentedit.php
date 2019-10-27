<?php


// Step 1: Get a datase connection from our help class
$db = DbConnection::getConnection();
// Step 2: Create & run the query
$stmt = $db->prepare(
  'UPDATE CertDetail
    set certificationID = ?, memberID = ?,certificationIsActive = ?, certificationStartDate = ?, certificationEndDate = ?
    where enrollmentID = ?');
$stmt->execute([
  $_POST['certificationID'],
  $_POST['memberID'],
  $_POST['certificationIsActive'],
  $_POST['certificationStartDate'],
  $_POST['certificationEndDate'],
  $_POST['enrollmentID']
]);

$eid=$_POST['enrollmentID'];
// Step 4: Output
header('HTTP/1.1 303 See Other');
header('Location: ../records/member.php/?eid='.$eid);
