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
                <h2>로그인</h2>
                <form name="login" action="../login/loginSave.php" method="post">
                    <fieldset>
                        <legend class="blind">로그인 입력 폼</legend>
                        <div>
                            <label for="loginEmail" class="blind">이메일</label>
                            <input type="email" name="youEmail" id="youEmail" placeholder="이메일" required>
                        </div>
                        <div>
                            <label for="loginPW" class="blind">비밀번호</label>
                            <input type="password" name="youPass" id="youPass" placeholder="비밀번호" required>
                        </div>
                        <button type="submit" class="btn1">로그인</button>
                    </fieldset>
                </form>

                <div class="login__service">
                    <div class="join btn2"><a href="../admin/adminJoinAgree.php">회원가입</a></div>
                    <div class="findID btn2"><a href="../login/loginIdFind.php">아이디 찾기</a></div>
                    <div class="findPW btn2"><a href="loginPwFind.php">비밀번호 찾기</a></div>
                </div>
                <ul class="desc">
                    <li>Homming 사이트를 방문해 주셔서 감사합니다!</li>
                    <li>1. 비밀번호 분실 시 비밀번호 찾기를 이용하세요.</li>
                    <li>2. 개인정보 노출에 주의하세요.</li>
                </ul>
            </div>
            <div class="login__close">
                <span class="ir">닫기버튼입니다.</span>
            </div>
        </section>
    </div>
    <script src="../assets/js/login.js"></script>
</body>

</html>





