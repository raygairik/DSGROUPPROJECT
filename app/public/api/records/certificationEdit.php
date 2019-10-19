<?php


// Step 1: Get a datase connection from our help class
$db = DbConnection::getConnection();
// Step 2: Create & run the query
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
// Step 4: Output
header('HTTP/1.1 303 See Other');
header('Location: ../records/?cid='.$cid);
