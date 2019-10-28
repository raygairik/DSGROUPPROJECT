<?php

$db = DbConnection::getConnection();

$stmt = $db->prepare(
  'DELETE FROM Certification
    WHERE certificationID = ?'
);
$stmt->execute([
  $_POST['certificationID']
]);

$cid=$_POST['certificationID'];

header('HTTP/1.1 303 See Other');
header('Location: ../records/certification.php/?cid='.$cid);
