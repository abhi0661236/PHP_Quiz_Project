<?php

    include 'conn.php';

    try {
        
        $q = "SELECT * FROM questions";

        $data;
        $statement1 = $con->prepare($q);
        $statement1->execute();
        if($statement1->rowCount())
        {
		   $data=$statement1->fetchAll(PDO::FETCH_ASSOC);

        }

        echo json_encode($data);


        
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

?>