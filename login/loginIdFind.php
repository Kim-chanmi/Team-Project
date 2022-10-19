<?php
    include "../connect/session.php";
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
                <h2>이메일 찾기</h2>
                <form action="loginIdFindSave.php" method="post">
                    <fieldset>
                        <legend class="blind">아이디 찾기 폼</legend>
                        <div>
                            <label for="loginName" class="blind">이름</label>
                            <input type="text" name="loginName" id="loginName" placeholder="이름" required>
                        </div>
                        <div>
                            <label for="loginPhone" class="blind">휴대폰번호</label>
                            <input type="text" name="loginPhone" id="loginPhone" placeholder="휴대폰번호" required>
                        </div>
                        <button type="submit" class="btn1">이메일 찾기</button>
                        <button type="submit" class="btn3"><a href="loginPwFind.php">비밀번호 찾기</a></button>
                    </fieldset>
                </form>
            </div>
            <a class="login__close" href="../main/main.php"></a>
        </section>
    </div>
    <script src="../assets/js/login.js"></script>
</body>

</html>





