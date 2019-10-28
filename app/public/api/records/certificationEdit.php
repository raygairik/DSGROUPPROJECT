<?php

$db = DbConnection::getConnection();

$stmt = $db->prepare(
  'UPDATE Certification
    set certifyingAgency = ?, certificationName = ?, expirationPeriod = ? where certificationID = ?');

$stmt->execute([
  $_POST['certifyingAgency'],
  $_POST['certificationName'],
  $_POST['expirationPeriod'],
  $_POST['certificationID']
]);

$cid=$_POST['certificationID'];

header('HTTP/1.1 303 See Other');
header('Location: ../records/certification.php/?cid='.$cid);
