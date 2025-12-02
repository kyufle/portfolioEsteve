let letra = document.getElementById('letra');
let letraRandom;

document.addEventListener('keydown',function(event){
    
    if (letraRandom === event.key) {
        letra.style.color = 'green';
    } else {
        letra.style.color = 'red';
    }
});


function escogerLetraRandom(){
    const abecedario = [
    'a', 'b', 'c', 'd', 'e', 'f', 'g',
    'h', 'i', 'j', 'k', 'l', 'm', 'n',
    'ñ', 'o', 'p', 'q', 'r', 's', 't',
    'u', 'v', 'w', 'x', 'y', 'z'
    ];

    let abecedarioRandom = Math.floor(Math.random() * abecedario.length);
    letraRandom = abecedario[abecedarioRandom];
    letra.innerText = letraRandom;
}

escogerLetraRandom();
