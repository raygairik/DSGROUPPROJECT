<?php

$db = DbConnection::getConnection();

$stmt = $db->prepare(
  'DELETE FROM CertDetail
    WHERE enrollmentID = ?'
);
$stmt->execute([
  $_POST['enrollmentID']
]);

$mid=$_POST['enrollmentID'];

header('HTTP/1.1 303 See Other');
header('Location: ../records/enrollment.php/?eid='.$eid);
