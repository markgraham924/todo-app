<?php

    $heading = $_GET["heading"];
    $content  = $_GET["content"];

    //Fetching the MySQL server credentials from the JSON file
    $credsJSON = file_get_contents("creds.json");
    $credsDecode = json_decode($credsJSON, true);
    $servername = $credsDecode["servername"];
    $username = $credsDecode["username"];
    $password = $credsDecode["password"];
    $dbname = $credsDecode["database"];

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO todoData (todoID, headingName, mainContent, statusType) VALUES (NULL, '$heading', '$content', '1')";

    if ($conn->query($sql) === TRUE) {
        echo 'hello world';
        header("Location: index.php");
    } else {
        echo 'hell world';
    }

    $conn->close();

?>