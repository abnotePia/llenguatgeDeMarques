document.getElementById("convertir").addEventListener("click", function() {
	let euros = document.getElementById("euros").value;
	let tipoDivisa = document.getElementById("selector-divisa").value;
	let divisa = document.getElementById("divisa").value;
	let inversa = document.getElementById("inversa").checked;
	let conversion;
	let valorDivisa;
	let nombreDivisa;

	if (euros != "") {
		euros = parseFloat(euros);

		switch(tipoDivisa) {
			case "1":
				valorDivisa = 1.2;
				nombreDivisa = "Dólares";
				break;
			case "2":
				valorDivisa = 0.89;
				nombreDivisa = "Libras";
				break;
			default:
				valorDivisa = 126.1;
				nombreDivisa = "Yenes";
				break;
		}

		if (inversa) {
			conversion = divisa / valorDivisa;
			document.getElementById("euros").value = conversion;
		} else {
			conversion = euros * valorDivisa;
			document.getElementById("divisa").value = conversion;
		}
	} else{
		alert("Indica alguna cantidad de Euros");
	}

	let element = document.createElement("li");
	element.classList.add("list-group-item");
	element.classList.add("bg-info");
	element.innerText = euros + " Euros = " + divisa + " " + nombreDivisa;

	document.getElementById("historial").appendChild(element);

});

document.getElementById("selector-divisa").addEventListener("change", function() {
	let tipoDivisa = document.getElementById("selector-divisa").value;
	let objLabel = document.getElementById("label-divisa");
	let objSimbolo = document.getElementById("simbolo");

	if (tipoDivisa == "1") {
		objLabel.innerText = "Dólares";
		objSimbolo.src = "images/dolar.png";
	} else if (tipoDivisa == "2") {
		objLabel.innerText = "Libras esterlinas";
		objSimbolo.src = "images/libra.png";
	} else {	    			
		objLabel.innerText = "Yenes";
		objSimbolo.src = "images/yen.png";
	}
});

function asignaLg(obj) {
	obj.classList.add("form-control-lg");
}

function eliminaLg(obj) {
	obj.classList.remove("form-control-lg");
}

document.getElementById("convertir").addEventListener("mouseover", () => {
	this.className = "btn btn-warning";
});

document.getElementById("convertir").addEventListener("mouseout", () => {
	this.className = "btn btn-primary";
});

document.getElementById("historial").addEventListener("mouseenter", function(){
	let elementos = document.querySelectorAll("ul#historial li");

	for(let i = 0; i < elementos.length; i++) {
		elementos[i].classList.remove("bg-info");
		elementos[i].classList.add("bg-warning");
	}
});

document.getElementById("historial").addEventListener("mouseleave", function(){
	let elementos = document.getElementsByTagName("li");

	for(let i = 0; i < elementos.length; i++) {
		elementos[i].classList.remove("bg-warning");
		elementos[i].classList.add("bg-info");
	}
});