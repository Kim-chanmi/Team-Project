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
    <title>스토리</title>

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
            <h2>스토리 영역입니다.</h2>
            <div class="board__inner">
                <div class="board__write">
                    <!-- <div class="right">
                        <form action="boardSearch.php" name="boardSearch" method="get">
                            <fieldset class="column-6 form-select">
                                
                            </fieldset>
                        </form>
                    </div> -->
                    <form action="storyWriteSave.php" name="boardWrite" method="post" enctype="multipart/form-data">
                        <fieldset>
                            <legend class="blind">스토리 작성 영역</legend>
                            <div>
                                <label class="blind" for="storyCategory">카테고리</label>
                                <select name="storyCategory" id="storyCategory" class="column-6">
                                    <option value="식물자랑">식물자랑</option>
                                    <option value="인테리어">인테리어</option>
                                    <option value="지식공유">지식공유 | 질문</option>
                                </select>
                            </div>
                            <div>
                                <label for="storyTitle" class="blind">제목</label>
                                <input type="text" name="storyTitle" id="storyTitle" placeholder="제목을 입력해주세요"
                                    aria-label="storyTitle" required>
                            </div>
                            <div class="fileView">
                                <label for="storyFile" class="blind">파일</label>
                                <span class="inp_placeholder" id="inp_placeholder">사진을 첨부해 주세요</span>
                                <span class="file__icon"><img src="../html/assets/img/file_icon.svg" alt="파일첨부 아이콘"></span>
                                <input type="file" name="storyFile" id="storyFile" accept=".jpg, .jpeg, .png, .gif" placeholder="jpg, gif, png 파일만 넣어주세요">
                            </div>
                            <div>
                            <label for="storyContents" class="blind">내용</label>
                                <textarea name="storyContents" id="storyContents" rows="20" placeholder="본문을 입력해주세요"
                                    aria-label="storyContents" required></textarea>
                            </div>
                            <button type="submit" class="btn">저장하기</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </section>
    </main>
    <!-- //main -->

    <?php include "../include/footer.php" ?>
    <!-- footer -->
    
    <script>
        document.getElementById('storyFile').addEventListener('change', function(){
            let filename = document.getElementById('inp_placeholder');
            if(this.files[0] == undefined){
                filename.innerText = '선택된 파일없음';
                return;
            }
            filename.innerText = this.files[0].name;
        });
    </script>
</body>
</html>