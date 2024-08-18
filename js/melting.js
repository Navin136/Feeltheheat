let furnaceweight = 6000;
window.onload = chargemix;
function chargemix(){

    // variables for pattern specific chemistry
    let reqcarbon = document.getElementById("reqcarbon").value;
    let reqsilicon = document.getElementById("reqsilicon").value;
    let reqcopper = document.getElementById("reqcopper").value;
    let reqtin = document.getElementById("reqtin").value;
    let reqmanganese = document.getElementById("reqmanganese").value;
    let reqmolybdenum = document.getElementById("reqmolybdenum").value;
    let reqnickel = document.getElementById("reqnickel").value;

    if(reqcopper>=0.20){
        var grade = 'sg-copper';
    }
    if(reqtin>=0.02){
        var grade = 'sg-tin';
    }
    if(reqcarbon>=3.88){
        var grade = 'sg-azterlan';
    }
    if(reqnickel>0.5){
        var grade = 'simoni';
    }
    if(reqmolybdenum>0.3 && reqmolybdenum<0.6 && reqnickel<0.5){
        var grade = 'sg-lowmoly';
    }
    if(reqmolybdenum>0.6 && reqnickel<0.5){
        var grade = 'sg-highmoly';
    }
    if(grade == "sg-tin"){
        document.getElementById("psteel").value = 35;
        document.getElementById("preturns").value = 65;
        document.getElementById("pborings").value = 0;
        document.getElementById("ppigiron").value = 0;
        var rcarbon = 3.6;
        var rsilicon = 2.3;
        var rtin = 0.02;
        var rcopper = 0.12;
        var rmanganese = 0.28;
    }
    if(grade == "sg-copper"){
        document.getElementById("psteel").value = 37;
        document.getElementById("preturns").value = 60;
        document.getElementById("pborings").value = 0;
        document.getElementById("ppigiron").value = 3;
        var rcarbon = 3.6;
        var rsilicon = 2.35;
        var rtin = 0.010;
        var rcopper = 0.2;
        var rmanganese = 0.28;
    }
    if(grade == "sg-azterlan"){
        document.getElementById("psteel").value = 38;
        document.getElementById("preturns").value = 62;
        document.getElementById("pborings").value = 0;
        document.getElementById("ppigiron").value = 0;
        var rcarbon = 3.6;
        var rsilicon = 2.2;
        var rtin = 0.02;
        var rcopper = 0.1;
        var rmanganese = 0.25;
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
        var rsilicon = 4.6;
        var rmolybdenum = 0.60;
        var rnickel = 0.60;
    }
    document.getElementById("grade").value = grade;
    document.getElementById("wsteel").value=document.getElementById("psteel").value*furnaceweight/100;
    document.getElementById("wreturns").value=document.getElementById("preturns").value*furnaceweight/100;
    document.getElementById("wborings").value=document.getElementById("pborings").value*furnaceweight/100;
    document.getElementById("wpigiron").value=document.getElementById("ppigiron").value*furnaceweight/100;
    let ncgain = document.querySelector(".maddn").value*90/furnaceweight;
    let hcgain = document.querySelector(".maddh").value*60/furnaceweight;
    let bathcarbon = ((document.getElementById("wsteel").value*0.01+document.getElementById("wreturns").value*rcarbon+document.getElementById("wborings").value*rcarbon+document.getElementById("wpigiron").value*4)/furnaceweight+ncgain+hcgain).toFixed(2);
    let bathsilicon = ((document.getElementById("wsteel").value*0.1+document.getElementById("wreturns").value*rsilicon+document.getElementById("wborings").value*rsilicon+document.getElementById("wpigiron").value*2)/furnaceweight).toFixed(2);
    let bathcopper = ((document.getElementById("wsteel").value*0.01+document.getElementById("wreturns").value*rcopper+document.getElementById("wborings").value*rcopper+document.getElementById("wpigiron").value*0.01)/furnaceweight).toFixed(2);
    let bathtin = ((document.getElementById("wsteel").value*0.001+document.getElementById("wreturns").value*rtin+document.getElementById("wborings").value*rtin+document.getElementById("wpigiron").value*0.001)/furnaceweight).toFixed(2);
    let haddition = ((reqcarbon-bathcarbon)*furnaceweight/60).toFixed(2);
    let naddition = ((reqcarbon-bathcarbon)*furnaceweight/90).toFixed(2);
    let fesiaddition = ((reqsilicon-bathsilicon)*furnaceweight/70).toFixed(2);
    let copperaddition = ((reqcopper-bathcopper)*furnaceweight/95).toFixed(2);
    let tinaddition = ((reqtin-bathtin)*furnaceweight/95).toFixed(2);
    if(grade == "sg-tin" || grade =="sg-copper" || grade =="sg-azterlan"){
        document.querySelector(".result").innerHTML = `Bath Carbon: <input value=${bathcarbon}% readonly></input><br>Bath Silicon: <input value=${bathsilicon}% readonly></input><br>Bath Copper: <input value=${bathcopper}%  readonly></input><br>Bath Tin: <input value=${bathtin}% readonly></input><br><b>${haddition} Kgs</b> of Hi-Carbon or <b>${naddition} Kgs</b> of Neograf <br><b>${fesiaddition} Kgs</b> of FerroSilicon </br> <b>${copperaddition} Kgs</b> of Copper </br> <b>${tinaddition} Kgs</b> of Tin<br><br>The above additives should be added to get required chemical composition`;
    }
    if(grade == "sg-lowmoly" || grade == "sg-highmoly" || grade == "cg-moly"){
        let bathmolybdenum = ((document.getElementById("wsteel").value*0.01+document.getElementById("wreturns").value*rmolybdenum)/furnaceweight).toFixed(2);
        let femoaddition = ((reqmolybdenum-bathmolybdenum)*furnaceweight/60).toFixed(2)
        document.querySelector(".result").innerHTML = `Bath Carbon: <input value=${bathcarbon}% readonly></input><br>Bath Silicon: <input value=${bathsilicon}% readonly></input><br>Bath Molybdenum is <input value=${bathmolybdenum}% readonly></input><br><b>${haddition} Kgs</b>  of Hi-Carbon<br><b>${fesiaddition}</b> Kgs of FerroSilicon<br><b>${femoaddition} Kgs</b> of FerroMolybdenum<br><br>The above additives should be added to get required chemical composition`;
    }
    if(grade == "simoni"){
        let bathmolybdenum = ((document.getElementById("wsteel").value*0.01+document.getElementById("wreturns").value*rmolybdenum)/furnaceweight).toFixed(2);
        let femoaddition = ((reqmolybdenum-bathmolybdenum)*furnaceweight/60).toFixed(2)
        let bathnickel = ((document.getElementById("wsteel").value*0.01+document.getElementById("wreturns").value*rnickel)/furnaceweight).toFixed(2); 
        let niaddition = ((reqnickel-bathnickel)*furnaceweight/95).toFixed(2)
        document.querySelector(".result").innerHTML = `<br>Bath Carbon: <input value=${bathcarbon}% readonly></input><br>Bath Silicon: <input value=${bathsilicon}% readonly></input><br>Bath Molybdenum is <input value=${bathmolybdenum}% readonly></input><br>Bath Nickel is <input value=${bathnickel}% readonly></input><br><br><b>${haddition} Kgs</b>  of Hi-Carbon<br><b>${fesiaddition} Kgs</b> of FerroSilicon<br><b>${femoaddition} Kgs</b> of FerroMolybdenum<br><b>${niaddition} Kgs</b> of Pure Nickel<br><br>The above additives should be added to get required chemical composition`;
    }
}
