<?php

$db = DbConnection::getConnection();

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

header('HTTP/1.1 303 See Other');
header('Location: ../records/enrollment.php/?eid='.$eid);
