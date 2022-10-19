<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>지식 공유 | 질문</title>
</head>
<body>
<?php
    $myBoardID = $_POST['myBoardID'];
    $boardTitle = $_POST['boardTitle'];
    $boardContents = $_POST['boardContents'];
    $youPass = $_POST['youPass'];
    $myMemberID = $_SESSION['myMemberID'];
    $youPass = sha1("web".$youPass);

    $boardTitle = $connect -> real_escape_string($boardTitle);
    $boardContents = $connect -> real_escape_string($boardContents);

    $sql = "SELECT youPass, myMemberID FROM myAdminMember WHERE myMemberID = {$myMemberID}";
    $result = $connect -> query($sql);

    $memberInfo = $result -> fetch_array(MYSQLI_ASSOC);

    // echo $youPass;
    // echo $memberInfo['youPass'];

    if($memberInfo['youPass'] === $youPass && $memberInfo['myMemberID'] === $myMemberID){
        $sql = "UPDATE myBoard SET boardTitle = '{$boardTitle}', boardContents = '{$boardContents}' WHERE myBoardID = '{$myBoardID}' && myMemberID = '{$myMemberID}' ";
        $connect -> query($sql);

    } else {
        echo "<script>alert('비밀번호가 일치하지 않습니다. 다시 한번 확인해주세요（⊙ｏ⊙）')</script>";
    }
    // if($memberInfo['youPass'] != $youPass) {
    //     echo "<script>alert('비밀번호가 일치하지 않습니다. 다시 한번 확인해주세요（⊙ｏ⊙）')</script>";
    // } else if($memberInfo['myMemberID'] != $myMemberID) {
    //     echo "<script>alert('본인이 작성한 글이 아닙니다.')</script>";
    // } else {
    //     $sql = "UPDATE myBoard SET boardTitle = '{$boardTitle}', boardContents = '{$boardContents}' WHERE myBoardID = '{$myBoardID}' && myMemberID = '{$myMemberID}' ";
    //     $connect -> query($sql);
    // }
?>

<script>
    location.href="board.php";
</script>
</body>
</html>