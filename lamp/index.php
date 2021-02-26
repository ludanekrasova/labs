<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<h1>Оценки</h1>
</head>
<body>

<?php

ini_set ("display_errors", "1");
error_reporting(E_ALL);

$host        = "host=127.0.0.1";
$port        = "port=5432";
$dbname      = "dbname=postgres";
$credentials = "user=postgres password=postgres";

$db = pg_connect( "$host $port $dbname $credentials"  ) or die('Could not connect');;
if(!$db){
   echo "Error : Unable to open database\n";
}


$sql='select name,surname,subject,grade from people join grades on grades.person_id=id join subjects on grades.subject_id=subjects.id;';

$result = pg_query($db, $sql);


function caption($key) {
    $keys = array("name"=>"Имя","surname"=>"Фамилия","subject"=>"Предмет","grade"=>"Оценка",'date'=>'Дата');
    return isset($keys[$key]) ? $keys[$key] : $key;
}

echo "<table border=1>\n";

$fields = pg_num_fields($result);
for ($i = 0; $i < $fields; $i++) {
    $field = caption(pg_field_name($result, $i));
    echo "\t\t<td>$field</td>\n";
}


while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
    echo "\t<tr>\n";
    foreach ($line as $col_value) {
        echo "\t\t<td>$col_value</td>\n";
    }
    echo "\t</tr>\n";
}

echo "</table>\n";


?>
</body>
</html>
