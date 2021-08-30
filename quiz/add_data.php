<?php
    include 'conn.php';

    
    
    
    
try {
    $rndm_no=rand(0,100);
    $id = date('ymdhis').$rndm_no;
    $ques_data = json_encode($_POST);
    $date = date('Y-m-d h:i:s');
    // prepare sql and bind parameters
  $stmt = $con->prepare("INSERT INTO questions (question_u_id, ques_data, added_on)
  VALUES (:questionID, :ques_data, :added_on)");
  $stmt->bindParam(':questionID', $id);
  $stmt->bindParam(':ques_data', $ques_data);
  $stmt->bindParam(':added_on', $date);

    
    $stmt->execute();
    echo "new record added successfully";
    

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
