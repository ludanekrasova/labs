<html>
<meta charset=utf-8/>

<h1>Grades</h1>

<?php

$mysqli = new mysqli("localhost", "root", "", "test");
$sql="SELECT * from people, subjects, grades WHERE grades.person_id=people.uid and grades.subject_id=subjects.uid";

$mysqli->set_charset("utf8");
$mysqli->real_query($sql);
$res = $mysqli->use_result();

while ($row = $res->fetch_assoc()) {
    printf("%s %s %s %s<br>\n", $row['name'], $row['surname'], $row['subject'], $row['grade']);
}
?>
