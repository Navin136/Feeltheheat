let furnaceweight = 6000;
window.onload = chargemix;
function chargemix(){
    fetch(localStorage.getItem("pattern"),'melting');
    let grade = document.getElementById("grade").value;

    // variables for pattern specific chemistry
    let pcarbon = document.getElementById("pcarbon").value;
    let psilicon = document.getElementById("psilicon").value;
    let pcopper = document.getElementById("pcopper").value;
    let ptin = document.getElementById("ptin").value;
    let pmanganese = document.getElementById("pmanganese").value;
    let pmolybdenum = document.getElementById("pmolybdenum").value;
    let pnickel = document.getElementById("pnickel").value;

    if(grade == "sg-tin"){
        document.getElementById("psteel").value = 35;
        document.getElementById("preturns").value = 65;
        document.getElementById("pborings").value = 0;
        document.getElementById("ppigiron").value = 0;
        var rcarbon = 3.55;
        var rsilicon = 2.3;
    }
    if(grade == "sg-copper"){
        document.getElementById("psteel").value = 37;
        document.getElementById("preturns").value = 60;
        document.getElementById("pborings").value = 0;
        document.getElementById("ppigiron").value = 3;
        var rcarbon = 3.55;
        var rsilicon = 2.35;
    }
    if(grade == "sg-azterlan"){
        document.getElementById("psteel").value = 38;
        document.getElementById("preturns").value = 62;
        document.getElementById("pborings").value = 0;
        document.getElementById("ppigiron").value = 0;
        var rcarbon = 3.6;
        var rsilicon = 2.2;
    }
    if(grade == "sg-lowmoly"){
        document.getElementById("psteel").value = 30;
        document.getElementById("preturns").value = 70;
        document.getElementById("pborings").value = 0;
        document.getElementById("ppigiron").value = 0;
        var rcarbon = 3.25;
        var rsilicon = 3.95;
        var rmolybdenum = 0.55;
    }
    if(grade == "sg-highmoly"){
        document.getElementById("psteel").value = 30;
        document.getElementById("preturns").value = 70;
        document.getElementById("pborings").value = 0;
        document.getElementById("ppigiron").value = 0;
        var rcarbon = 3.25;
        var rsilicon = 3.95;
        var rmolybdenum = 0.85;
    }
    if(grade == "cg-moly"){
        document.getElementById("psteel").value = 15;
        document.getElementById("preturns").value = 85;
        document.getElementById("pborings").value = 0;
        document.getElementById("ppigiron").value = 0;
        var rcarbon = 3.10;
        var rsilicon = 4.45;
        var rmolybdenum = 0.60;
    }
    if(grade == "simoni"){
        document.getElementById("psteel").value = 10;
        document.getElementById("preturns").value = 90;
        document.getElementById("pborings").value = 0;
        document.getElementById("ppigiron").value = 0;
        var rcarbon = 3.15;
        var rsilicon = 4.45;
        var rmolybdenum = 0.60;
        var rnickel = 0.58;
    }
    document.getElementById("wsteel").value=document.getElementById("psteel").value*furnaceweight/100;
    document.getElementById("wreturns").value=document.getElementById("preturns").value*furnaceweight/100;
    document.getElementById("wborings").value=document.getElementById("pborings").value*furnaceweight/100;
    document.getElementById("wpigiron").value=document.getElementById("ppigiron").value*furnaceweight/100;
    let ncgain = document.querySelector(".maddn").value*90/furnaceweight;
    let hcgain = document.querySelector(".maddh").value*60/furnaceweight;
    let bathcarbon = ((document.getElementById("wsteel").value*0.01+document.getElementById("wreturns").value*rcarbon+document.getElementById("wborings").value*rcarbon+document.getElementById("wpigiron").value*4)/furnaceweight+ncgain+hcgain).toFixed(2);
    let bathsilicon = ((document.getElementById("wsteel").value*0.01+document.getElementById("wreturns").value*rsilicon+document.getElementById("wborings").value*rsilicon+document.getElementById("wpigiron").value*2)/furnaceweight).toFixed(2);
    let haddition = ((pcarbon-bathcarbon)*furnaceweight/60).toFixed(2);
    let naddition = ((pcarbon-bathcarbon)*furnaceweight/90).toFixed(2);
    let fesiaddition = ((psilicon-bathsilicon)*furnaceweight/70).toFixed(2);
    if(grade == "sg-tin" || grade =="sg-copper" || grade =="sg-azterlan"){
        document.querySelector(".result").innerHTML = `Bath carbon is <b>${bathcarbon}%</b>.<br>Bath silicon is <b>${bathsilicon}%</b>.<br> You need to add <b>${haddition} Kgs</b> of Hi-Carbon or <b>${naddition} Kgs</b> of Neograf <br> You need to add <b>${fesiaddition} Kgs</b> of FerroSilicon to achieve required chemistry`;
    }
    if(grade == "sg-lowmoly" || grade == "sg-highmoly" || grade == "cg-moly"){
        let bathmolybdenum = ((document.getElementById("wsteel").value*0.01+document.getElementById("wreturns").value*rmolybdenum)/furnaceweight).toFixed(2);
        let femoaddition = ((pmolybdenum-bathmolybdenum)*furnaceweight/60).toFixed(2)
        document.querySelector(".result").innerHTML = `Bath carbon is <b>${bathcarbon}%</b>.<br>Bath silicon is <b>${bathsilicon}%</b>.<br>Bath molybdenum is <b>${bathmolybdenum}%</b>.<br> You need to add <b>${haddition} Kgs</b>  of Hi-Carbon<br> You need to add <b>${fesiaddition}</b> Kgs of FerroSilicon<br> You need to add <b>${femoaddition} Kgs</b> of FerroMolybdenum to achieve required chemistry`;
    }
    if(grade == "simoni"){
        let bathmolybdenum = ((document.getElementById("wsteel").value*0.01+document.getElementById("wreturns").value*rmolybdenum)/furnaceweight).toFixed(2);
        let femoaddition = ((pmolybdenum-bathmolybdenum)*furnaceweight/60).toFixed(2)
        let bathnickel = ((document.getElementById("wsteel").value*0.01+document.getElementById("wreturns").value*rnickel)/furnaceweight).toFixed(2); 
        let niaddition = ((pnickel-bathnickel)*furnaceweight/95).toFixed(2)
        document.querySelector(".result").innerHTML = `Bath carbon is </b>${bathcarbon}%</b>.<br>Bath silicon is <b>${bathsilicon}%</b>.<br>Bath molybdenum is <b>${bathmolybdenum}%</b>.<br> You need to add <b>${haddition} Kgs</b>  of Hi-Carbon<br> You need to add <b>${fesiaddition}</b> Kgs of FerroSilicon<br> You need to add <b>${femoaddition} Kgs</b> of FerroMolybdenum<br>Bath Nickel is ${bathnickel}%.<br> You need to add <b>${niaddition} Kgs</b> of Pure Nickel to achieve required chemistry`;
    }
}
