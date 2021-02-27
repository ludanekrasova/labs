<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Оценки</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<style>
body {
  padding-top: 50px;
}
.starter-template {
  padding: 40px 15px;
  text-align: center;
}

.table th {
   text-align: center;
}

</style>

</head>
<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Оценки</a>
    </div>
    <div id="navbar" class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Главная</a></li>
        <li><a href="#about">О проекте</a></li>
        <li><a href="#contact">Контакты</a></li>
      </ul>
    </div><!--/.nav-collapse -->
  </div>
</nav>

<div class="container">

    <div class="starter-template">
    <h1>Оценки</h1>

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

$sql='

SELECT name, surname, subject, grade, date, faculty from people
    JOIN grades on grades.person_id = people.id
    JOIN subjects on grades.subject_id = subjects.id
    JOIN faculties on grades.faculty_id = faculties.id
';

//$sql = 'select * from people';

$result = pg_query($db, $sql);


function caption($key) {
    $keys = array('name'=>'Имя','surname'=>'Фамилия','subject'=>'Предмет',
        'grade'=>'Оценка','date'=>'Дата', 'faculty'=>'Факультет');
    return isset($keys[$key]) ? $keys[$key] : $key;
}

echo "<table class='table table-hover table-striped'>\n";

$fields = pg_num_fields($result);
for ($i = 0; $i < $fields; $i++) {
    $field = caption(pg_field_name($result, $i));
    echo "\t\t<th>$field</th>\n";
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
    </div>
</div><!-- /.container -->
</body>
</html>
