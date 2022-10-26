<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";

    $myStoryID = $_GET['storyID'];   
    $myMemberID = $_SESSION['myMemberID'];

    
    //데이터 저장
    $storySql = "SELECT * FROM myStory WHERE myStoryID = {$myStoryID}";
    $storyResult = $connect -> query($storySql);
    $storyInfo = $storyResult -> fetch_array(MYSQLI_ASSOC);

    $memberSql = "SELECT * FROM myAdminMember WHERE myMemberID  = {$myMemberID}";
    $memberResult = $connect -> query($memberSql);
    $memberInfo = $memberResult -> fetch_array(MYSQLI_ASSOC);

    $commentSql = "SELECT * FROM myComment WHERE myStoryID = '$myStoryID' ORDER BY myCommentID DESC";
    $commentResult = $connect -> query($commentSql);
    $commentInfo = $commentResult -> fetch_array(MYSQLI_ASSOC); 

    //조회수
    $sql = "UPDATE myStory SET storyView = storyView + 1 WHERE myStoryID = {$myStoryID}";
    $connect -> query($sql);

?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP 사이트 만들기 - 블로그</title>

    <!-- style -->
    <?php include "../include/link.php" ?>

</head>
<body>
    <div id="skip">
        <a href="#header">헤더 영역 바로가기</a>
        <a href="#main">컨텐츠 영역 바로가기</a>
        <a href="#footer">푸터 영역 바로가기</a>
    </div>
    <!-- //skip -->
    <?php include "../include/header.php" ?>
    <!-- //header -->

    <main id="main">
<?php
     $storyViewInfo = "SELECT m.youNickName, m.myMemberID, b.myStoryID, b.myMemberID, b.storyRegTime FROM myStory b JOIN myAdminMember m ON (m.myMemberID = b.myMemberID) WHERE myStoryID = $myStoryID";
     $viewResult = $connect -> query($storyViewInfo);
     $viewInfo = $viewResult -> fetch_array(MYSQLI_ASSOC); 
?>
        <section id="storyVeiw">
            <div class="story__header" style="background-image:url(../assets/img/story/<?=$storyInfo['storyImgFile']?>)">
                <div class="story__title container">
                    <h2 class="story__title__h1">
                        <?=$storyInfo['storyTitle']?>
                    </h2>
                    <span class="story__title__cate"><?=$storyInfo['storyCategory']?></span>
                    <div class="story__title__info">
                        <div>
                            <span class="author"><?=$viewInfo['youNickName']?></span>
                            <span class="date"><?=date('Y-m-d', $storyInfo['storyRegTime'])?></span>
                        </div>
                        <div>
                            <a href="#" class="modify">수정</a>
                            <a href="#" class="delete">삭제</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="storyView__inner container">
                <div class="story__contents">
                    <div class="story__contents__ad">
                        <div></div>
                    </div>
                    <!-- //blog__contents__ad -->
                    <div class="story__contents__cont">
                        <figure>
                            <img src="../assets/img/story/<?=$storyInfo['storyImgFile']?>" alt="<?=$storyInfo['storyImgFile']?>">
                        </figure>
                        <div class="story__contents__write">
                            <?=$storyInfo['storyContents']?>
                        </div>
                    </div>
                    <!-- //blog__contents__cont -->
                    <div class="story__contents__comment">
                        <h3>댓글</h3>
<?php
    $sql = "SELECT m.youNickName, m.youImgFile, m.myMemberID, c.myMemberID, c.myCommentID, c.myStoryID, c.commentMsg, c.regTime FROM myComment c JOIN myAdminMember m ON (m.myMemberID = c.myMemberID) WHERE myStoryID = $myStoryID";
    $result = $connect -> query($sql);

    foreach($result as $comment){ ?>
                        <div class="comment" id="comment<?=$comment['myCommentID']?>">
                            <div class="comment__view__img">
                                <figure>
                                    <img src="../assets/img/member/<?=$comment['youImgFile']?>" alt="프로필">
                                </figure>
                            </div>
                            <div class="comment__view">
                                <div class="comment__view__data">
                                    <span class="name"><?=$comment['youNickName']?></span>
                                    <span class="date"><?=date('Y-m-d', $comment['regTime'])?></span>
                                </div>
                                <div class="comment__view__msg">
                                    <?=$comment['commentMsg']?>
                                </div>
                                <div class="comment__del">
                                    <a href="#" class="comment__del__del">댓글 삭제</a>
                                    <a href="#" class="comment__del__mod">댓글 수정</a>
                                </div>
                            </div>
                        </div>
<?php } ?>
                        <!-- <div class="comment" id="comment">
                            <div class="comment__view__img">
                                <img src="../html/assets/img/column05.jpg" alt="프로필">
                            </div>
                            <div class="comment__view">
                                <div class="comment__view__data">
                                    <span class="name">고구마먹고싶다</span>
                                    <span class="date">2022.10.20</span>
                                </div>
                                <div class="comment__view__msg">
                                    상추너무 맛있어보여요!!! 저도 먹고 싶네요!!ㅠㅠ
                                </div>
                                <div class="comment__del">
                                    <a href="#" class="comment__del__del">댓글 삭제</a>
                                    <a href="#" class="comment__del__mod">댓글 수정</a>
                                </div>
                            </div>
                        </div> -->
                    </div>
                    <div class="comment__delete" style="display:none">
                        <label for="commentDeletePass" class="blind">비밀번호 입력</label>
                        <input type="text" id="commentDeletePass" name="commentDeletePass" placeholder="삭제하실려면 비밀번호를 입력해주세요!!">
                        <button id="commentDeleteCancel">취소</button>
                        <button id="commentDeleteButton">삭제</button>
                    </div>
                    <div class="comment__modify" style="display:none">
                        <label for="commentModifyMsg" class="blind">수정 내용</label>
                        <textarea type="text" id="commentModifyMsg" row="8" name="commentModifyMsg"></textarea>
                        <label for="commentModifyPass" class="blind">비밀번호</label>
                        <input type="text" id="commentModifyPass" name="commentModifyPass" placeholder="비밀번호를 입력해주세요!!">
                        <button id="commentModifyCancel">취소</button>
                        <button id="commentModifyButton">수정</button>
                    </div>
                    <div class="comment__write">
                        <div class="comment__write__msg">
                            <label for="commentWrite" class="blind">댓글 쓰기</label>
                            <textarea type="text" id="commentWrite" name="commentWrite" row="10" placeholder="댓글을 입력해주세요!!"></textarea>
                        </div>
                        <div class="comment__write__info">
                            <!-- <label for="commentName" class="blind">이름</label>
                            <input type="text" id="commentName" name="commentName" placeholder="이름"> -->
                            <label for="commentPass" class="blind">비밀번호</label>
                            <input type="text" id="commentPass" name="commentPass" placeholder="비밀번호">
                            <button type="submit" id="commentBtn">댓글 쓰기</button>
                        </div>
                    </div>
                    <!-- //story__contents__comment -->
                </div>
                <!-- //story__contents -->
                <div class="story__aside">
<?php
     $storyViewInfo2 = "SELECT m.youImgFile, m.myMemberID, b.myStoryID, b.myMemberID, b.storyRegTime FROM myStory b JOIN myAdminMember m ON (m.myMemberID = b.myMemberID) WHERE myStoryID = $myStoryID";
     $viewResult2 = $connect -> query($storyViewInfo2);
     $viewInfo2 = $viewResult2 -> fetch_array(MYSQLI_ASSOC); 
?>
                    <div class="story__aside__intro">
                        <div class="img">
                            <img src="../assets/img/member/<?=$viewInfo2['youImgFile']?>" alt="">
                        </div>
                    </div>
                    <div class="story__aside__cate">
                        <h3>카테고리</h3>
                        <ul>
                            <li><a href="story.php?category=식물자랑">식물자랑</a></li>
                            <li><a href="story.php?category=인테리어">인테리어</a></li>
                            <li><a href="story.php?category=지식공유">지식공유 | 질문</a></li>
                        </ul>
                    </div>
                    <div class="story__aside__new">
                        <h3>최신글</h3>
                        <ul>
<?php
    $storyNewSql = "SELECT * FROM myStory WHERE storyDelete = 0 ORDER BY myStoryID DESC LIMIT 3";
    $storyNewResult = $connect -> query($storyNewSql);

    foreach($storyNewResult as $storyNew) {?>
                            <li>
                                <a href="storyView.php?storyID=<?=$storyNew['myStoryID']?>"><span><img src="../assets/img/story/<?=$storyNew['storyImgFile']?>" alt="<?=$storyNew['storyImgFile']?>"></span>
                                     <em><?=$storyNew['storyTitle']?></em>
                                     <p><?=date('Y-m-d', $storyNew['storyRegTime'])?></p>
                                </a>
                            </li>
<?php  } ?>
                        </ul>
                    </div>
                    <div class="story__aside__comment">
                        <h3>최신 댓글</h3>
                        <ul>
<?php
    $commentNewSql = "SELECT * FROM myComment WHERE commentDelete = 0 ORDER BY myCommentID DESC LIMIT 4";
    $commentNewResult = $connect -> query($commentNewSql);
    foreach($commentNewResult as $commentNew) { ?>
        <li>
            <a href="storyView.php?storyID=<?=$commentNew['myStoryID']?>"><?=$commentNew['commentMsg']?></a>
        </li>
  <?php }?>
                            <!-- <li><a href="">혁식적인 서능을 자랑하는 M2 칩...</a></li>
                            <li><a href="">혁식적인 서능을 자랑하는 M2 칩...</a></li>
                            <li><a href="">혁식적인 서능을 자랑하는 M2 칩...</a></li>
                            <li><a href="">혁식적인 서능을 자랑하는 M2 칩...</a></li> -->
                        </ul>
                    </div>
                </div>
                <div class="story__relation"></div>
            </div>
        </section>
    </main>
    <!-- //main -->
    <?php include "../include/footer.php" ?>
    <!-- footer -->
    <?php include "../login/login.php" ?>
    <!-- login팝업 -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script>
        const commentPass = $("#commentPass"); //댓글 비밀번호
        const commentWrite = $("#commentWrite"); //댓글 내용

        let commentID = "";
        let commentMsg = "";
        //댓글 삭제 버튼 클릭시
        $(".comment__del__del").click(function(e){
            e.preventDefault();
            // alert("댓글 삭제 버튼 클릭시");
            $(".comment__delete").show();

            //클릭한 아이디값 가져오기
            commentID = $(this).parent().parent().parent().attr("id");
            // alert(commentID);

        });

        //댓글 수정 버튼 클릭시
        $(".comment__del__mod").click(function(e){
            e.preventDefault();
            // alert("댓글 수정 버튼 클릭시");
            $(".comment__modify").show();

            commentID = $(this).parent().parent().parent().attr("id");

            //쓴 댓글 가져오기
            commentMsg= $(this).parent().parent().parent().find(".comment__view__msg").text();
            $("#commentModifyMsg").val(commentMsg.trim());
           

        });

        //댓글 삭제 버튼 --> 취소 버튼 클릭
        $("#commentDeleteCancel").click(function(e){
            e.preventDefault();
            $(".comment__delete").hide();
        });

        //댓글 수정 버튼 --> 취소 버튼 클릭
        $("#commentModifyCancel").click(function(e){
            e.preventDefault();
            $(".comment__modify").hide();
        });

        //댓글 삭제 버튼 --> 삭제 버튼 클릭
        $("#commentDeleteButton").click(function(){
            //comment14 숫자만 가져옴
            let number = commentID.replace(/[^0-9]/g, "");

            if($("#commentDeletePass").val() == ''){
                alert("수정 내용 및 비밀번호를 적어주세요!");
                $("#commentDeletePass").focus();
            } else {
                $.ajax({
                    url: "storyCommentDelete.php",
                    method: "POST",
                    dataType: "json",
                    data: {
                        "pass" : $("#commentDeletePass").val(),
                        "commentID" : number
                    },
                    success: function(data) {
                        console.log(data);
                        location.reload();      //실시간으로 불러옴
                    },
                    error: function(request, status, error){
                        console.log("request" + request);
                        console.log("status" + status);
                        console.log("error" + error);
                    }
                })
            }
        });

        //댓글 수정하기
        $("#commentModifyButton").click(function(){
            //숫자만 가져옴
            let number = commentID.replace(/[^0-9]/g, "");

            if($("#commentModifyPass").val() == '' || $("#commentModifyMsg").val() == ''){
                alert("댓글 작성시 비밀번호를 적어주세요!");
                $("#commentModifyMsg").focus();
            } else {
                $.ajax({
                    url: "storyCommentModify.php",
                    method: "POST",
                    dataType: "json",
                    data: {
                        "msg" : $("#commentModifyMsg").val(),
                        "pass" : $("#commentModifyPass").val(),
                        "commentID" : number
                    },
                    success: function(data) {
                        console.log(data);
                        location.reload();      //실시간으로 불러옴
                    },
                    error: function(request, status, error){
                        console.log("request" + request);
                        console.log("status" + status);
                        console.log("error" + error);
                    }
                })
            }
        });

        //댓글
        $("#commentBtn").click( () => {
            if($("#commentWrite").val() == ""){
                alert("댓글을 써주세요!")
                $("#commentWrite").focus();
            } else if($("#commentPass").val() == ""){
                alert("비밀번호를 입력해주세요!")
                $("#commentPass").focus();
            } else {
                $.ajax({
                    url: "storyCommentWrite.php",
                    method: "POST",
                    dataType: "json",
                    data: {
                        "storyID": <?=$myStoryID?>,
                        "memberID" : <?=$myMemberID?>,
                        "pass": commentPass.val(),
                        "msg": commentWrite.val()
                    },
                    success: function(data) {
                        console.log(data);
                        location.reload();      //실시간으로 불러옴
                    },
                    error: function(request, status, error){
                        console.log("request" + request);
                        console.log("status" + status);
                        console.log("error" + error);
                    }
                })
            }
        })
    </script>

</body>
</html>