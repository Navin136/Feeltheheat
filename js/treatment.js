
function calculate(){
    var pattern = document.getElementById("pattern").value;
    fetch(pattern,'treatment');
	let mtwt = document.getElementById("mtwt").value;
	let alloyp = document.getElementById("alloyp").value;
	let steelp = document.getElementById("steelp").value;
	let psilicon = document.getElementById("fesir").value;
	let pcopper = document.getElementById("copperr").value;
	let ptin = document.getElementById("tinr").value;
	let pmanganese = document.getElementById("manganeser").value;
	let mischmetal = document.getElementById("mischmetal").value;
	let laddition = document.getElementById("laddition").value;

	document.getElementById("fesia").value = hsi;
    document.getElementById("coppera").value = hcu;
    document.getElementById("tina").value = hsn;
    document.getElementById("manganesea").value = hmn;
	document.getElementById("mtwt").value = mtwt;
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