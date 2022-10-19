<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";

    $myBoardID = $_GET['myBoardID'];
    $myMemberID = $_SESSION['myMemberID'];

    $myBoardID = $connect -> real_escape_string($myBoardID);
    $myMemberID = $connect -> real_escape_string($myMemberID);


    $sql = "SELECT myBoardID, myMemberID FROM myBoard WHERE myMemberID = {$myMemberID} && myBoardID = {$myBoardID}";
    $result = $connect -> query($sql);

    $memberInfo = $result -> fetch_array(MYSQLI_ASSOC);

    echo $myMemberID;
    echo $memberInfo['myBoardID'];
    echo $myBoardID;
    echo $memberInfo['myMemberID'];
    if($memberInfo['myBoardID'] === $myBoardID && $memberInfo['myMemberID'] === $myMemberID){
        $sql = "DELETE FROM myBoard WHERE myBoardID = {$myBoardID} && myMemberID = {$myMemberID}";
        $connect -> query($sql);
    } else {
        echo "<script>alert('본인이 작성한 글이 아닙니다.')</script>";
    }
?>

<script>
    location.href="board.php";
</script>