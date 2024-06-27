let pattern = '7278';

// Master data
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
if(pcarbon>=3.88){
    var grade = 'sg-azterlan';
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