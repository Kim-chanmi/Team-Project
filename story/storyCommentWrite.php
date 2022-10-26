<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";
    
    $myStoryID = $_POST['storyID'];   //해당 블로그의 아이디값을 가져옴
    $commentPass = $_POST['pass'];
    $myMemberID = $_POST['memberID'];
    $commentMsg = $_POST['msg'];
    $regTime = time();
    $sql = "INSERT INTO myComment(myMemberID, myStoryID, commentMsg, commentPass, commentDelete, regTime) VALUES ('$myMemberID', '$myStoryID', '$commentMsg', '$commentPass', '0','$regTime')";
    $result = $connect -> query($sql);
    echo json_encode(array("info" => $sql));
?>