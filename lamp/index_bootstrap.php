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

.table td {
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

$mysqli = new mysqli("localhost", "root", "", "test");
$sql="SELECT name, surname, subject, grade from people join grades on grades.person_id=people.uid join subjects on grades.subject_id=subjects.uid";

$mysqli->set_charset("utf8");
$mysqli->real_query($sql);
$result = $mysqli->use_result();


function caption($key) {
    $keys = array("name"=>"Имя","surname"=>"Фамилия","subject"=>"Предмет","grade"=>"Оценка",'date'=>'Дата');
    return isset($keys[$key]) ? $keys[$key] : $key;
}

$fields = array();

echo "<table class='table table-striped table-hover'>\n";
echo "<tr>\n";
while ($key = mysqli_fetch_field($result)) {
    array_push($fields, $key->name);
    echo '<td>' . caption($key->name). '</td>'."\n";
}

echo "</tr>\n";

while ($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    foreach ($fields as $key) {
        echo '<td>' . $row[$key] . '</td>';
    }
    echo '</tr>';
}

echo "</table>";

?>
    </div>
</div><!-- /.container -->
</body>
</html>
