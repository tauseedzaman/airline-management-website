const closed=document.querySelector("#close");
const fixed=document.querySelector(".alert-fixed");
closed.addEventListener("click",function(){
    fixed.style.display="none";
})