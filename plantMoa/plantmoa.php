<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>식물모아</title>

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
        <section id="plantmoa" class="container">
            <div class="plantmoa__inner">
                <div class="plantmoa__title">
                    <h2>식물모아</h2>
                </div>
                <div class="plantmoa__search">
                    <fieldset>
                        <select name="searchOption" id="searchOption">
                            <option value="title">전체</option>
                            <option value="content">다육이/선인장</option>
                            <option value="content">관엽/공기정화</option>
                            <option value="content">꽃</option>
                            <option value="content">관엽/대형</option>
                        </select>
                        <select name="searchOption" id="searchOption">
                            <option value="title">다육이/선인장</option>
                            <option value="content">선인장</option>
                            <option value="content">다육이</option>
                            <option value="content">에케베리아</option>
                        </select>
                        <select name="searchOption" id="searchOption">
                            <option value="title">관엽/공기정화 식물</option>
                            <option value="content">관엽식물</option>
                            <option value="content">공기정화식물</option>
                            <option value="content">기타 관엽식물</option>
                        </select>
                        <select name="searchOption" id="searchOption">
                            <option value="title">꽃 식물</option>
                            <option value="content">동백</option>
                            <option value="content">허브</option>
                        </select>
                        <select name="searchOption" id="searchOption">
                            <option value="title">관엽/대형 식물</option>
                            <option value="content">넝쿨류</option>
                            <option value="content">열매류</option>
                        </select>
                    </fieldset>
                </div>

                    <div class="card__inner">
                        <div class="card">
                            <div class="card__header">
                                <figure>
                                    <img src="../html/assets/img/plantmoa01.jpg" alt="몬스테라">
                                </figure>
                            </div>
                            <div class="card__contents">
                                <img src="../html/assets/img/plantMain_icon.svg" alt="식물모아 식물아이콘">
                                <h3>몬스테라</h3>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card__header">
                                <figure>
                                    <img src="../html/assets/img/plantmoa02.jpg" alt="싱고니움">
                                </figure>
                            </div>
                            <div class="card__contents">
                                <img src="../html/assets/img/plantMain_icon.svg" alt="식물모아 식물아이콘">
                                <h3>싱고니움</h3>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card__header">
                                <figure>
                                    <img src="../html/assets/img/plantmoa03.jpg" alt="시클라멘">
                                </figure>
                            </div>
                            <div class="card__contents">
                                <img src="../html/assets/img/plantMain_icon.svg" alt="식물모아 식물아이콘">
                                <h3>시클라멘</h3>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card__header">
                                <figure>
                                    <img src="../html/assets/img/plantmoa04.jpg" alt="금목서">
                                </figure>
                            </div>
                            <div class="card__contents">
                                <img src="../html/assets/img/plantMain_icon.svg" alt="식물모아 식물아이콘">
                                <h3>금목서</h3>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card__header">
                                <figure>
                                    <img src="../html/assets/img/plantmoa05.jpg" alt="메리골드">
                                </figure>
                            </div>
                            <div class="card__contents">
                                <img src="../html/assets/img/plantMain_icon.svg" alt="식물모아 식물아이콘">
                                <h3>메리골드</h3>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card__header">
                                <figure>
                                    <img src="../html/assets/img/plantmoa06.jpg" alt="채운각">
                                </figure>
                            </div>
                            <div class="card__contents">
                                <img src="../html/assets/img/plantMain_icon.svg" alt="식물모아 식물아이콘">
                                <h3>채운각</h3>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card__header">
                                <figure>
                                    <img src="../html/assets/img/plantmoa07.jpg" alt="글라우카">
                                </figure>
                                <div class="card__contents">
                                    <img src="../html/assets/img/plantMain_icon.svg" alt="식물모아 식물아이콘">
                                    <h3>글라우카</h3>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card__header">
                                <figure>
                                    <img src="../html/assets/img/plantmoa08.jpg" alt="라벤더">
                                </figure>
                            </div>
                            <div class="card__contents">
                                <img src="../html/assets/img/plantMain_icon.svg" alt="식물모아 식물아이콘">
                                <h3>라벤더</h3>
                            </div>
                        </div>
                    </div>
                
                <div class="board__pages">
                    <a href="#">&lt;&lt;</a>
                    <a href="#">&lt;</a>
                    <a class="active" href="#">1</a>
                    <a href="#">2</a>
                    <a href="#">3</a>
                    <a href="#">4</a>
                    <a href="#">5</a>
                    <a href="#">&gt;</a>
                    <a href="#">&gt;&gt;</a>
                </div>
            </div>
        </section>
        <!-- //plantmoa -->

    </main>
    <!-- //main -->

    <?php include "../include/footer.php" ?>
    <!-- footer -->
    <?php include "../login/login.php" ?>
    <!-- login팝업 -->
    <script src="../assets/js/login.js"></script>
</body>

</html>