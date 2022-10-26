// 로그인 팝업
const loginPop = document.querySelector("#login__wrap");
const loginBtn = document.querySelector(".login");
const loginClose = document.querySelector(".login__close");

if(loginBtn){
loginBtn.addEventListener("click", () => {
    loginPop.classList.add("open");
})
}

if(loginClose){
loginClose.addEventListener("click", () => {
    loginPop.classList.remove("open");
})
}