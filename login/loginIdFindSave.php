<?php
    include "../connect/connect.php";

    // $youName = $_POST['loginName'];
    // $youPhone = $_POST['loginPhone'];

    // $sql = "SELECT * FROM myAdminMember WHERE youName = '$youName' AND youPhone = '$youPhone'";
    // $result = $connect -> query($sql);
    // $memberInfo = $result -> fetch_array(MYSQLI_ASSOC);
    
    // if($memberInfo['youName'] == $youName){
    //     // echo $memberInfo['youEmail'];
    //     echo "<script>alert('회원님의 이메일은".$memberInfo['youEmail']."입니다>.< 로그인 해주세요!'); location.href='../main/main.php';</script>";
    // } else {
    //     echo "<script>alert('계정이 존재하지 않습니다! 회원가입을 해 주세요');history.back();</script>";
    // }
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>loginIdFind</title>
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
                <form action="" method="post">
                    <fieldset>
                        <legend class="blind">아이디 찾기 완료 폼</legend>
                        <div class="ID_Result">
<?php
    $youName = $_POST['loginName'];
    $youPhone = $_POST['loginPhone'];

    $sql = "SELECT * FROM myAdminMember WHERE youName = '$youName' AND youPhone = '$youPhone'";
    $result = $connect -> query($sql);
    $memberInfo = $result -> fetch_array(MYSQLI_ASSOC);
    
    if($memberInfo['youName'] == $youName){
        // echo $memberInfo['youEmail'];
        echo "<p class='result'>회원님의 이메일은<br><span>".$memberInfo['youEmail']."</span><br>입니다>.< 로그인 해주세요!</p>";
    } else {
        echo "<script>alert('계정이 존재하지 않습니다! 회원가입을 해 주세요');history.back();</script>";
    }
?>
                            <!-- <p class="result">
                                회원님의 이메일은 <br>
                                <span>*****@******</span> <br>
                                입니다.
                            </p> -->
                        </div>
                        <button type="submit" class="btn1"><a href="../main/main.php">로그인 하기</a></button>
                        <button type="submit" class="btn3"><a href="loginPwFind.html">비밀번호 찾기</a></button>
                    </fieldset>
                </form>
            </div>
            <a class="login__close ir" href="../main/main.php">닫기버튼입니다.</a>
        </section>
    </div>
    <script src="../assets/js/login.js"></script>
</body>

</html>