<?php

$data = file_get_contents("my.json");
if (!$data) {
  echo("Файл с данными не найден!");
  return;
}

$jsonData = json_decode($data, true); 

function setArray($array) {
  $listkeys=[]; // массив ключей
  
  // header: на случай если в первой строке присутствуют не все ключи перебираем все строки, делаем массив возможных ключей:
  echo "<thead><tr>";
  foreach ($array as $key => $val) {
    foreach($val as $s_key => $s_val) {
      $result=array_search($s_key, $listkeys);
      if ( $result===false) { 
        echo "<td>$s_key</td>";
        $listkeys[]=$s_key; 
      }
    }
  }
  echo "</tr></thead>";

  // data of json:
  foreach ($array as $key => $val) { // для каждой строки
    echo "<tr>";
    foreach($listkeys as $index) { // перебираем массив ключей
      echo "<td>";
      if (array_key_exists($index, $val)) { 
        parseVal("", $val[$index]);
      } else { 
        parseVal("", "");
      } 
      echo "</td>";
    }
    echo "</tr>";
  }
}

// 
function parseVal($title, $val) {
  if (is_array($val)) { 
    foreach ($val as $key => $value) {
      parseVal($key, $value);  
    }
  } else { 
    if ($title) {
      echo "$title: ";
    }
    echo "$val<br/>"; 
  }
}
?> 

<!DOCTYPE html>
<html>
<head>
	<title>ДЗ-5</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="main.css">
</head>
<body>
  <table>
  <?php
    setArray($jsonData);
  ?>
  </table>
</body>
</html>