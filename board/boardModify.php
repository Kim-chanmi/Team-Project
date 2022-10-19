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
            <h2>게시판 영역입니다.</h2>
            <div class="board__inner">
                <div class="board__write">
                    <div class="right">
                        <form action="boardSearch.php" name="boardSearch" method="get">
                            <fieldset>
                                <select name="searchOption" id="searchOption">
                                    <option value="content">카테고리</option>
                                    <option value="content">전체</option>
                                    <option value="content">인테리어</option>
                                    <option value="content">식물자랑</option>
                                    <option value="content">지식공유</option>
                                </select>
                            </fieldset>
                        </form>
                    </div>
                    <form action="boardModifySave.php" name="boardModify" method="post">
                        <fieldset>
                            <legend class="blind">게시판 작성 영역</legend>
<?php
    $myBoardID = $_GET['myBoardID'];
    $sql = "SELECT myBoardID, boardTitle, boardContents FROM myBoard WHERE myBoardID = {$myBoardID}";
    $result = $connect -> query($sql);

    if($result){
        $info = $result -> fetch_array(MYSQLI_ASSOC);
        echo "<div style='display:none'><label for='myBoardID'>번호</label><input type='text' name='myBoardID' id='myBoardID' value='".$info['myBoardID']."'></div>";
        echo "<div><label for='boardTitle' class='blind'>제목</label><input type='text' name='boardTitle' id='boardTitle' value='".$info['boardTitle']."'></div>";
        echo "<div><label for='boardContents' class='blind'>내용</label><textarea name='boardContents' id='boardContents' rows='20'>".$info['boardContents']."</textarea></div>";
    }
?>

                            <!-- <div>
                                <label for="boardTitle" class="blind">제목</label>
                                <input type="text" name="boardTitle" id="boardTitle" placeholder="제목을 입력해주세요"
                                    aria-label="boardTitle" required>
                            </div>
                            <div>
                            <label for="boardContents" class="blind">내용</label>
                                <textarea name="boardContents" id="boardContents" rows="20" placeholder="본문을 입력해주세요"
                                    aria-label="boardContents" required></textarea>
                            </div> -->
                            <div class="modify__btn">
<?php
    if($result){
        $info = $result -> fetch_array(MYSQLI_ASSOC);
        echo "<input type='password' class='psss-btn' name='youPass' id='youPass' placeholder='비밀번호를 입력해주세요' autocomplete='off' required>";
    }
?>
                                <button type="submit" value="수정하기" class="btn">수정하기</button>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </section>
    </main>
    <!-- //main -->

    <?php include "../include/footer.php" ?>
    <!-- footer -->
    
</body>
</html>