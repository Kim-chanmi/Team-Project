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

    $sql = "SELECT b.boardTitle, m.youName, b.regTime, b.boardView, b.boardContents FROM myBoard b JOIN myAdminMember m ON(m.myMemberID = b.myMemberID) WHERE b.myBoardID = {$myBoardID}";
    $result = $connect -> query($sql);

    
    if($result){
        $info = $result -> fetch_array(MYSQLI_ASSOC);
        

        // echo "<pre>";
        // var_dump($info);
        // echo "</pre>";

        echo "<tr><th>".$info['boardTitle']."</th></tr>";
        echo "<tr class='table_left'><th>".$info['youName']."<em>".date('Y-m-d H:i', $info['regTime'])."</em><p>".$info['boardView']."</p></th></tr>";
        echo "<tr><td class='height'>".$info['boardContents']."</td></tr>";
    }
?>
                        </tbody>
                    </table>
                </div>
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
<?php
    $currentView = $_GET['myBoardID'];
    $preView = $currentView-1;
    $nextView = $currentView+1;
    
    $sql = "SELECT b.boardTitle FROM myBoard WHERE b.myBoardID = {$currentView}";
    $connect -> query($sql);

    if($connect){
        echo "<tr class = 'tr1'><th>이전글</th><td><a href='http://homming.dothome.co.kr/board/boardView.php?myBoardID={$preView}'>".$info['boardTitle']."</a></td></tr>";
        echo "<tr class = 'tr2'><th>다음글</th><td><a href='http://homming.dothome.co.kr/board/boardView.php?myBoardID={$nextView}'>".$info['boardTitle']."</a></td></tr>";
    }
    if($currentView +1 == 50){
        echo "<tr class = 'tr1'><th>다음글</th><td><a href= '#'>등록된 다음글이 없습니다.</a></td></tr>";
    }
?>
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
</body>
</html>