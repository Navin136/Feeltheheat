window.onload = getdata;
function getdata(){
    fetch(localStorage.getItem("pattern"),'nodlab');
}