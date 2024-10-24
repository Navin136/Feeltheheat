let addplanbtn = document.querySelector('#addplan');
addplanbtn.addEventListener('click', addplan);
let i=1;
function addplan(){
    let tabletag = document.querySelector("#plantable");
    let trow = document.createElement('tr');
    tabletag.appendChild(trow);
    let tdata1 = document.createElement('td');
    let tdata2 = document.createElement('td');
    let tdata3 = document.createElement('td');
    let firstinput = document.createElement('input');
    let secondinput = document.createElement('input');
    let thirdinput = document.createElement('input');
    tdata1.appendChild(firstinput);
    tdata2.appendChild(secondinput);
    tdata3.appendChild(thirdinput);
    trow.appendChild(tdata1);
    trow.appendChild(tdata2);
    trow.appendChild(tdata3);
    firstinput.value=i;
    firstinput.readOnly = true;
    firstinput.id="plan"+i;
    secondinput.id="part"+i;
    thirdinput.id="moulds"+i;
    firstinput.name="plan"+i;
    secondinput.name="part"+i;
    thirdinput.name="moulds"+i;
    i+=1;
}