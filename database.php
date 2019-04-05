<?php
    $host = "dicodingazuresubmission.database.windows.net";
    $user = "golok";
    $pass = "AkuLucuBlog56";
    $db = "submisi1";

    try {
        $conn = new PDO("sqlsrv:server = $host; Database = $db", $user, $pass);
        $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    } catch(Exception $e) {
        echo "Failed: " . $e;
    }
 ?>