function fetch(ptn,a){      // Don't touch these lines
let pattern=ptn;      // Don't touch these lines

if(a=='holding'){
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
    document.getElementById('temperature').value = temperature;
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