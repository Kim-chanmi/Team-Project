<?php
    include "../connect/session.php";
    include "../connect/connect.php";
?>

<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homming 사이트 만들기</title>

    <?php include "../include/link.php" ?>

</head>

<body>
    <div id="skip">
        <a href="#header">헤더 영역 바로가기</a>
        <a href="#main">컨텐츠 영역 바로가기</a>
        <a href="#footer">푸터 영역 바로가기</a>
    </div>
    <!-- skip -->

    <?php include "../include/header.php" ?>
    <!-- header -->

    <?php include "../include/main.php" ?>
    <!-- main -->

    <?php include "../include/footer.php" ?>
    <!-- footer -->

    <div id="login__wrap" class="open">
        <section id="login__box">
            <div class="login__inner">
                <h2>비밀번호 재설정</h2>
                <form action="loginPwResetSave.php" method="post">
                    <fieldset>
                        <legend class="blind">비밀번호 재설정 폼</legend>
                        <div>
                        <?php 
                            echo "<script>alert('".$_GET['youEmail']."');</script>";
                            echo "<input type='hidden' name='youEmail' value='".$_GET['youEmail']."'>";
                         ?>
                            <label for="loginPW" class="blind">비밀번호</label>
                            <input type="password" name="loginPW" id="loginPW" placeholder="영문+숫자+특수문자 포함 8~20자리"
                                required>
                        </div>
                        <div>
                            <label for="loginPWC" class="blind">비밀번호 확인</label>
                            <input type="password" name="loginPWC" id="loginPWC" placeholder="비밀번호 재입력" required>
                        </div>
                        <button type="submit" class="btn1">비밀번호 변경 완료</button>
                    </fieldset>
                </form>
            </div>
            <a class="login__close" href="../main/main.php"></a>
        </section>
    </div>
    <script src="../assets/js/login.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
    // 비밀번호 공백 검사
            if($("#loginPW").val() == ""){
                $("#youPassComment").text("비밀번호를 입력해주세요!");
                return false;
            }

            // 비밀번호 유효성 검사
            let getYouPass = $("#loginPW").val();
            let getYouPassNum = getYouPass.search(/[0-9]/g);
            let getYouPassEng = getYouPass.search(/[a-z]/ig);
            let getYouPassSpe = getYouPass.search(/[`~!@@#$%^&*|₩₩₩'₩";:₩/?]/gi);

            if(getYouPass.length < 8 || getYouPass.length > 20){
                alert.$("#youPassComment").text("8자리 ~ 20자리 이내로 입력해주세요~");
                return false;
            } else if (getYouPass.search(/\s/) != -1){
                alert.$("#youPassComment").text("비밀번호는 공백없이 입력해주세요!");
                return false;
            } else if (getYouPassNum < 0 || getYouPassEng < 0 || getYouPassSpe < 0 ){
                alert.$("#youPassComment").text("영문, 숫자, 특수문자를 혼합하여 입력해주세요!");
                return false;
            }

            // 확인 비밀번호 공백 확인
            if($("#loginPWC").val() == ""){
                alert.$("#youPassCComment").text("확인 비밀번호를 입력해주세요!");
                return false;
            }

            // 비밀번호가 동일한지 체크
            if($("#loginPWC").val() !== $("#loginPW").val()){
                alert.$("#youPassCComment").text("비밀번호가 동일하지 않습니다.");
                return false;
            }
        </script>
</body>

</html>