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

$youImgFile = $_FILES['youFile'];
$youImgSize = $_FILES['youFile']['size'];
$youImgType = $_FILES['youFile']['type'];
$youImgName = $_FILES['youFile']['name'];
$youImgTmp = $_FILES['youFile']['tmp_name'];

$youEmail = $connect -> real_escape_string(trim($youEmail));
$youNickName = $connect -> real_escape_string(trim($youNickName));
$youName = $connect -> real_escape_string(trim($youName));
$youPass = $connect -> real_escape_string(trim($youPass));
$youBirth = $connect -> real_escape_string(trim($youBirth));
$youPhone = $connect -> real_escape_string(trim($youPhone));
$youPass = sha1("web".$youPass);

//이미지 파일명 확인
if($youImgType){
    $fileTypeExtension = explode("/", $youImgType);
    $fileType = $fileTypeExtension[0];      //image
    $fileExtension = $fileTypeExtension[1]; //png

    //이미지 타입 확인
    if($fileType == "image"){
        if($fileExtension == "jpg" || $fileExtension == "jpeg" || $fileExtension == "png" || $fileExtension == "gif"){
            $youImgDir = "../assets/img/member/";
            $youImgName = "Img_".time().rand(1,99999)."."."{$fileExtension}";
        } else {
            echo "<script>alert('지원하는 이미지 파일이 아닙니다.'); history.back(1)</script>";
        }
    }
} else {
    // echo "이미지 파일을 첨부하지 않았습니다.";
    $sql = "INSERT INTO myAdminMember(youImgSize, youImgFile, youEmail, youNickName, youName, youPass, youBirth, youPhone, regTime) VALUES('$youImgSize', 'Img_default.jpg', '$youEmail', '$youNickName', '$youName', '$youPass', '$youBirth', '$youPhone', '$regTime')";
    $connect -> query($sql);
    $result = move_uploaded_file($youImgTmp, $youImgDir.'Img_default.jpg');
}

//이미지 사이즈 확인
if($youImgSize > 1000000){
    echo "<script>alert('이미지 용량이 1메가를 초과했습니다.'); history.back(1)</script>";
    exit;
}

//회원가입
$sql = "INSERT INTO myAdminMember(youImgSize, youImgFile, youEmail, youNickName, youName, youPass, youBirth, youPhone, regTime) VALUES('$youImgSize', '$youImgName', '$youEmail', '$youNickName', '$youName', '$youPass', '$youBirth', '$youPhone', '$regTime')";
$connect -> query($sql);

 
$result = $connect -> query($sql);
$result = move_uploaded_file($youImgTmp, $youImgDir.$youImgName);
// $result = move_uploaded_file($youImgTmp, $youImgDir.'Img_default.jpg');

if($result){
    echo "회원가입을 축하합니다. 로그인을 해주세요!";
} else {    
    echo "회원가입을 축하합니다. 마이페이지에서 프로필을 설정해 주세요!" ;
}
// if($youImgName){
//     echo "회원가입을 축하합니다. 로그인을 해주세요!";
// } else {    
//     echo "프로필은 나중에 등록해 주세요" ;
// }



// echo "<pre>";
// var_dump($youImgFile);
// echo "</pre>";

// echo $fileTypeExtension;



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