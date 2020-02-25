var total = 0;

function calcularImc (){

    talla = document.getElementById("talla").value;
    peso = document.getElementById("peso").value;
	
    total = document.getElementById('imc').value;
    
    total = (total == null || total == undefined || total == "") ? 0 : total;
    talla_cm = parseInt(talla)/100 * parseInt(talla)/100;

    total = peso/talla_cm;
	
    document.getElementById('imc').innerHTML = total.toFixed(2);
    
    if(total<18.5){ dx_nutrition.innerHTML = "BAJO PESO"; }
	else if(total>=18.5 && total<=24.9){ dx_nutrition.innerHTML = "NORMOPESO"; }
	else if(total>=25 && total<=29.9){ dx_nutrition.innerHTML = "SOBREPESO"; }
    else if(total>=30 && total<= 34.99){ dx_nutrition.innerHTML = "OBESIDAD";}
    else if(total>=35 && total<= 39.99){ dx_nutrition.innerHTML = "OBESIDAD TIPO 2";}
    else if(total>40){ dx_nutrition.innerHTML = "OBESIDAD MORBIDA";}
    
}