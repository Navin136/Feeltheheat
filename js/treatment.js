
function calculate(){
	// hsi = document.getElementById("fesia").value;
	// hcu = document.getElementById("coppera").value;
	// hsn = document.getElementById("tina").value;
	// hmn = document.getElementById("manganesea").value;
	document.getElementById("fesia").value = hsi;
    document.getElementById("coppera").value = hcu;
    document.getElementById("tina").value = hsn;
    document.getElementById("manganesea").value = hmn;
	document.getElementById("pattern").value = pattern;
	document.getElementById("mtwt").value = mtwt;
	document.getElementById("alloyp").value = alloyp;
	document.getElementById("steelp").value = steelp;
	document.getElementById("fesir").value = psilicon;
	document.getElementById("copperr").value = pcopper;
	document.getElementById("tinr").value = ptin;
	document.getElementById("manganeser").value = pmanganese;
	document.getElementById("alloyw").value = (mtwt*alloyp*0.01).toFixed(2);
	document.getElementById("steelw").value = (mtwt*steelp*0.01).toFixed(2);
	let fesiActual = hsi;
	document.getElementById("fesiw").value = (((psilicon-fesiActual-(0.45*alloyp))*mtwt)/70).toFixed(2);
	if(document.getElementById("fesiw").value <= 0){
		document.getElementById("fesiw").value = 'NA';
	}
	let copperActual = hcu;
	document.getElementById("copperw").value = ((pcopper-copperActual)*mtwt/95).toFixed(2);
	if(document.getElementById("copperw").value <= 0){
		document.getElementById("copperw").value = 'NA';
	}
	let tinActual = hsn;
	document.getElementById("tinw").value = ((ptin-tinActual)*mtwt/95).toFixed(3);
	if(document.getElementById("tinw").value <= 0){
		document.getElementById("tinw").value = 'NA';
	}
	let manganeseActual = hmn;
	document.getElementById("manganesew").value = ((pmanganese-manganeseActual)*mtwt/68).toFixed(2);
	if(document.getElementById("manganesew").value <= 0){
		document.getElementById("manganesew").value = 'NA';
	}
	document.getElementById("mischmetal").value = mischmetal;
	document.getElementById("laddition").value = laddition;
}