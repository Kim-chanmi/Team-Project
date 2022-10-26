<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";

    $boardTitle = $_POST['boardTitle'];
    $boardContents = $_POST['boardContents'];

    
    $boardImgFile = $_FILES['boardFile'];
    $boardImgSize = $_FILES['boardFile']['size'];
    $boardImgType = $_FILES['boardFile']['type'];
    $boardImgName = $_FILES['boardFile']['name'];
    $boardImgTmp = $_FILES['boardFile']['tmp_name'];

    $boardTitle = $connect -> real_escape_string($boardTitle);
    $boardContents = $connect -> real_escape_string($boardContents);
    $boardView = 1;
    $boardLike = 0;
    $regTime = time();
    $myMemberID = $_SESSION['myMemberID'];  //회원가입한 사람만 작성 가능



    //이미지 파일명 확인
    if($boardImgType){
        $fileTypeExtension = explode("/", $boardImgType);
        $fileType = $fileTypeExtension[0];      //image
        $fileExtension = $fileTypeExtension[1]; //png

        //이미지 타입 확인
        if($fileType == "image"){
            if($fileExtension == "jpg" || $fileExtension == "jpeg" || $fileExtension == "png" || $fileExtension == "gif"){
                $boardImgDir = "../assets/img/board/";
                $boardImgName = "Img_".time().rand(1,99999)."."."{$fileExtension}";
                $sql = "INSERT INTO myBoard(myMemberID, boardTitle, boardImgFile, boardImgsize, boardContents, boardView, boardLike, regTime) VALUES ('$myMemberID', '$boardTitle', '$boardImgName', '$boardImgSize', '$boardContents', '$boardView', '$boardLike', '$regTime')";

            } else {
                echo "<script>alert('지원하는 이미지 파일이 아닙니다.'); history.back(1)</script>";
                // echo "no이미지 노 파일";
            }
        }
    } else {
        //echo "이미지 파일을 첨부하지 않았습니다.";
        $sql = "INSERT INTO myBoard(myMemberID, boardTitle, boardImgFile, boardImgsize, boardContents, boardView, boardLike, regTime) VALUES('$myMemberID', '$boardTitle', 'Img_default.jpg', '$boardImgSize', '$boardContents', '$boardView', '$boardLike', '$regTime')";
        $connect -> query($sql);
        
    }

    //이미지 사이즈 확인
    if($boardImgSize > 1000000){
        echo "<script>alert('이미지 용량이 1메가를 초과했습니다.'); history.back(1)</script>";
        exit;
    }

    // echo $sql;

    // $result = $connect -> query($sql);
   
    

   
    $result = $connect -> query($sql);
    $result = move_uploaded_file($boardImgTmp, $boardImgDir.$boardImgName);
    // echo $result;
    Header("Location: board.php");
?>

<!-- <script>
    location.href = "board.php";
</script> -->