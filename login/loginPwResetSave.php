<?php
    include "../connect/connect.php";
    $youEmail = $_POST['youEmail'];
    $loginPW = $_POST['loginPW'];
    $loginPWC = $_POST['loginPWC'];
    $youPass = sha1("web".$loginPW);
    // $loginName = $_POST['loginName'];

    $sql = "SELECT * FROM myAdminMember WHERE  youEmail = '$youEmail'";
    $result = $connect -> query($sql);

    if($loginPW === $loginPWC){
        $sql = "UPDATE myAdminMember SET youPass = '$youPass' WHERE youEmail = '$youEmail'";
        $connect -> query($sql);
        echo "<script>alert('정보가 일치하여, 비밀번호를 변경합니다.'); location.href='../main/main.php';</script>";
        // Header("Location: ../main/main.php");
    } else {
        echo "<script>alert('비밀번호가 일치하지 않습니다. 다시 한번 확인해주세요!'); history.back(1);</script>";
    }
?>