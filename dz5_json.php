<?php
$data = file_get_contents("my.json");
if (!$data) {
  echo("Файл с данными не найден!");
  return;
}

$jsonData = json_decode($data, true); 

function setArray($array) {

    foreach ($array as $key => $val) {
      $rows=count($val) + 1;
      echo "<tr><td rowspan={$rows} class='maincol'>{$key}</td>";
      foreach ($val as $sub_key => $sub_val) {
        echo "<tr><td>$sub_key</td>";
      	if (count($sub_val) > 1) {
          echo "<td>".implode($sub_val,", ")."</td></tr>"; 
        } else {
          echo "<td>$sub_val</td></tr>"; 
        }
      }
      echo "</tr>";	
    }
}

?> 
<!DOCTYPE html>
<html>
<head>
	<title>ДЗ-5</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="./main.css">
</head>
<body>
  <?php
    echo "<table>";
    echo "<thead><tr><td>Номер</td><td>Ключ</td><td>Значение</td></tr></thead>";
    setArray($jsonData);
    echo "</table>";
  ?>
</body>
</html>