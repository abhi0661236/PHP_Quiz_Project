<?php
    include 'conn.php';
    $uid = $_POST['index'];
    $msg = "Deleted successfully";

    try {
        $query = "DELETE FROM `questions` WHERE `question_u_id` = '$uid'";
        $stmt = $con->prepare($query);
        $stmt->execute();
        echo $msg;
    } catch (PDOException $e) {
        echo "Error while deleting...".$e->getMessage();
    }
?>