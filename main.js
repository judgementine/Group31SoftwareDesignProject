
var Client = { 
    username: null,
    password: null,
    fname: null,
    // add1: null,
    add1: ' 4589 Fake St.',
    add2: null,
    city: null,
    state: null,
    zipcode: null,
    history: []
};
document.getElementById('dispAdd').innerHTML = Client.add1;

function myfunc(){
    let input = document.querySelector("#username").value;
    alert("hello " + input)
} 

function log(){
    // if username has already been used before
    if (Client.username) {
        // user has not set up their account yet
        if (fname){
            window.location.href = "FuelQuoteForm.html";
        }
        else{

        }
    }
    else {
        alert("Looks like you dont have an account. Register an new account to login");
    }
    window.location.href = "FuelQuoteForm.html";
}

var entry = document.getElementById("entry");
entry.addEventListener("click", displayDetails);
var row = 1;
function displayDetails() {

    var Gal = document.getElementById("Gallons").value;
    var Ad = Client.add1;
    var tmp = document.getElementById("dDate").value; 
    var dDate = new Date(tmp);
    var Price = 1.82;
    var Total = Gal * Price;
    
    document.getElementById('tot').innerHTML = Total;
    var table = document.getElementById("table");
    var newRow = table.insertRow(1); 

    var cell1 = newRow.insertCell(0);
    var cell2 = newRow.insertCell(1);
    var cell3 = newRow.insertCell(2);
    var cell4 = newRow.insertCell(3);
    var cell5 = newRow.insertCell(4);

    cell1.innerHTML = Gal;
    cell2.innerHTML = Ad;
    cell3.innerHTML = dDate;
    cell4.innerHTML = Price;
    cell5.innerHTML = Total;
}   
