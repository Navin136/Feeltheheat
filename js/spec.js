function fetch(ptn,a){      // Don't touch these lines
let pattern=ptn;      // Don't touch these lines


// Master data Starts here
//7654
if(pattern == '7654'){
    var pcarbon = 3.90;
    var psilicon = 2.15;
    var pcopper = 0.15;
    var ptin = 0.024;
    var pmanganese = 0.28;
    var pmolybdenum = 0.01;
    var pnickel = 0.015;
    var pmagnesium = 0.038;
    var laddition = 'NA';
    var inoculant = 'Reseed';
    var flowrate = 6.8;
    var temperature = '1400-1415';
    var taddition = 'NA';
    var mtwt = 1500;
}
if(pattern == '7297'){
    var pcarbon = 3.25;
    var psilicon = 3.85;
    var pcopper = 0.08;
    var ptin = 0.008;
    var pmanganese = 0.28;
    var pmolybdenum = 0.55;
    var pnickel = 0.01;
    var pmagnesium = 0.035;
    var laddition = 'NA';
    var inoculant = 'Zircseed';
    var flowrate = 3.3;
    var temperature = '1390-1405';
    var taddition = '0.05% Superseed';
    var mtwt = 1700;
}
//7470-5
if(pattern == '7470-5'){
    var pcarbon = 3.65;
    var psilicon = 2.25;
    var pcopper = 0.18;
    var ptin = 0.025;
    var pmanganese = 0.28;
    var pmolybdenum = 0.01;
    var pnickel = 0.015;
    var pmagnesium = 0.038;
    var laddition = '0.05% Bacal';
    var inoculant = 'Barinoc';
    var flowrate = 7.0;
    var temperature = '1395-1410';
    var taddition = '0.05% Ultraseed';
    var mtwt = 1700;
}
//7278
if(pattern == '7278'){
    var pcarbon = 3.15;
    var psilicon = 4.65;
    var pcopper = 0.10;
    var ptin = 0.010;
    var pmanganese = 0.28;
    var pmolybdenum = 0.55;
    var pnickel = 0.58;
    var ptitanium = 0.07;
    var pmagnesium = 0.015;
    var laddition = '0.05% Fesi Granules';
    var inoculant = 'Fesi';
    var flowrate = 4.2;
    var temperature = '1400-1420';
    var taddition = 'NA';
    var mtwt = 1500;
}
//some useful functions

if(pcopper>=0.20){
    var grade = 'sg-copper';
    // document.querySelector("#lptitanium").style.visibility = 'hidden';
    // document.querySelector("#ptitanium").style.visibility = 'hidden';
    // document.querySelector("#lpmolybdenum").style.visibility = 'hidden';
    // document.querySelector("#pmolybdenum").style.visibility = 'hidden';
    // document.querySelector(".niclass").style.visibility = 'hidden';
    // document.querySelector(".moclass").style.visibility = 'hidden';
    // document.querySelector(".ticlass").style.visibility = 'hidden';
}
if(ptin>=0.02){
    var grade = 'sg-tin';
    
}
if(pcarbon>=3.88){
    var grade = 'sg-azterlan';
}
if(pnickel>0.5){
    var grade = 'simoni';
    // document.querySelector("#lpcopper").style.visibility = 'hidden';
    // document.querySelector("#pcopper").style.visibility = 'hidden';
    // document.querySelector("#lptin").style.visibility = 'hidden';
    // document.querySelector("#ptin").style.visibility = 'hidden';
    // document.querySelector(".cuclass").style.visibility = 'hidden';
    // document.querySelector(".snclass").style.visibility = 'hidden';
    // document.querySelector(".mnclass").style.visibility = 'hidden';
}
if(pmolybdenum>0.3 && pmolybdenum<0.6 && pnickel<0.5){
    var grade = 'sg-lowmoly';
    // document.querySelector("#lpcopper").style.visibility = 'hidden';
    // document.querySelector("#pcopper").style.visibility = 'hidden';
    // document.querySelector("#lptin").style.visibility = 'hidden';
    // document.querySelector("#ptin").style.visibility = 'hidden';
    // document.querySelector("#lptitanium").style.visibility = 'hidden';
    // document.querySelector("#ptitanium").style.visibility = 'hidden';
    // document.querySelector(".ticlass").style.visibility = 'hidden';
    // document.querySelector(".niclass").style.visibility = 'hidden';
    // document.querySelector(".cuclass").style.visibility = 'hidden';
    // document.querySelector(".snclass").style.visibility = 'hidden';
}
if(pmolybdenum>0.6 && pnickel<0.5){
    var grade = 'sg-highmoly';
    // document.querySelector("#lpcopper").style.visibility = 'hidden';
    // document.querySelector("#pcopper").style.visibility = 'hidden';
    // document.querySelector("#lptin").style.visibility = 'hidden';
    // document.querySelector("#ptin").style.visibility = 'hidden';
    // document.querySelector("#lptitanium").style.visibility = 'hidden';
    // document.querySelector("#ptitanium").style.visibility = 'hidden';
    // document.querySelector(".ticlass").style.visibility = 'hidden';
    // document.querySelector(".niclass").style.visibility = 'hidden';
    // document.querySelector(".cuclass").style.visibility = 'hidden';
    // document.querySelector(".snclass").style.visibility = 'hidden';
}
if(pmagnesium>=0.03){
    var alloyp = 0.92;
    var steelp = 0.8;
    var mischmetal = 0;
}else{
    var alloyp = 0.31;
    var steelp = 1;
    var mischmetal = '300 Grams';
}
if(a=='holding'){
    document.getElementById("pattern").value = pattern;
    document.getElementById("pcarbon").value = pcarbon;
    document.getElementById("psilicon").value = (psilicon - 0.45 * alloyp).toFixed(2);
    document.getElementById("pcopper").value = pcopper;
    document.getElementById("ptin").value = ptin;
    document.getElementById("pmanganese").value = pmanganese;
    document.getElementById("pmolybdenum").value = pmolybdenum;
    document.getElementById("ptitanium").value = ptitanium;
    document.getElementById("pnickel").value = pnickel;
    if(grade == 'sg-tin' || grade == 'sg-copper'|| grade == 'sg-azterlan'){
        document.querySelector(".niclass").style.visibility = 'hidden';
        document.querySelector(".moclass").style.visibility = 'hidden';
        document.querySelector(".ticlass").style.visibility = 'hidden';
        document.querySelector("#lptitanium").style.visibility = 'hidden';
        document.querySelector("#ptitanium").style.visibility = 'hidden';
        document.querySelector("#lpnickel").style.visibility = 'hidden';
        document.querySelector("#pnickel").style.visibility = 'hidden';
        document.querySelector("#lpmolybdenum").style.visibility = 'hidden';
        document.querySelector("#pmolybdenum").style.visibility = 'hidden';
    }
    if(grade == 'sg-highmoly' || grade == 'sg-lowmoly'){
        document.querySelector(".mnclass").style.visibility = 'hidden';
        document.querySelector(".mnclass").style.height = '0px';
        document.querySelector(".niclass").style.visibility = 'hidden';
        document.querySelector(".ticlass").style.visibility = 'hidden';
        document.querySelector("#lptitanium").style.visibility = 'hidden';
        document.querySelector("#ptitanium").style.visibility = 'hidden';
        document.querySelector("#lpnickel").style.visibility = 'hidden';
        document.querySelector("#pnickel").style.visibility = 'hidden';
    }
    
}
if(a=='treatment'){
    document.getElementById("pattern").value = pattern;
    document.getElementById("alloyp").value = alloyp;
	document.getElementById("steelp").value = steelp;
	document.getElementById("fesir").value = psilicon;
	document.getElementById("copperr").value = pcopper;
	document.getElementById("tinr").value = ptin;
	document.getElementById("manganeser").value = pmanganese;
    document.getElementById("mischmetal").value = mischmetal;
	document.getElementById("laddition").value = laddition;
    document.getElementById("mtwt").value = mtwt;
}
if(a=='nodlab'){
    document.getElementById("pattern").value = pattern;
    document.getElementById('inoculant').value = inoculant;
    document.getElementById('temperature').value = temperature;
    document.getElementById('flowrate').value = flowrate;
    document.getElementById('taddition').value = taddition;
}
if(a=='melting'){
    document.getElementById("pattern").value = pattern;
    document.getElementById("grade").value = grade;
    document.getElementById("pcarbon").value = pcarbon;
    document.getElementById("psilicon").value = (psilicon - 0.45 * alloyp).toFixed(2);
    document.getElementById("pcopper").value = pcopper;
    document.getElementById("ptin").value = ptin;
    document.getElementById("pmanganese").value = pmanganese;
    document.getElementById("pmolybdenum").value = pmolybdenum;
    document.getElementById("pnickel").value = pnickel;
}

}