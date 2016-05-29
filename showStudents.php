<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    
    include 'connection.php';
    showStudent();
}

function showStudent(){
    global $connect;
    
    $query="select * from b;";
    $result=mysqli_query($connect,$query);
    $numberOfRows=mysqli_num_rows($result);
    $tempArray= array();
    if($numberOfRows>0){
        while($row= mysqli_fetch_assoc($result)){
            $tempArray[]=$row;
        }
    }
    header('content-Type: application/json');
    echo json_encode(array("students"=>$tempArray));
    mysqli_close($connect);
}

?>