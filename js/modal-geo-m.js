let modal = document.getElementById('miModal');
let flex = document.getElementById('flex');
let arequipa = document.getElementById('arequipa');
let cerrar = document.getElementById('close');

arequipa.addEventListener('click', function(){
    modal.style.display = 'block';
});

cerrar.addEventListener('click', function(){
    modal.style.display = 'none';
});

window.addEventListener('click', function(e){
    console.log(e.target);
    if(e.target == flex){
        modal.style.display = 'none';
    }
});

/************************************************************************** */


let modal2 = document.getElementById('miModal2');
let flex2 = document.getElementById('flex2');
let tacna = document.getElementById('tacna');
let cerrar2 = document.getElementById('close2');


tacna.addEventListener('click', function(){
    modal2.style.display = 'block';
});

cerrar2.addEventListener('click', function(){
    modal2.style.display = 'none';
});

window.addEventListener('click', function(e){
    console.log(e.target);
    if(e.target == flex2){
        modal2.style.display = 'none';
    }
});

/************************************************************************** */


let modal3 = document.getElementById('miModal3');
let flex3 = document.getElementById('flex3');
let juliaca = document.getElementById('juliaca');
let cerrar3 = document.getElementById('close3');


juliaca.addEventListener('click', function(){
    modal3.style.display = 'block';
});

cerrar3.addEventListener('click', function(){
    modal3.style.display = 'none';
});

window.addEventListener('click', function(e){
    console.log(e.target);
    if(e.target == flex3){
        modal3.style.display = 'none';
    }
});

/************************************************************************** */


let modal4 = document.getElementById('miModal4');
let flex4 = document.getElementById('flex4');
let huancayo = document.getElementById('huancayo');
let cerrar4 = document.getElementById('close4');


huancayo.addEventListener('click', function(){
    modal4.style.display = 'block';
});

cerrar4.addEventListener('click', function(){
    modal4.style.display = 'none';
});

window.addEventListener('click', function(e){
    console.log(e.target);
    if(e.target == flex4){
        modal4.style.display = 'none';
    }
});





