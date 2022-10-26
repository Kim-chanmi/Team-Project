<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>마이페이지</title>

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
                <a href="myProfile.php" class="myProfile">
                    <img src="../html/assets/img/myProfile.jpg" alt="">
                    <p class="nickname">NICKNAME</p>
                    <p class="name">NAME</p>
                </a>
                <div class="mypage__sel">
                    <div class="mypage__sel__top">
                        <a href="myWrite.php" class="myWrite">
                            <div class="myWrite-icon"></div>
                            <p>작성 글</p>
                        </a>
                        <a href="myComment.php" class="myComment">
                            <div class="myComment-icon"></div>
                            <p>작성 댓글</p>
                        </a>
                        <a href="myLike.php" class="myLike">
                            <div class="myLike-icon"></div>
                            <p>좋아요</p>
                        </a>
                    </div>
                    <div class="myPage__num">
                        <p class="title">개인정보를 변경할 수 있습니다.</p>
                    </div>
                </div>
            </div>
            <div class="myChange__inner">
                <form action="???.php" name="join" method="post" onsubmit="return joinChecks()"
                    enctype="multipart/form-data">
                    <fieldset>
                        <div class="change__box">
                            <div class="myChange">
                                <div class="sel">
                                    <div class="profile-icon"></div>
                                    <div class="text">
                                        <p class="title">프로필 변경</p>
                                        <p class="p">프로필을 변경합니다.</p>
                                    </div>
                                </div>
                                <div class="put">
                                    <label for="youProfile" class="input-profile-button">이미지를 선택해주세요</label>
                                    <input type="file" name="youProfile" id="youProfile"
                                        accept=".jpg, .jpeg, .png, .gif" placeholder="이미지를 선택해주세요">
                                    <button type="button"><em>변경</em></button>
                                </div>
                            </div>
                            <div class="myChange">
                                <div class="sel">
                                    <div class="youPhone-icon"></div>
                                    <div class="text">
                                        <p class="title">연락처 변경</p>
                                        <p class="p">연락처를 변경합니다.</p>
                                    </div>
                                </div>
                                <div class="put">
                                    <input class="input" type="text" id="youPhone" name="youPhone"
                                        placeholder="전화번호를 입력해주세요">
                                    <button type="button"><em>변경</em></button>
                                </div>
                            </div>
                            <div class="myChange">
                                <div class="sel">
                                    <div class="youNickName-icon"></div>
                                    <div class="text">
                                        <p class="title">닉네임 변경</p>
                                        <p class="p">닉네임를 변경합니다.</p>
                                    </div>
                                </div>
                                <div class="put">
                                    <input class="input" type="text" id="youNickName" name="youNickName"
                                        placeholder="닉네임를 입력해주세요" autocomplete="off">
                                    <button type="button" class="check" onclick="nickChecking()"><em>변경</em></button>
                                </div>
                            </div>
                            <div class="myChange">
                                <div class="sel">
                                    <div class="youEmail-icon"></div>
                                    <div class="text">
                                        <p class="title">이메일 변경</p>
                                        <p class="p">이메일을 변경합니다.</p>
                                    </div>
                                </div>
                                <div class="put">
                                    <input class="input" type="email" id="youEmail" name="youEmail"
                                        placeholder="아이디를 입력해주세요">
                                    <button type="button" class="check" onclick="emailChecking()"><em>변경</em></button>
                                </div>
                            </div>
                            <div class="myChange">
                                <div class="sel">
                                    <div class="youPass-icon"></div>
                                    <div class="text">
                                        <p class="title">비밀번호 변경</p>
                                        <p class="p">비밀번호를 변경합니다.</p>
                                    </div>
                                </div>
                                <div class="put">
                                    <input class="input" type="password" id="youPass" name="youPass"
                                        placeholder="비밀번호를 입력해주세요">
                                    <button type="button"><em>변경</em></button>
                                </div>
                            </div>
                            <div class="myChange">
                                <div class="sel">
                                    <div class="youPassC-icon"></div>
                                    <div class="text">
                                        <p class="title">비밀번호 변경 확인</p>
                                        <p class="p">변경 된 비밀번호를 확인합니다.</p>
                                    </div>
                                </div>
                                <div class="put">
                                    <input class="input" type="password" id="youPassC" name="youPassC"
                                        placeholder="비밀번호를 입력해주세요">
                                    <button type="button"><em>변경</em></button>
                                </div>
                            </div>
                            <div class="button">
                                <button class="secession__btn" type="submit">탈퇴</button>
                                <button class="myChange__btn" type="submit">저장</button>
                            </div>
                        </div>
                    </fieldset>
                </form>


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