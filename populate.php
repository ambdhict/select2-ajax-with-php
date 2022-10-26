<?php
    require_once "../_connection/connection.php";

    if(!isset($_GET['term'])){
        $stmt = $pdo->prepare("SELECT * FROM yourTable ORDER BY id desc");
        $stmt->execute();
        $courseList = $stmt->fetchAll();
    } else{
        $searchinput = $_GET['term'];
        $search = '%' . $searchinput . '%';

        $stmt = $pdo->prepare("SELECT * FROM yourTable WHERE `search` like :search ORDER BY id desc");
        $stmt->bindValue(':search', $search, PDO::PARAM_STR);

        $stmt->execute();
        $courseList = $stmt->fetchAll();
    }

    $response = array();
    foreach($courseList as $course){
        $response[] = array(
            "id" => $course['field'],
            "text" => $course['field']
        );
    }

    echo json_encode($response);
    exit();
?>