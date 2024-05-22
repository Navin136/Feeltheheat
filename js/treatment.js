function calculate(){
	metalWeight = document.getElementById("mtwt").value;
	if(metalWeight==''){
		alert("Enter Metal Weight !!");
	}
	alloyPercentage = document.getElementById("alloyp").value;
	steelPercentage = document.getElementById("steelp").value;
	document.getElementById("alloyw").value = metalWeight*alloyPercentage*0.01;
	document.getElementById("steelw").value = metalWeight*steelPercentage*0.01;
	fesiActual = document.getElementById("fesia").value;
	fesiRequired = document.getElementById("fesir").value;
	document.getElementById("fesiw").value = ((fesiRequired-fesiActual-(0.45*alloyPercentage))*metalWeight)/70;
	copperActual = document.getElementById("coppera").value;
	copperRequired = document.getElementById("copperr").value;
	document.getElementById("copperw").value = (copperRequired-copperActual)*metalWeight/95;
	tinActual = document.getElementById("tina").value;
	tinRequired = document.getElementById("tinr").value;
	document.getElementById("tinw").value = (tinRequired-tinActual)*metalWeight/95;
	manganeseActual = document.getElementById("manganesea").value;
	manganeseRequired = document.getElementById("manganeser").value;
	document.getElementById("manganesew").value = (manganeseRequired-manganeseActual)*metalWeight/68;
}