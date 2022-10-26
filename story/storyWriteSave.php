<?php
    include "../connect/connect.php";
    include "../connect/session.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    $myMemberID = $_SESSION['myMemberID'];
    $storyAuthor = $_SESSION['youName'];
    $storyCategory = $_POST['storyCategory'];
    $storyTitle = $_POST['storyTitle'];
    $storyContents = nl2br($_POST['storyContents']);
    $storyView = 1;
    $storyLike = 0;
    $storyDelete = 0;
    $regTime = time();

    $storyImgFile = $_FILES['storyFile'];
    $storyImgSize = $_FILES['storyFile']['size'];
    $storyImgType = $_FILES['storyFile']['type'];
    $storyImgName = $_FILES['storyFile']['name'];
    $storyImgTmp = $_FILES['storyFile']['tmp_name'];

    echo $storyCategory;
    echo $storyTitle;
    echo $storyContents;

    // echo "<pre>";
    // var_dump($storyImgFile);
    // echo "</pre>";
    // array(5) {
    //     ["name"]=>
    //     string(9) "icon1.png"
    //     ["type"]=>
    //     string(9) "image/png"
    //     ["tmp_name"]=>
    //     string(36) "/Applications/MAMP/tmp/php/phpWOWyQJ"
    //     ["error"]=>
    //     int(0)
    //     ["size"]=>
    //     int(1479)
    // }
    //이미지 파일명 확인
    if($storyImgType){
        $fileTypeExtension = explode("/", $storyImgType);
        $fileType = $fileTypeExtension[0];      //image
        $fileExtension = $fileTypeExtension[1]; //png

        //이미지 타입 확인
        if($fileType == "image"){
            if($fileExtension == "jpg" || $fileExtension == "jpeg" || $fileExtension == "png" || $fileExtension == "gif"){
                $storyImgDir = "../assets/img/story/";
                $storyImgName = "Img_".time().rand(1,99999)."."."{$fileExtension}";
                // echo "이미지 파일이 맞네요!";
                $sql = "INSERT INTO myStory(myMemberID, storyTitle, storyContents, storyCategory, storyAuthor, storyView, storyLike, storyImgFile, storyImgSize, storyDelete, storyRegTime) VALUES('$myMemberID', '$storyTitle', '$storyContents', '$storyCategory', '$storyAuthor', '$storyView', '$storyLike', '$storyImgName', '$storyImgSize', '$storyDelete', '$regTime')";
                
            } else {
                echo "<script>alert('지원하는 이미지 파일이 아닙니다.'); history.back(1)</script>";
                // echo "노지원 노파일";
            }
        }
    } else {
        //echo "이미지 파일이 첨부하지 않았습니다.";
        $sql = "INSERT INTO myStory(myMemberID, storyTitle, storyContents, storyCategory, storyAuthor, storyView, storyLike, storyImgFile, storyImgSize, storyDelete, storyRegTime) VALUES('$myMemberID', '$storyTitle', '$storyContents', '$storyCategory', '$storyAuthor', '$storyView', '$storyLike', 'Img_default.jpg', '$storyImgSize', '$storyDelete', '$regTime')";
    }

    //이미지 사이즈 확인
    if($storyImgSize > 1000000){
        echo "<script>alert('이미지 용량이 1메가를 초과했습니다.'); history.back(1)</script>";
        exit;
    }
    // echo $sql;
    $result = $connect -> query($sql);
    $result = move_uploaded_file($storyImgTmp, $storyImgDir.$storyImgName);

    Header("Location:story.php");
?>
</body>
</html>