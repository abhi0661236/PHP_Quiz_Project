<?php
    include "conn.php";
    
    

    $q = "SELECT * FROM questions WHERE id=1";

    $data = array();
        $statement1 = $con->prepare($q);
        $statement1->execute();
        if($statement1->rowCount())
        {
		   $data['success'] = true;
		   $data['data']=$statement1->fetchAll(PDO::FETCH_ASSOC);

        }

        echo json_encode($data);

    
