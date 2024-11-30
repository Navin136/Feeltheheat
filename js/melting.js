let furnaceweight = 6000;
window.onload = chargemix;
function chargemix(){

    // variables for pattern specific chemistry
    let pattern = document.getElementById("pattern").value;
    let pcarbon = document.getElementById("pcarbon").value;
    let psilicon = document.getElementById("psilicon").value;
    let pcopper = document.getElementById("pcopper").value;
    let ptin = document.getElementById("ptin").value;
    let pmanganese = document.getElementById("pmanganese").value;
    let pmagnesium = document.getElementById("pmagnesium").value;
    let pmolybdenum = document.getElementById("pmolybdenum").value;
    let pnickel = document.getElementById("pnickel").value;
    
    let reqcarbon = document.getElementById("reqcarbon").value;
    let reqsilicon = document.getElementById("reqsilicon").value;
    let reqcopper = document.getElementById("reqcopper").value;
    let reqtin = document.getElementById("reqtin").value;
    let reqmanganese = document.getElementById("reqmanganese").value;
    let reqmolybdenum = document.getElementById("reqmolybdenum").value;
    let reqnickel = document.getElementById("reqnickel").value;

    document.getElementById("wsteel").value=document.getElementById("psteel").value*furnaceweight/100;
    document.getElementById("wtinsteel").value=document.getElementById("ptinsteel").value*furnaceweight/100;
    document.getElementById("wgreysteel").value=document.getElementById("pgreysteel").value*furnaceweight/100;
    document.getElementById("wreturns").value=document.getElementById("preturns").value*furnaceweight/100;
    document.getElementById("wborings").value=document.getElementById("pborings").value*furnaceweight/100;
    document.getElementById("wpigiron").value=document.getElementById("ppigiron").value*furnaceweight/100;
    let ncgain = document.querySelector(".maddn").value*90/furnaceweight;
    let hcgain = document.querySelector(".maddh").value*60/furnaceweight;
    let bathcarbon = ((document.getElementById("wsteel").value*0.01+document.getElementById("wreturns").value*rcarbon+document.getElementById("wborings").value*rcarbon+document.getElementById("wpigiron").value*4)/furnaceweight+ncgain+hcgain).toFixed(2);
    let bathsilicon = ((document.getElementById("wsteel").value*0.1+document.getElementById("wreturns").value*rsilicon+document.getElementById("wborings").value*rsilicon+document.getElementById("wpigiron").value*2.5)/furnaceweight).toFixed(2);
    let bathcopper = ((document.getElementById("wsteel").value*0.01+document.getElementById("wreturns").value*rcopper+document.getElementById("wborings").value*rcopper+document.getElementById("wpigiron").value*0.01)/furnaceweight).toFixed(2);
    let bathtin = ((document.getElementById("wsteel").value*0.001+document.getElementById("wreturns").value*rtin+document.getElementById("wborings").value*rtin+document.getElementById("wpigiron").value*0.001)/furnaceweight).toFixed(2);
    let bathmanganese = ((document.getElementById("wsteel").value*0.001+document.getElementById("wreturns").value*rmanganese+document.getElementById("wborings").value*rmanganese+document.getElementById("wpigiron").value*0.5)/furnaceweight).toFixed(2);
    let haddition = ((reqcarbon-bathcarbon)*furnaceweight/60).toFixed(2);
    let naddition = ((reqcarbon-bathcarbon)*furnaceweight/90).toFixed(2);
    let fesiaddition = ((reqsilicon-bathsilicon)*furnaceweight/70).toFixed(2);
    let copperaddition = ((reqcopper-bathcopper)*furnaceweight/95).toFixed(2);
    let tinaddition = ((reqtin-bathtin)*furnaceweight/95).toFixed(2);
    let manganeseaddition = ((reqmanganese-bathmanganese)*furnaceweight/68).toFixed(2);
    let bathmolybdenum = ((document.getElementById("wsteel").value*0.01+document.getElementById("wreturns").value*rmolybdenum)/furnaceweight).toFixed(2);
    let femoaddition = ((reqmolybdenum-bathmolybdenum)*furnaceweight/60).toFixed(2)
    let bathnickel = ((document.getElementById("wsteel").value*0.01+document.getElementById("wreturns").value*rnickel)/furnaceweight).toFixed(2); 
    let niaddition = ((reqnickel-bathnickel)*furnaceweight/95).toFixed(2)
    document.querySelector(".result").innerHTML = `<div id=inresult>Bath Carbon: <input value=${bathcarbon}% readonly></input><br>Bath Silicon: <input value=${bathsilicon}% readonly></input><br>Bath Copper: <input value=${bathcopper}%  readonly></input><br>Bath Tin: <input value=${bathtin}% readonly></input><br>Bath Manganese: <input value=${bathmanganese}% readonly></input></br>Bath Molybdenum is <input value=${bathmolybdenum}% readonly></input><br>Bath Nickel is <input value=${bathnickel}% readonly></input><br><br><b>${haddition} Kgs</b>  of Hi-Carbon<br><b>${fesiaddition} Kgs</b> of FerroSilicon<br> <b>${copperaddition} Kgs</b> of Copper </br> <b>${tinaddition} Kgs</b> of Tin<br> <b>${manganeseaddition} Kgs</b> of Manganese<br><b>${femoaddition} Kgs</b> of FerroMolybdenum<br><b>${niaddition} Kgs</b> of Pure Nickel<br><br>The above additives should be added to get required chemical composition</div>`;
    if(grade == "sg-tin" || grade =="sg-copper" || grade =="sg-azterlan" || grade =="sg-knu"){
        if(bathmanganese<0.28){
            document.querySelector(".steelsuggestion").innerHTML = "<b>Suggestion: </b></br><p>Bath Manganese is low. Pleae use manganese steel</p>"
        }
    }
    if(bathtin<(reqtin-0.01)){
            document.querySelector(".steelsuggestion1").innerHTML = "<b>Suggestion: </b></br><p>Bath Tin is low. Pleae use Tin coated steel</p>"
    }
}
