<?php
    include "../connect/connect.php";

    // $youEmail = $_POST['loginEmail'];
    // $youName = $_POST['loginName'];
    // $youPhone = $_POST['loginPhone'];

    $youEmail = $connect -> real_escape_string(trim($_POST['loginEmail']));
    $youName = $connect -> real_escape_string(trim($_POST['loginName']));
    $youPhone = $connect -> real_escape_string(trim($_POST['loginPhone']));

    $sql = "SELECT * FROM myAdminMember WHERE youEmail = '$youEmail' AND youName = '$youName' AND youPhone = '$youPhone'";
    $result = $connect -> query($sql);
    // echo $sql;
    $count = $result -> num_rows;
    $memberInfo = $result -> fetch_array(MYSQLI_ASSOC);
    $email = $memberInfo['youEmail'];
    // echo $count;
    if($count == 1){ 
        echo "<script>alert('회원님의 비밀번호를 변경합니다.'); location.href='../login/loginPwReset.php?youEmail={$email}';</script>";
    } else {
        echo "<script>alert('없는 계정입니다.'); history.back(1);</script>";
    };
?>
<script></script>