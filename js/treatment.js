function calculate(){
	metalWeight = document.getElementById("mtwt").value;
	alloyPercentage = document.getElementById("alloyp").value;
	steelPercentage = document.getElementById("steelp").value;
	document.getElementById("alloyw").value = (metalWeight*alloyPercentage*0.01).toFixed(2);
	document.getElementById("steelw").value = (metalWeight*steelPercentage*0.01).toFixed(2);
	fesiActual = document.getElementById("fesia").value;
	fesiRequired = document.getElementById("fesir").value;
	document.getElementById("fesiw").value = (((fesiRequired-fesiActual-(0.45*alloyPercentage))*metalWeight)/70).toFixed(2);
	copperActual = document.getElementById("coppera").value;
	copperRequired = document.getElementById("copperr").value;
	document.getElementById("copperw").value = ((copperRequired-copperActual)*metalWeight/95).toFixed(2);
	tinActual = document.getElementById("tina").value;
	tinRequired = document.getElementById("tinr").value;
	document.getElementById("tinw").value = ((tinRequired-tinActual)*metalWeight/95).toFixed(3);
	manganeseActual = document.getElementById("manganesea").value;
	manganeseRequired = document.getElementById("manganeser").value;
	document.getElementById("manganesew").value = ((manganeseRequired-manganeseActual)*metalWeight/68).toFixed(2);
}