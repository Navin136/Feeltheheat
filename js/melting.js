let furnaceweight = 6000;
function chargemix(){
    
    document.getElementById("psteel").value = 35;
    if(document.getElementById("grade").value == "sg-tin"){
        document.getElementById("psteel").value = 35;
        document.getElementById("preturns").value = 65;
        document.getElementById("pborings").value = 0;
        document.getElementById("ppigiron").value = 0;
    }
    if(document.getElementById("grade").value == "sg-copper"){
        document.getElementById("psteel").value = 37;
        document.getElementById("preturns").value = 60;
        document.getElementById("pborings").value = 0;
        document.getElementById("ppigiron").value = 3;
    }
    if(document.getElementById("grade").value == "sg-azterlan"){
        document.getElementById("psteel").value = 38;
        document.getElementById("preturns").value = 62;
        document.getElementById("pborings").value = 0;
        document.getElementById("ppigiron").value = 0;
    }
    if(document.getElementById("grade").value == "sg-moly"){
        document.getElementById("psteel").value = 30;
        document.getElementById("preturns").value = 70;
        document.getElementById("pborings").value = 0;
        document.getElementById("ppigiron").value = 0;
    }
    if(document.getElementById("grade").value == "cg-moly"){
        document.getElementById("psteel").value = 15;
        document.getElementById("preturns").value = 85;
        document.getElementById("pborings").value = 0;
        document.getElementById("ppigiron").value = 0;
    }
    if(document.getElementById("grade").value == "simoni"){
        document.getElementById("psteel").value = 10;
        document.getElementById("preturns").value = 90;
        document.getElementById("pborings").value = 0;
        document.getElementById("ppigiron").value = 0;
    }
    document.getElementById("wsteel").value=document.getElementById("psteel").value*furnaceweight/100;
    document.getElementById("wreturns").value=document.getElementById("preturns").value*furnaceweight/100;
    document.getElementById("wborings").value=document.getElementById("pborings").value*furnaceweight/100;
    document.getElementById("wpigiron").value=document.getElementById("ppigiron").value*furnaceweight/100;
}
