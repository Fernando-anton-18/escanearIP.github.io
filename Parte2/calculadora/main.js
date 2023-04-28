var fechaHora = new Date();
var horas = fechaHora.getHours();
var minutos = fechaHora.getMinutes();
var año = fechaHora.getFullYear();
var mes = fechaHora.getMonth();
var dia = fechaHora.getDate();
var Meses = new Array("1","2","3","4","5","6","7","8","9","10","11","12");

if (horas < 10) { horas = '0' + horas; }
if (horas < 10) { minutos = '0' + minutos; }

document.getElementById("reloj").innerHTML = horas + ':' + minutos;
document.getElementById("fecha").innerHTML = dia+"/"+ Meses[mes]+"/"+ año;

let outputScreen = document.getElementById("outputScreen")
let resultado = document.getElementById("resultado")
function display(num){
    outputScreen.value += num
}
function Calculate(){
    try {
        resultado.value = eval(outputScreen.value);
    }
    catch (err) {
        alert("invalido")
    }
}
function Clear(){
    outputScreen.value = "";
    resultado.value = "";
}
function del(){
    outputScreen.value = outputScreen.value.slice(0,-1)
}
