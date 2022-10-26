<?php
    include "../connect/connect.php";
    include "../connect/session.php";
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>지식공유 | 질문</title>

    <!-- style -->
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
    <!-- //header -->

    <main id="main">
        <section id="board" class="container">
            <div class="board__inner">
                <div class="board__title">
                    <h3>공지사항</h3>
                </div>
                <div class="board__search">
                    <div class="right">
                        <form action="boardSearch.php" name="boardSearch" method="get">
                            <fieldset>
                                <legend>게시판 검색 영역</legend>
                                <input type="search" name="searchKeyword" id="searchKeyword" placeholder="검색어를 입력해주세요"
                                    aria-label="search" required>
                                <select name="searchOption" id="searchOption">
                                    <option value="title">제목</option>
                                    <option value="content">내용</option>
                                    <option value="name">작성자</option>
                                </select>
                                <button type="submit" class="searchBtn">검색</button>
                                <a href="boardWrite.php" class="btn">글쓰기</a>
                            </fieldset>
                        </form>
                    </div>
                </div>
                <div class="board__table">
                    <table>
                        <colgroup>
                            <col style="width: 5%">
                            <col>
                            <col style="width: 10%">
                            <col style="width: 10%">
                            <col style="width: 10%">
                        </colgroup>
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>제목</th>
                                <th>등록일</th>
                                <th>등록자</th>
                                <th>조회수</th>
                            </tr>
                        </thead>
                        <tbody>
<?php
    //게시판 페이지 수
    if(isset($_GET['page'])){
        $page = (int) $_GET['page'];
    } else {
        $page = 1;
    }

    $viewNum = 10;

    $viewLimit = ($viewNum * $page) - $viewNum;

    // 두개의 테이블 join
    $sql = "SELECT b.myBoardID, b.boardTitle, m.youNickName, b.regTime, b.boardView FROM myBoard b JOIN myAdminMember m ON(b.myMemberID = m.myMemberID) ORDER BY myBoardID DESC LIMIT {$viewLimit}, {$viewNum}";
    $result = $connect -> query($sql);

    $sql = "ALTER TABLE myBoard AUTO_INCREMENT = 1";
    $connect -> query($sql);

    //테이블 출력
    if($result){
        $count = $result -> num_rows;
        if($count > 0){
            
            for($i=1; $i <= $count; $i++){
                $info = $result -> fetch_array(MYSQLI_ASSOC);
                echo "<tr>";
                echo "<td>".$info['myBoardID']."</td>";
                echo "<td><a href='boardView.php?myBoardID={$info['myBoardID']}'>".$info['boardTitle']."</a></td>";
                echo "<td>".date('Y-m-d', $info['regTime'])."</td>";
                echo "<td>".$info['youNickName']."</td>";
                echo "<td>".$info['boardView']."</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>해당 게시글이 없습니다!</td></tr>";
        }
    }
?>
                            
                        </tbody>
                    </table>
                </div>
                <div class="board__pages">
<?php
    //갯수구하기
    $sql = "SELECT count(myBoardID) FROM myBoard";
    $result = $connect -> query($sql);

    $boardCount = $result -> fetch_array(MYSQLI_ASSOC);
    $boardCount = $boardCount['count(myBoardID)'];


    //총 페이지 갯수
    $boardCount = ceil($boardCount/$viewNum);

    // echo $boardCount;

    //현재 페이지를 기준으로 보여주고 싶은 갯수
    $pageCurrent = 5;
    $startPage = $page - $pageCurrent;  
    $endPage = $page + $pageCurrent;

    //처음페이지 초기화
    if($startPage < 1) $startPage = 1;

    //마지막페이지 초기화
    if($endPage >= $boardCount) $endPage = $boardCount;

    //이전 페이지, 처음 페이지
    if($page != 1){
        $prevPage = $page - 1;
        echo "<a href='board.php?page=1'>&lt;&lt;</a>";
        echo "<a href='board.php?page={$prevPage}'>&lt;</a>";
    }

    //페이지 넘버 표시
    for($i=$startPage; $i <= $endPage; $i++){
        $active = "";
        if($i == $page) $active = "active";

        echo "<a class='{$active}' href = 'board.php?page={$i}'>{$i}</a>";
    }

    //다음 페이지, 마지막 페이지
    if($page != $endPage){
        $nextPage = $page + 1;
        echo "<a href='board.php?page={$nextPage}'>&gt;</a>";
        echo "<a href='board.php?page={$boardCount}'>&gt;&gt;</a>";
    }
?>
                        <!-- <li><a href="#">&lt;&lt;</a></li>
                        <li><a href="#">&lt;</a></li>
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">&gt;</a></li>
                        <li><a href="#">&gt;&gt;</a></li> -->
                </div>
            </div>
        </section>
        <!-- //board -->

    </main>
    <!-- //main -->

    <?php include "../include/footer.php" ?>
    <!-- footer -->
    <?php include "../login/login.php" ?>
    <!-- login팝업 -->
    <script src="../assets/js/login.js"></script>
 
</body>
</html>

