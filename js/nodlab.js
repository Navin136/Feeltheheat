function getdata(){
    var pattern = document.getElementById("pattern").value;
    fetch(pattern,'nodlab');
}