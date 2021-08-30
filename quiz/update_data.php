<?php
    include 'conn.php';
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $updated_ques_data = $_POST;
    $uid = $updated_ques_data['u_id_question'];
    $data = $updated_ques_data['ques_data_updated'];
    // $temp = json_decode($data);
    $encoded = json_encode($data);
    
    

    

    try {
        $query = "UPDATE `questions` SET `ques_data` = '$encoded' WHERE `question_u_id` = $uid";
        
        $stmt = $con->prepare($query);
        $stmt->execute();
        print_r("Successfully updated !");
        // $stmt->execute();
        // echo "successfully updated";
        

    //     // prepare sql and bind parameters
    //     $query = "UPDATE `questions` SET `ques_data` WHERE question_u_id = ";
    //   $stmt = $con->prepare($query)
    //   VALUES (:ques_data)");
    //   $stmt->bindParam(':questionID', $id);
    //   $stmt->bindParam(':ques_data', $ques_data);
    //   $stmt->bindParam(':added_on', $date);
    
        
    //     $stmt->execute();
    //     echo "new record added successfully";
        
    
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }


?>