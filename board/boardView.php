<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>지식공유 | 질문</title>

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
        <section id="board" class="container">
            <h2>게시판 보기 영역입니다.</h2>
            <div class="board__inner">
                <div class="board__title">
                    <h3>지식공유 | 질문</h3>
                </div>
                <div class="view_table">
                    <table>
                        <tbody>
<?php
    $myBoardID = $_GET['myBoardID'];

     //echo $myBoardID;
    //보드뷰 + 1 (update)
    $sql = "UPDATE myBoard SET boardView = boardView + 1 WHERE myBoardID = {$myBoardID}";
    $connect -> query($sql);

    $sql = "SELECT b.boardTitle, m.youImgFile, m.youNickName, b.regTime, b.boardView, b.boardContents, b.boardImgFile FROM myBoard b JOIN myAdminMember m ON(m.myMemberID = b.myMemberID) WHERE b.myBoardID = {$myBoardID}";
    $result = $connect -> query($sql);

    
    if($result){
        $info = $result -> fetch_array(MYSQLI_ASSOC);
        
        // echo "<pre>";
        // var_dump($info);
        // echo "</pre>";

        echo "<tr><th>".$info['boardTitle']."</th></tr>";
        echo "<tr class='table_left'><th>"."<img class='profile_img' src='../assets/img/member/".$info['youImgFile']."'alt='프로필 이미지'>".' 작성자 : '.$info['youNickName']."<em>".'작성일 :'.date('Y-m-d H:i', $info['regTime'])."</em><p>".'조회수 : '.$info['boardView']."</p><span >".'좋아요 : '."</span></th></tr>";
        echo "<tr><td class='height'>"."<img class='board_img' src='../assets/img/board/".$info['boardImgFile']."'alt='게시판 이미지'>"."<br>".$info['boardContents']."</td></tr>";
    }
?>
                        </tbody>
                    </table>
                </div>
                <?php
    $currentView = $_GET['myBoardID'];
    $currentTitle = $_GET['boardTitle'];
    $preView = $currentView-1;
    $nextView = $currentView+1;

    //갯수구하기
    $sql = "SELECT count(myBoardID) FROM myBoard";
    $result = $connect -> query($sql);

    $boardCount = $result -> fetch_array(MYSQLI_ASSOC);
    $boardCount = $boardCount['count(myBoardID)'];
    
    $sql = "SELECT b.boardTitle FROM myBoard WHERE b.myBoardID = {$currentView}"; 
    $connect -> query($sql);

    if($currentView <=1){
        echo "<button class = 'prev__view none'><a href = '#'></a></button>";
    } else {
        echo "<button class = 'prev__view'><a href='http://homming.dothome.co.kr/board/boardView.php?myBoardID={$preView}'>".''."</a></button>";
    }

    if($currentView >= $boardCount) {
        echo "<button class = 'next__view none'><a href = '#'></a></button>";
    } else {
        echo "<button class = 'next__view'><a href='http://homming.dothome.co.kr/board/boardView.php?myBoardID={$nextView}'>".''."</a></button>";
    }

    
    
    

    


    // if($currentView <= 1){
    //     echo "<tr class = 'tr1'><th>이전글</th><td><a href= '#'>등록된 이전글이 없습니다.</a></td></tr>";
    // }

    // if($connect){
    //     echo "<tr class = 'tr1'><th>이전글</th><td><a href='http://homming.dothome.co.kr/board/boardView.php?myBoardID={$preView}'>".$info['boardTitle']."</a></td></tr>";
    //     echo "<tr class = 'tr2'><th>다음글</th><td><a href='http://homming.dothome.co.kr/board/boardView.php?myBoardID={$nextView}'>".$info['boardTitle']."</a></td></tr>";
    // }
    // if($currentView >= $boardCount){
    //     echo "<tr class = 'tr2'><th>다음글</th><td><a href= '#'>등록된 다음글이 없습니다.</a></td></tr>";
    // }
?>
                <!-- <div class="reply_view"> -->
                    <!-- <h3>댓글목록</h3> -->
                        
                
                    <!--- 댓글 입력 폼 -->
                    <!-- <div class="dap_ins">
                        <form action="" method="post">
                            <input type="hidden" name="dat_user" id="dat_user" class="dat_user" size="15" placeholder="아이디" value=>
                            <div style="margin-top:10px; ">
                                <textarea name="content" class="reply_content" id="re_content" ></textarea>
                                <button id="rep_bt" class="re_bt">댓글</button>
                            </div>
                        </form>
                    </div> -->
                <!-- </div> -->
                <div class="board__btn">
                    <a href="boardModify.php?myBoardID=<?=$myBoardID?>">수정하기</a>
                    <a href="boardRemove.php?myBoardID=<?=$myBoardID?>" onClick="alert('정말 삭제하시겠습니까?')">삭제하기</a>
                    <a href="board.php">목록보기</a>
                </div>
                <div class="board_cont">
                    <table>
                        <colgroup>
                            <col width="18%">
                            <col>
                        </colgroup>
                        <tbody>

                            <!-- <tr class="tr1">
                                <th>이전글</th>
                                <td><a href="#">물주는거 너무 어려워요ㅠㅠㅠㅠ</a></td>
                            </tr>
                            <tr class="tr2">
                                <th>다음글</th>
                                <td><a href="#">이 식물 이름 아시는분 있나요???🙄</a></td>
                            </tr> -->
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        <!-- board -->
    </main>

    <?php include "../include/footer.php" ?>
    <!-- footer -->

    <?php include "../login/login.php" ?>
    <!-- login -->

    <script src="../assets/js/custom.js"></script>
    <script
        src="https://kit.fontawesome.com/6478f529f2.js"
        crossorigin="anonymous"
></script>
    
</body>
</html>