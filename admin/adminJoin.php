<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원가입 정보입력</title>

    <?php include "../include/link.php" ?>
    
</head>
<body>
    <?php include "../include/header.php" ?>
    <!-- //header -->
    <main id="main">

        <section id="join_banner">
            <h2 class="blind">회원가입 페이지입니다.</h2>
            <div class="join_banner container">
                <div class="img">
                    <img src="../../html/assets/img/join_banner.svg" alt="배너이미지">
                </div>
                <h3>회원가입</h3>
                <p>회원가입 정보 입력</p>
            </div>
        </section>
        <!-- //banner -->

        <section id="join" class="container">
            <h2 class="blind">회원 가입</h2>
            <div class="join__inner">
                <form action="adminJoinSave.php" name="join" method="post" onsubmit="return joinChecks()" enctype="multipart/form-data"> 
                    <fieldset>
                        <legend class="blind">회원가입</legend>
                        <div class="join__box">
                            <div>
                                <label for="youFile">파일</label>
                                <input type="file" name="youFile" id="youFile" accept=".jpg, .jpeg, .png, .gif" placeholder="jpg, gif, png 파일만 넣어주세요" style="opacity: 1;">
                            </div>
                            <div>
                                <label for="youName">이름</label>
                                <input type="text" id="youName" name="youName" placeholder="이름을 입력하세요" required>
                                <p class="msg" id="youNameComment"></p>
                            </div>
                            <div class="overlap">
                                <label for="youEmail">이메일</label>
                                <input type="email" id="youEmail" name="youEmail" placeholder="이메일을 입력하세요." required>
                                <a href="#c" class="check" onclick="emailChecking()">중복검사</a>
                                <p class="msg" id="youEmailComment"></p>
                            </div>
                            <div class="overlap">
                                <label for="youNickName">닉네임</label>
                                <input type="text" id="youNickName" name="youNickName" placeholder="닉네임을 적어주세요!" autocomplete="off" required>
                                <a href="#c" class="check" onclick="nickChecking()">중복검사</a>
                                <p class="msg" id="youNickNameComment"></p>
                            </div>
                            <div>
                                <label for="youPass">비밀번호</label>
                                <input type="password" id="youPass" name="youPass" placeholder="비밀번호를 입력하세요." required>
                                <p class="msg" id="youPassComment"></p>
                            </div>
                            <div>
                                <label for="youPassC">비밀번호 확인</label>
                                <input type="password" id="youPassC" name="youPassC" placeholder="비밀번호를 한번 더 입력하세요." required>
                                <p class="msg" id="youPassCComment"></p>
                            </div>
                            <div>
                                <label for="youBirth">생년월일</label>
                                <input type="text" id="youBirth" name="youBirth" placeholder="YYYY-MM-DD" maxlength="15" autocomplete="off" required>
                                <p class="msg" id="youBirthComment"></p>
                            </div>
                            <div>
                                <label for="youPhone">휴대폰 번호</label>
                                <input type="text" id="youPhone" name="youPhone" placeholder="전화번호를 입력하세요." required>
                                <p class="msg" id="youPhoneComment"></p>
                            </div>
                        </div>
                        <button class="join__btn" type="submit">회원가입 완료</button>
                    </fieldset>
                </form>
            </div>
        </section>
        <!-- //join -->

    </main>
    <!-- //main -->

    <?php include "../include/footer.php" ?>
    <!-- //footer -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        let emailCheck = false;
        let nickCheck = false;

        function emailChecking(){
            let youEmail = $("#youEmail").val();

            if(youEmail == null || youEmail == ''){
                $("#youEmailComment").text("이메일을 입력해주세요");
            } else {
                $.ajax({
                    type: "POST",
                    url : "adminJoinCheck.php",
                    data : {"youEmail":youEmail, "type": "emailCheck"},
                    dataType : "json",

                    success : function(data){
                        if(data.result == "good"){
                            $("#youEmailComment").text("사용 가능한 이메일입니다.");
                            emailCheck = true;
                        } else {
                            $("#youEmailComment").text("이미 존재하는 이메일입니다.");
                            emailCheck = false;
                        }
                    },

                    error : function(request, status, error){
                        console.log("request" + request);
                        console.log("status" + status);
                        console.log("error" + error);
                    }
                })
            }
        }

        function nickChecking(){
            let youNickName = $("#youNickName").val();

            if(youEmail == null || youEmail == ''){
                $("#youNickNameComment").text("닉네임을 입력해주세요");
            } else {
                $.ajax({
                    type: "POST",
                    url : "adminJoinCheck.php",
                    data : {"youNickName":youNickName, "type": "nickCheck"},
                    dataType : "json",

                    success : function(data){
                        if(data.result == "good"){
                            $("#youNickNameComment").text("사용 가능한 닉네임입니다.");
                            nickCheck = true;
                        } else {
                            $("#youNickNameComment").text("이미 존재하는 닉네임입니다.");
                            nickCheck = false;
                        }
                    },

                    error : function(request, status, error){
                        console.log("request" + request);
                        console.log("status" + status);
                        console.log("error" + error);
                    }
                })
            }
        }

        function joinChecks(){
            // 이름 공백 검사
            if($("#youName").val() == ""){
                $("#youNameComment").text("이름을 입력해주세요!");
                return false;
            }

            // 이름 유효성 검사
            let getyouName = RegExp(/^[가-힣]+$/);
            if(!getyouName.test($("#youName").val())){
                $("#youNameComment").text("이름은 한글만 작성 가능합니다.");
                $("#youName").val("");
                return false;
            }

            // 이메일 공백 검사
            if($("#youEmail").val() == ""){
                $("#youEmailComment").text("이메일을 입력해주세요");
                return false;
            } 

            // 이메일 유효성 검사
            let getyouEmail = RegExp(/^[A-Za-z0-9_\.\-]+@[A-Za-z0-9\-]+\.[A-Za-z0-9\-]+/);
            if(!getyouEmail.test($("#youEmail").val())){
                $("#youEmailComment").text("이메일 형식에 맞게 작성해주세요!");
                $("#youEmail").val("");
                return false;
            }

            // 이메일 중복 검사
            if(emailCheck == false){
                $("#youEmailComment").text("이메일 중복 검사를 해주세요!");
                return false;
            }

            // 닉네임 공백 검사
            if($("#youNickName").val() == ""){
                $("#youNickNameComment").text("닉네임을 입력해주세요!");
                return false;
            }

            // 닉네임 유효성 검사
            let getyouNickName = RegExp(/^[가-힣|0-9]+$/);
            if(!getyouNickName.test($("#youNickName").val())){
                $("#youNickNameComment").text("닉네임은 한글 또는 숫자만 사용 가능합니다.");
                $("#youNickName").val("");
                return false;
            }

            // 닉네임 중복 검사
            if(nickCheck == false){
                $("#youNickNameComment").text("닉네임 중복 검사를 해주세요!");
                return false;
            }

            // 비밀번호 공백 검사
            if($("#youPass").val() == ""){
                $("#youPassComment").text("비밀번호를 입력해주세요!");
                return false;
            }

            // 비밀번호 유효성 검사
            let getyouPass = $("#youPass").val();
            let getyouPassNum = getyouPass.search(/[0-9]/g);
            let getyouPassEng = getyouPass.search(/[a-z]/ig);
            let getyouPassSpe = getyouPass.search(/[`~!@@#$%^&*|₩₩₩'₩";:₩/?]/gi);

            if(getyouPass.length < 8 || getyouPass.length > 20){
                $("#youPassComment").text("8자리 ~ 20자리 이내로 입력해주세요!");
                return false;
            } else if(getyouPass.search(/\s/) != -1){
                $("#youPassComment").text("비밀번호는 공백없이 입력해주세요!");
                return false;
            } else if(getyouPassNum < 0 || getyouPassEng < 0 || getyouPassSpe < 0){
                $("#youPassComment").text("영문, 숫자, 특수문자를 혼합하여 입력해주세요!");
                return false;
            }

            // 확인 비밀번호 공백 검사
            if($("#youPassC").val() == ""){
                $("#youPassCComment").text("확인 비밀번호를 입력해주세요!");
                return false;
            }

            // 비밀번호가 동일한지 체크
            if($("#youPass").val() !== $("#youPassC").val()){
                $("#youPassCComment").text("비밀번호가 동일하지 않습니다.");
                return false;
            }

            // 생년월일 공백 검사 
            if($("#youBirth").val() == ""){
                $("#youBirthComment").text("생년월일(YYYY-MM-DD) 입력해주세요!");
                return false;
            }

            // 생년월일 유효성 검사
            let getyouBirth = RegExp(/^(19[0-9][0-9]|20\d{2})-(0[0-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/);
            if(!getyouBirth.test($("#youBirth").val())){
                $("#youBirthComment").text("생년월일이 정확하지 않습니다. 올바른 생년월일(YYYY-MM-DD)을 적어주세요!");
                return false;
            }

            // 휴대폰 번호 공백 검사
            if($("#youPhone").val() == ""){
                $("#youPhoneComment").text("휴대폰번호(000-0000-0000)를 입력해주세요!");
                return false;
            }

            // 휴대폰 번호 유효성 검사
            let getyouPhone = RegExp(/01[016789]-[^0][0-9]{2,3}-[0-9]{3,4}/);
            if(!getyouPhone.test($("#youPhone").val())){
                $("#youPhoneComment").text("휴대폰 번호가 정확하지 않습니다. 올바른 휴대폰번호(000-0000-0000)를 입력해주세요!");
                $("#youPhone").val("");
                return false;
            }
        }
    </script>
    

</body>
</html>