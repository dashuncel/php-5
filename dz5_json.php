<?php
$data = file_get_contents("my.json");
if (!$data) {
  echo("Файл с данными не найден!");
  return;
}

$jsonData = json_decode($data, true); 

function setArray($array) {
  // header: 
  echo "<thead><tr>";
  foreach ($array[0] as $key => $val) {
    echo "<th>".$key."</th>";
  }
  echo "</tr></thead>";

  // data of json:
  foreach ($array as $key => $val) {
    echo "<tr>";
    foreach($val as $sub_key => $sub_val) {
      echo "<td>";
      parseVal("", $sub_val);
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