<html>
<meta charset=utf-8/>

<h1>Grades</h1>

<?php

$mysqli = new mysqli("localhost", "root", "", "test");
$sql="SELECT * from people, subjects, grades WHERE grades.person_id=people.uid and grades.subject_id=subjects.uid";

$mysqli->set_charset("utf8");
$mysqli->real_query($sql);
$res = $mysqli->use_result();

print("<table border=1>");
while ($row = $res->fetch_assoc()) {
    printf("<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>\n",
           $row['name'], $row['surname'], $row['subject'], $row['grade']);
}
print("</table>");

?>
    
