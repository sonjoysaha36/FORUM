<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include './partials/_db.php';
    $comment_id = $_POST['comment_id'];
    $post_id = $_POST['post_id'];
    $user_id = $_POST['user_id'];

    $sql= "SELECT * FROM comment_ratings WHERE comment_id = $comment_id";

    $result= mysqli_query($conn,$sql);

    $flag= false;

    while($row = mysqli_fetch_assoc($result)){
            if($row['user_id'] == $user_id){
                $flag= true;
                break;
            }
    }

    if(!$flag){
        $insert_query="INSERT INTO comment_ratings(post_id, comment_id,user_id, ratings_count)  VALUES($post_id,$comment_id,$user_id,1)";
        $result= mysqli_query($conn,$insert_query);


        $select_query= "SELECT count(*) as ratings_count from comment_ratings where comment_id= $comment_id";

        $execute= mysqli_query($conn,$select_query);

        $ratings_count=0;
        while($row = mysqli_fetch_array($execute)) {
            $ratings_count= $row['ratings_count'];
        }  

        header('Content-Type: application/json');
        echo json_encode(array('ratings_count' => $ratings_count,'success'=> true));
        exit;
        
    }else{
        header('Content-Type: application/json');
        echo json_encode(array('success' => false));
        exit;
    }

} 
?>