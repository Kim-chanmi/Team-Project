<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원가입 완료</title>

    <?php include "../include/link.php" ?>
    
</head>
<body>
    <?php include "../include/header.php" ?>
    <!-- //header -->
    <main id="main">
            <section id="join" class="container">
                <div class="result__inner">
                    <figure class="imgT">
                        <img src="../../html/assets/img/join_Resultt.svg" alt="회원가입 완료 이미지">
                    </figure>
                    <div class="result_desc">
                        <h3>회원가입 완료!</h3>
                        <p>
<?php
include "../connect/connect.php";

$youEmail = $_POST['youEmail'];
$youNickName = $_POST['youNickName'];
$youName = $_POST['youName'];
$youPass = $_POST['youPass'];
$youBirth = $_POST['youBirth'];
$youPhone = $_POST['youPhone'];
$regTime = time();

$youEmail = $connect -> real_escape_string(trim($youEmail));
$youNickName = $connect -> real_escape_string(trim($youNickName));
$youName = $connect -> real_escape_string(trim($youName));
$youPass = $connect -> real_escape_string(trim($youPass));
$youBirth = $connect -> real_escape_string(trim($youBirth));
$youPhone = $connect -> real_escape_string(trim($youPhone));
$youPass = sha1("web".$youPass);

//회원가입
$sql = "INSERT INTO myAdminMember(youEmail, youNickName, youName, youPass, youBirth, youPhone, regTime) VALUES('$youEmail', '$youNickName', '$youName', '$youPass', '$youBirth', '$youPhone', '$regTime')";
$result = $connect -> query($sql);

if($result){
    echo "회원가입을 축하합니다. 로그인을 해주세요!";
} else {
    echo "에러발생 -- 관리자에게 문의해주세요!" ;
}
?>
                        </p>
                        <div class="result_btn"> 
                            <a href="../main/main.php">메인페이지로 이동</a>
                        </div>
                    </div>
                    <figure class="imgB">
                        <img src="../../html/assets/img/join_Resultb.svg" alt="회원가입 완료 이미지">
                    </figure>
                </div>
        </section>
        <!-- //join_result -->
    </main>
    <!-- //main -->

    <?php include "../include/footer.php" ?>
    <!-- //footer -->

    

</body>
</html>