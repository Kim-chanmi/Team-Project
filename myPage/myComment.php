<?php
    include "../connect/connect.php";
    include "../connect/session.php";

    $myMemberID = $_SESSION['myMemberID'];
    $myCommentSql = "SELECT * FROM myComment WHERE commentDelete = 0 AND myMemberID = '$myMemberID' ORDER BY myCommentID DESC LIMIT 10";
    $myCommentResult = $connect -> query($myCommentSql);
    $myCommentInfo = $myCommentResult -> fetch_array(MYSQLI_ASSOC);
    $myCommentCount = $myCommentResult -> num_rows;

?>

<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>내가 쓴 댓글</title>

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

    <main id="main">
        <section id="mypage" class="container">
            <div class="mypage__menu">
                <a href="myProfile.html" class="myProfile">
                    <img src="../html/assets/img/myProfile.jpg" alt="">
                    <p class="nickname">NICKNAME</p>
                    <p class="name">NAME</p>
                </a>
                <div class="mypage__sel">
                    <div class="mypage__sel__top">
                        <a href="myWrite.html" class="myWrite">
                            <div class="myWrite-icon"></div>
                            <p>작성 글</p>
                        </a>
                        <a href="myComment.html" class="myComment">
                            <div class="myComment-icon"></div>
                            <p>작성 댓글</p>
                        </a>
                        <a href="myLike.html" class="myLike">
                            <div class="myLike-icon"></div>
                            <p>좋아요</p>
                        </a>
                    </div>
                    <div class="myPage__num">
                        <p class="title">전체 댓글</p>
<?php
    echo "<p class='num'> $myCommentCount </p>";
?>
                    </div>
                </div>
            </div>
            <div class="myComment__inner">
<?php
    $myCommentSql = "SELECT b.storyAuthor, b.myMemberID, b.storyTitle, b.myStoryID, c.commentMsg c.commentPass c.myMemberID FROM myStory b JOIN myComment c ON (b.myMemberID = c.myMemberID) WHERE commentDelete = 0 AND b.myMemberID = '$myMemberID' ORDER BY myCommentID DESC LIMIT 10";
    $myCommentResult = $connect -> query($myCommentSql);

    foreach($myCommentResult as $comment){
?>
                <div class="myComment__box">
                    <span><?=$comment['storyAuthor']?></span>
                    <h3><?=$comment['storyTitle']?></h3>
                    <p><?=$comment['commentMsg']?></p>
                    <button>삭제</button>
                </div>
<?php }?>
            </div>


            <div class="mypage__pages">
                <ul>
                    <li><a href="#">&lt;&lt;</a></li>
                    <li><a href="#">&lt;</a></li>
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#">&gt;</a></li>
                    <li><a href="#">&gt;&gt;</a></li>
                </ul>
            </div>
            </div>
        </section>
        <!-- //plantmoa -->
    </main>
    <!-- //main -->

    <?php include "../include/footer.php" ?>
    <!-- footer -->

    <script>

    </script>
</body>

</html>