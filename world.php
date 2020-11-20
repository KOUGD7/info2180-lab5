<?php

header("Access-Control-Allow-Origin: *");

$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$country = $_GET['country'];
$country = htmlentities($country);

$context = $_GET['context'];
$context = htmlentities($context);


if ($context == 'cities'){
  $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
  
  $stmt = $conn->query("SELECT * FROM cities WHERE country_code in (SELECT distinct(code) FROM countries WHERE name LIKE '%$country%')");

  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

else{
  $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
  
  $stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");
  
  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
} ?>

<?php
if($context=="cities") {?>
  <table id = "citytab">
    <tr>
      <th>Name</th>
      <th>District</th>
      <th>Population</th>
    </tr>

    <?php foreach ($results as $row): ?>
      <tr>
        <td><?= $row['name']; ?></td>
        <td><?= $row['district']; ?></td>
        <td><?= $row['population']; ?></td>
      </tr>
    <?php endforeach; ?>
  </table>

<?php
}
else { ?>

  <table id = "countrytab">
    <tr>
      <th>Name</th>
      <th>Continent</th>
      <th>Independence</th>
      <th>Head of State</th>
    </tr>

    <?php foreach ($results as $row): ?>
      <tr>
        <td><?= $row['name']; ?></td>
        <td><?= $row['continent']; ?></td>
        <td><?= $row['independence_year']; ?></td>
        <td><?= $row['head_of_state']; ?></td>
      </tr>
    <?php endforeach; ?>
  </table>

<?php        
    } ?>