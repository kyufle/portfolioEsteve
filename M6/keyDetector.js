
console.log(text);
document.addEventListener('keydown',function(event){
    let tecla = event.key;
    document.getElementById('text').innerText += " " +tecla + " ,";
});

