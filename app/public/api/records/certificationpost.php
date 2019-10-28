<?php

use Ramsey\Uuid\Uuid;
$cid = Uuid::uuid4()->toString();

$db = DbConnection::getConnection();

$stmt = $db->prepare(
  'INSERT INTO Certification
    (certificationID, certifyingagency, certificationName, expirationPeriod)
  VALUES (?, ?, ?, ?)'
);
$stmt->execute([
  $cid,
  $_POST['certifyingAgency'],
  $_POST['certificationName'],
  $_POST['expirationPeriod']
]);

header('HTTP/1.1 303 See Other');
header('Location: ../records/certification.php/?cid='.$cid);
