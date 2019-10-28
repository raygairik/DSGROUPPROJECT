<?php

use Ramsey\Uuid\Uuid;
$eid = Uuid::uuid4()->toString();

$db = DbConnection::getConnection();

$stmt = $db->prepare(
  'INSERT INTO CertDetail
    (enrollmentID, certificationID, memberID, certificationIsActive, certificationStartDate, certificationEndDate)
     VALUES (?, ?, ?, ?, ?, ?)'
);
$stmt->execute([
  $eid,
  $_POST['certificationID'],
  $_POST['memberID'],
  $_POST['certificationIsActive'],
  $_POST['certificationStartDate'],
  $_POST['certificationEndDate']
]);

header('HTTP/1.1 303 See Other');
header('Location: ../records/enrollment.php/?eid='.$eid);
