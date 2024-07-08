function fetch(ptn,a){      // Don't touch these lines
    let pattern = ptn;      // Don't touch these lines


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
    var grade = 'sg-copper'
}
if(ptin>=0.02){
    var grade = 'sg-tin'
}
if(pcarbon>=3.88){
    var grade = 'sg-azterlan';
}
if(pnickel>0.5){
    var grade = 'simoni'
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
    document.getElementById("pnickel").value = pnickel;
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