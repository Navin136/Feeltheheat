function calculate(){
    let hlevel = parseInt(document.getElementById("hlevel").value);
    let tweight = parseInt(document.getElementById("tweight").value);
    let pattern = document.getElementById("pattern").value;
    
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
    let hc = document.getElementById("hc").value;
    let hsi = document.getElementById("hsi").value;
    let hcu = document.getElementById("hcu").value;
    let hsn = document.getElementById("hsn").value;
    let hmn = document.getElementById("hmn").value;
    let hmo = document.getElementById("hmo").value;
    let hni = document.getElementById("hni").value;

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
    document.getElementById("wc").value  = ((document.getElementById("rc").value-fc)*tweight*1000/60).toFixed(2);
    document.getElementById("wsi").value = ((document.getElementById("rsi").value-fsi)*tweight*1000/70).toFixed(2);
    document.getElementById("wcu").value = ((document.getElementById("rcu").value-fcu)*tweight*1000/95).toFixed(2);
    document.getElementById("wsn").value = ((document.getElementById("rsn").value-fsn)*tweight*1000/95).toFixed(2);
    document.getElementById("wmn").value = ((document.getElementById("rmn").value-fmn)*tweight*1000/68).toFixed(2);
    document.getElementById("wmo").value = ((document.getElementById("rmo").value-fmo)*tweight*1000/60).toFixed(2);
    document.getElementById("wni").value = ((document.getElementById("rni").value-fni)*tweight*1000/95).toFixed(2);
}
