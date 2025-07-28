window.onload=calculate;
function calculate(){
	let alloyp = document.getElementById("alloyp").value;
	let coveringp = document.getElementById("coveringp").value;
	let mtwt = document.getElementById("mtwt").value;
	console.log(mtwt*alloyp/100);
	document.getElementById("alloyw").value = (mtwt*alloyp/100).toFixed(2);
	document.getElementById("steelw").value = (mtwt*coveringp/100).toFixed(2);
	let psilicon = document.getElementById("fesir").value;
	let pcopper = document.getElementById("copperr").value;
	let ptin = document.getElementById("tinr").value;
	let pmanganese = document.getElementById("manganeser").value;
	let pcarbon = document.getElementById("carbonr").value;
	let fesiActual = document.getElementById("fesia").value;
    let copperActual = document.getElementById("coppera").value;
    let tinActual = document.getElementById("tina").value;
    let manganeseActual = document.getElementById("manganesea").value;
    let carbonActual = document.getElementById("carbona").value;

	
	document.getElementById("fesiw").value = (((psilicon-fesiActual-(0.45*alloyp))*mtwt)/70).toFixed(1);
	if(document.getElementById("fesiw").value <= 0){
		document.getElementById("fesiw").value = 'NA';
	}
	document.getElementById("copperw").value = ((pcopper-copperActual)*mtwt/95).toFixed(1);
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
	document.getElementById("carbonw").value = ((pcarbon-carbonActual)*mtwt/90).toFixed(2);
	if(document.getElementById("carbonw").value <= 0){
		document.getElementById("carbonw").value = "NA";
	}
}