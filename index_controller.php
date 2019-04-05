<?php

function saveAndGetResultMessage() {
  try {
    saveToDatabase();
  } catch(Exception $e) {
    return "Failed: " . $e;
  }
  
  return "<h3>Your're registered!</h3>";
}

function saveToDatabase() {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $job = $_POST['job'];
  $date = date("Y-m-d");
  $sql_insert = "INSERT INTO Registration (name, email, job, date) VALUES (?,?,?,?)";
  $stmt = $conn->prepare($sql_insert);
  $stmt->bindValue(1, $name);
  $stmt->bindValue(2, $email);
  $stmt->bindValue(3, $job);
  $stmt->bindValue(4, $date);
  $stmt->execute();
}

function getTableData() {
  try {
    return buildTableRow();
  } catch(Exception $e) {
    return "Failed: " . $e;
  }
}

function buildTableData() {
  $registrants = getFromDatabase();
  $table_html = "";
  if(count($registrants) > 0) {
    $table_html .= build_table($registrants);
  } else {
    $table_html .= "<h3>No one is currently registered.</h3>";
  }

  return $table_html;
}

function getFromDatabase() {
  $sql_select = "SELECT * FROM Registration";
  $stmt = $conn->query($sql_select);
  $registrants = $stmt->fetchAll();
  return $registrants;
}

function build_table($registrants) {
  $table_html .= "<h2>People who are registered:</h2>";
  $table_html .= "<table>";
  $table_html .= "<tr><th>Name</th>";
  $table_html .= "<th>Email</th>";
  $table_html .= "<th>Job</th>";
  $table_html .= "<th>Date</th></tr>";
  $table_html .= buildTableRow($registrants);
  $table_html .= "</table>";
}

function buildTableRow($registrants) {
  $table_html = "";
  foreach($registrants as $registrant) {
    $table_html .= "<tr><td>".$registrant['name']."</td>";
    $table_html .= "<td>".$registrant['email']."</td>";
    $table_html .= "<td>".$registrant['job']."</td>";
    $table_html .= "<td>".$registrant['date']."</td></tr>";
  }
  return $table_html;
}

?>