function calculate(){
	let mg = document.getElementById('mg').value;
	if(mg>=0.03){
		console.log("Part is SG");
	}else{
		console.log("Part is CG");
	}
	let mtwt = document.getElementById("mtwt").value;
	let alloyp = document.getElementById("alloyp").value;
	let steelp = document.getElementById("steelp").value;
	let psilicon = document.getElementById("fesir").value;
	let pcopper = document.getElementById("copperr").value;
	let ptin = document.getElementById("tinr").value;
	let pmanganese = document.getElementById("manganeser").value;
	let fesiActual = document.getElementById("fesia").value;
    let copperActual = document.getElementById("coppera").value;
    let tinActual = document.getElementById("tina").value;
    let manganeseActual = document.getElementById("manganesea").value;
	document.getElementById("mtwt").value = mtwt;
	document.getElementById("alloyw").value = (mtwt*alloyp*0.01).toFixed(2);
	document.getElementById("steelw").value = (mtwt*steelp*0.01).toFixed(2);
	document.getElementById("fesiw").value = (((psilicon-fesiActual-(0.45*alloyp))*mtwt)/70).toFixed(2);
	if(document.getElementById("fesiw").value <= 0){
		document.getElementById("fesiw").value = 'NA';
	}
	document.getElementById("copperw").value = ((pcopper-copperActual)*mtwt/95).toFixed(2);
	if(document.getElementById("copperw").value <= 0){
		document.getElementById("copperw").value = 'NA';
	}
	document.getElementById("tinw").value = ((ptin-tinActual)*mtwt/95).toFixed(3);
	if(document.getElementById("tinw").value <= 0){
		document.getElementById("tinw").value = 'NA';
	}
	document.getElementById("manganesew").value = ((pmanganese-manganeseActual)*mtwt/68).toFixed(2);
	if(document.getElementById("manganesew").value <= 0){
		document.getElementById("manganesew").value = 'NA';
	}
}