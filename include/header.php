<header id="header">
    <div class="header__inner container">
        <div class="logo">
            <figure>
                <img src="../assets/img/logo.png" alt="로고이미지">
            </figure>
        </div>
        <div class="right">
            <div class="signIn">
                <?php if( isset($_SESSION['myMemberID'])){ ?>
                    <span><a href="../login/logout.php" class="login">로그아웃</a></span>
                    <span class="myPage"><a href="#">마이페이지</a></span>
                <?php } else { ?>
                    <span><a href="#" class="login">Sign In</a></span>
                    <span class="myPage"><a href="#">마이페이지</a></span>
                <?php } ?> 
                <!-- <span class="login"><a href="login.html">Sign In</a></span>
                <span class="myPage"><a href="#">마이페이지</a></span> -->
            </div>
            <nav class="nav">
                <ul>
                    <li><a href="#"><span>식물모아</span></a></li>
                    <li><a href="#"><span>칼럼</span></a></li>
                    <li><a href="#"><span>스토리</span></a></li>
                    <li><a href="#"><span>스토어</span></a></li>
                </ul>
            </nav>
        </div>
    </div>
</header>
<!-- header -->