<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Graph</title>
</head>
<body>

<?php
include 'ConnectDb.php';

if ($db) {
  $dataPath = array();

  foreach(($db->query("SELECT s.text parent, s2.text node FROM path INNER JOIN subject s ON s.subject_id = path.parent_id LEFT JOIN subject s2 ON s2.subject_id = path.node_id")) as $row) {
    $dataPath[] = [$row['parent'], $row['node']];
    $dataJson = json_encode($dataPath);
  }
  echo "<script>let data = $dataJson</script>";

} else {
  echo 'Ошибка с подключением к БД';
}

?>

<div style="text-align: center; margin-bottom: 50px;">
  <h1>Highcharts Network Graph from MySQL</h1>
  <p>In this example database looks like:</p>
  <img src="/assets/img/database.png" alt="Database example">
</div>
<div id="container"></div>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/networkgraph.js"></script>
<script src="/assets/js/graph.js"></script>
</body>
</html>