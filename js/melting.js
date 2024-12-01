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
    
    // variables for required chemistry
    let reqcarbon = document.getElementById("reqcarbon").value;
    let reqsilicon = document.getElementById("reqsilicon").value;
    let reqcopper = document.getElementById("reqcopper").value;
    let reqtin = document.getElementById("reqtin").value;
    let reqmanganese = document.getElementById("reqmanganese").value;
    let reqmolybdenum = document.getElementById("reqmolybdenum").value;
    let reqnickel = document.getElementById("reqnickel").value;

    // variables for chargemix weight
    let wsteel = document.getElementById("wsteel").value;
    let wtinsteel = document.getElementById("wtinsteel").value;
    let wgreysteel = document.getElementById("wgreysteel").value;
    let wborings = document.getElementById("wborings").value;
    let wpigiron = document.getElementById("wpigiron").value;
    let wreturns = document.getElementById("wreturns").value;

    // material composition
    // steel
    let steelc  = document.getElementById("steelc").value;
    let steelsi = document.getElementById("steelsi").value;
    let steelcu = document.getElementById("steelcu").value;
    let steelsn = document.getElementById("steelsn").value;
    let steelmn = document.getElementById("steelmn").value;
    let steelmo = document.getElementById("steelmo").value;
    let steelni = document.getElementById("steelni").value;
    let steelti = document.getElementById("steelti").value;
    
    // tinsteel
    let tinsteelc  = document.getElementById("tinsteelc").value;
    let tinsteelsi = document.getElementById("tinsteelsi").value;
    let tinsteelcu = document.getElementById("tinsteelcu").value;
    let tinsteelsn = document.getElementById("tinsteelsn").value;
    let tinsteelmn = document.getElementById("tinsteelmn").value;
    let tinsteelmo = document.getElementById("tinsteelmo").value;
    let tinsteelni = document.getElementById("tinsteelni").value;
    let tinsteelti = document.getElementById("tinsteelti").value;
    
    // greysteel
    let greysteelc  = document.getElementById("greysteelc").value;
    let greysteelsi = document.getElementById("greysteelsi").value;
    let greysteelcu = document.getElementById("greysteelcu").value;
    let greysteelsn = document.getElementById("greysteelsn").value;
    let greysteelmn = document.getElementById("greysteelmn").value;
    let greysteelmo = document.getElementById("greysteelmo").value;
    let greysteelni = document.getElementById("greysteelni").value;
    let greysteelti = document.getElementById("greysteelti").value;

    // borings
    let boringsc  = document.getElementById("boringsc").value;
    let boringssi = document.getElementById("boringssi").value;
    let boringscu = document.getElementById("boringscu").value;
    let boringssn = document.getElementById("boringssn").value;
    let boringsmn = document.getElementById("boringsmn").value;
    let boringsmo = document.getElementById("boringsmo").value;
    let boringsni = document.getElementById("boringsni").value;
    let boringsti = document.getElementById("boringsti").value;
    
    // pigiron
    let pigironc  = document.getElementById("pigironc").value;
    let pigironsi = document.getElementById("pigironsi").value;
    let pigironcu = document.getElementById("pigironcu").value;
    let pigironsn = document.getElementById("pigironsn").value;
    let pigironmn = document.getElementById("pigironmn").value;
    let pigironmo = document.getElementById("pigironmo").value;
    let pigironni = document.getElementById("pigironni").value;
    let pigironti = document.getElementById("pigironti").value;

    // returns
    let returnsc  = document.getElementById("returnsc").value;
    let returnssi = document.getElementById("returnssi").value;
    let returnscu = document.getElementById("returnscu").value;
    let returnssn = document.getElementById("returnssn").value;
    let returnsmn = document.getElementById("returnsmn").value;
    let returnsmo = document.getElementById("returnsmo").value;
    let returnsni = document.getElementById("returnsni").value;
    let returnsti = document.getElementById("returnsti").value;

    // carbon pickup from carburizers
    let ncgain = document.querySelector(".maddn").value*90/furnaceweight;
    let hcgain = document.querySelector(".maddh").value*60/furnaceweight;

    // bath composition
    let bathcarbon = ((steelc*wsteel + tinsteelc*wtinsteel + greysteelc*wgreysteel + pigironc*wpigiron + returnsc*wreturns)/furnaceweight+ncgain+hcgain).toFixed(2);
    let bathsilicon = ((steelsi*wsteel + tinsteelsi*wtinsteel + greysteelsi*wgreysteel + pigironsi*wpigiron + returnssi*wreturns)/furnaceweight).toFixed(2);
    let bathcopper = ((steelcu*wsteel + tinsteelcu*wtinsteel + greysteelcu*wgreysteel + pigironcu*wpigiron + returnscu*wreturns)/furnaceweight).toFixed(2);
    let bathtin = ((steelsn*wsteel + tinsteelsn*wtinsteel + greysteelsn*wgreysteel + pigironsn*wpigiron + returnssn*wreturns)/furnaceweight).toFixed(3);
    let bathmanganese = ((steelmn*wsteel + tinsteelmn*wtinsteel + greysteelmn*wgreysteel + pigironmn*wpigiron + returnsmn*wreturns)/furnaceweight).toFixed(2);
    let bathmolybdenum = ((steelmo*wsteel + tinsteelmo*wtinsteel + greysteelmo*wgreysteel + pigironmo*wpigiron + returnsmo*wreturns)/furnaceweight).toFixed(3);
    let bathnickel = ((steelni*wsteel + tinsteelni*wtinsteel + greysteelni*wgreysteel + pigironni*wpigiron + returnsni*wreturns)/furnaceweight).toFixed(3);
    let bathtitanium = ((steelti*wsteel + tinsteelti*wtinsteel + greysteelti*wgreysteel + pigironti*wpigiron + returnsti*wreturns)/furnaceweight).toFixed(2);

    let haddition = ((reqcarbon-bathcarbon)*furnaceweight/60).toFixed(2);
    let naddition = ((reqcarbon-bathcarbon)*furnaceweight/90).toFixed(2);
    let fesiaddition = ((reqsilicon-bathsilicon)*furnaceweight/70).toFixed(2);
    let copperaddition = ((reqcopper-bathcopper)*furnaceweight/95).toFixed(2);
    let tinaddition = ((reqtin-bathtin)*furnaceweight/95).toFixed(2);
    let manganeseaddition = ((reqmanganese-bathmanganese)*furnaceweight/68).toFixed(2);
    let femoaddition = ((reqmolybdenum-bathmolybdenum)*furnaceweight/60).toFixed(2)
    let niaddition = ((reqnickel-bathnickel)*furnaceweight/95).toFixed(2)
    document.querySelector(".result").innerHTML = `<div id=inresult>Bath Carbon: <input value=${bathcarbon}% readonly></input><br>Bath Silicon: <input value=${bathsilicon}% readonly></input><br>Bath Copper: <input value=${bathcopper}%  readonly></input><br>Bath Tin: <input value=${bathtin}% readonly></input><br>Bath Manganese: <input value=${bathmanganese}% readonly></input></br>Bath Molybdenum is <input value=${bathmolybdenum}% readonly></input><br>Bath Nickel is <input value=${bathnickel}% readonly></input><br><br><b>${haddition} Kgs</b>  of Hi-Carbon or <b>${naddition} Kgs</b>  of  Neograf<br><b>${fesiaddition} Kgs</b> of FerroSilicon<br> <b>${copperaddition} Kgs</b> of Copper </br> <b>${tinaddition} Kgs</b> of Tin<br> <b>${manganeseaddition} Kgs</b> of Manganese<br><b>${femoaddition} Kgs</b> of FerroMolybdenum<br><b>${niaddition} Kgs</b> of Pure Nickel<br><br>The above additives should be added to get required chemical composition</div>`;
    // if(grade == "sg-tin" || grade =="sg-copper" || grade =="sg-azterlan" || grade =="sg-knu"){
    //     if(bathmanganese<0.28){
    //         document.querySelector(".steelsuggestion").innerHTML = "<b>Suggestion: </b></br><p>Bath Manganese is low. Pleae use manganese steel</p>"
    //     }
    // }
    // if(bathtin<(reqtin-0.01)){
    //         document.querySelector(".steelsuggestion1").innerHTML = "<b>Suggestion: </b></br><p>Bath Tin is low. Pleae use Tin coated steel</p>"
    // }
}
