const buttonDisappear = document.getElementById("buttonDisappear");
const divDisappear = document.getElementById("divDisappear");

buttonDisappear.addEventListener("click",function(){
    let display = divDisappear.style.display === "none" ? "block" : "none";
    console.log(display);
    divDisappear.style.display = display;
    
});