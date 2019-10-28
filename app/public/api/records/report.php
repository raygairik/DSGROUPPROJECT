<?php

$db = DbConnection::getConnection();

$stmt = $db->prepare('SELECT m.firstName, m.lastName,m.dob,m.Gender, c.certificationName,c.certificationID,c.certifyingAgency, mc.certificationIsActive,mc.certificationStartDate,mc.certificationEndDate
FROM CertDetail mc , Member m, Certification c
WHERE mc.certificationID = c.certificationID
AND mc.memberID= m.memberID
and mc.certificationIsActive=0');
$stmt->execute();

$patients = $stmt->fetchAll();

$json = json_encode($patients, JSON_PRETTY_PRINT);

header('Content-Type: application/json');
echo $json;
