const buttonChangeColor = document.getElementById("buttonChangeColor");
const pChangeColor = document.getElementById("pChangeColor");
buttonChangeColor.addEventListener("click", function(){
   let color = pChangeColor.style.color=== "blue" ? "black" : "blue";
   pChangeColor.style.color = color;
});