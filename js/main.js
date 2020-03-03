let home = document.getElementById("menu");
let applyPage = document.getElementById("applyCl");
let checkPage = document.getElementById("checkCl");

function apply() {
    home.style.display = "none";
    applyPage.style.display = "block";
}

function applys() {
    home.style.display = "none";
    checkPage.style.display = "none";
    applyPage.style.display = "block";
}

function checks() {
    home.style.display = "none";
    checkPage.style.display = "block";
}

function checksIt() {
    home.style.display = "none";
    applyPage.style.display = "none";
    checkPage.style.display = "block";
}



let rowcnt = document.getElementById("rowCont");
let req = document.getElementById("viewReq");

function showAllreq(){
    rowcnt.style.display = "none";
    req.style.display = "block";
}

