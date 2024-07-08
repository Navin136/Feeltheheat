function getdata(){
    alert("This action will change pattern, chemistry, additives, inoculant details in all other areas")
    var getpattern = document.getElementById("pattern").value;
    localStorage.setItem("pattern", getpattern);
    fetch(localStorage.getItem("pattern"),'holding');

}
function calculate(){
    fetch(localStorage.getItem("pattern"),'holding');
    let hlevel = parseInt(document.getElementById("hlevel").value);
    let tweight = parseInt(document.getElementById("tweight").value);
    
    // variables for pattern specific chemistry
    let pcarbon = document.getElementById("pcarbon").value;
    let psilicon = document.getElementById("psilicon").value;
    let pcopper = document.getElementById("pcopper").value;
    let ptin = document.getElementById("ptin").value;
    let pmanganese = document.getElementById("pmanganese").value;
    let pmolybdenum = document.getElementById("pmolybdenum").value;
    let pnickel = document.getElementById("pnickel").value;
    
    // furnace chemistry variables
    let fc = document.getElementById("fc").value;
    let fsi = document.getElementById("fsi").value;
    let fcu = document.getElementById("fcu").value;
    let fsn = document.getElementById("fsn").value;
    let fmn = document.getElementById("fmn").value;
    let fmo = document.getElementById("fmo").value;
    let fni = document.getElementById("fni").value;

    // holder chemistry variables
    document.getElementById("hc").value = hc;
    document.getElementById("hsi").value = hsi;
    document.getElementById("hcu").value = hcu;
    document.getElementById("hsn").value = hsn;
    document.getElementById("hmn").value = hmn;
    document.getElementById("hmo").value = hmo;
    document.getElementById("hni").value = hni;

    // calculate required chemistry
    console.log(tweight+hlevel);
    document.getElementById("rc").value = ((((tweight+hlevel)*pcarbon)-(hc*hlevel))/tweight).toFixed(2);
    document.getElementById("rsi").value = ((((tweight+hlevel)*psilicon)-(hsi*hlevel))/tweight).toFixed(2);
    document.getElementById("rcu").value = ((((tweight+hlevel)*pcopper)-(hcu*hlevel))/tweight).toFixed(2);
    document.getElementById("rsn").value = ((((tweight+hlevel)*ptin)-(hsn*hlevel))/tweight).toFixed(3);
    document.getElementById("rmn").value = ((((tweight+hlevel)*pmanganese)-(hmn*hlevel))/tweight).toFixed(2);
    document.getElementById("rmo").value = ((((tweight+hlevel)*pmolybdenum)-(hmo*hlevel))/tweight).toFixed(2);
    document.getElementById("rni").value = ((((tweight+hlevel)*pnickel)-(hni*hlevel))/tweight).toFixed(2);

    // calculate weight of additions
    if(document.getElementById("carbsel").value == 'hic'){
        document.getElementById("wc").value  = ((document.getElementById("rc").value-fc)*tweight*1000/60).toFixed(2) + " Hi-Carbon";

    }
    if(document.getElementById("carbsel").value == 'neo'){
        document.getElementById("wc").value  = ((document.getElementById("rc").value-fc)*tweight*1000/90).toFixed(2) + " Neograf";

    }
    if(document.getElementById("rc").value<fc){
        document.getElementById("wc").value = ((fc*tweight*1000/document.getElementById("rc").value)-tweight*1000).toFixed(1) + " Steel";
    }
    document.getElementById("wsi").value = ((document.getElementById("rsi").value-fsi)*tweight*1000/70).toFixed(2);
    if(document.getElementById("wsi").value <=  0 ){
        document.getElementById("wsi").value = "NA";
    }
    document.getElementById("wcu").value = ((document.getElementById("rcu").value-fcu)*tweight*1000/95).toFixed(2);
    if(document.getElementById("wcu").value <=  0 ){
        document.getElementById("wcu").value = "NA";
    }
    document.getElementById("wsn").value = ((document.getElementById("rsn").value-fsn)*tweight*1000/95).toFixed(2);
    if(document.getElementById("wsn").value <=  0 ){
        document.getElementById("wsn").value = "NA";
    }
    document.getElementById("wmn").value = ((document.getElementById("rmn").value-fmn)*tweight*1000/68).toFixed(2);
    if(document.getElementById("wmn").value <=  0 ){
        document.getElementById("wmn").value = "NA";
    }
    document.getElementById("wmo").value = ((document.getElementById("rmo").value-fmo)*tweight*1000/60).toFixed(2);
    if(document.getElementById("wmo").value <=  0 ){
        document.getElementById("wmo").value = "NA";
    }
    document.getElementById("wni").value = ((document.getElementById("rni").value-fni)*tweight*1000/95).toFixed(2);
    if(document.getElementById("wni").value <=  0 ){
        document.getElementById("wni").value = "NA";
    }
}
function changecarb(){
    document.getElementById("carb").innerHTML = "Neograf";  
}