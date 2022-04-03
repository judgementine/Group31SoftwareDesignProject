
// var Client = { 
//     username: null,
//     password: null,
//     fname: null,
//     // add1: null,
//     add1: ' 4589 Fake St.',
//     add2: null,
//     city: null,
//     state: null,
//     zipcode: null,
//     history: []
// };

// creating client class
// const {MongoClient} = require("mongodb");
// connect();
// const uri = "mongodb://localhost:27017"
// async function connect() {
//     const client = new MongoClient(uri);
//     try {
//         await client.connect();
//         client.db("projDB");
//         console.log('connected to db : ${db.databaseName}')
//     }
//     catch (ex){
//         console.error('Bad thing happened')
//     }
//     finally{
//         client.close();
//     }
// }

// container for user history
class log {
    constructor(Gal, Ad, dDate, Price, Total) {
        this.Gal = Gal;
        this.Ad = Ad;
        this.dDate = dDate;
        this.Price = Price;
        this.Total = Total;
    }
}

class Client {
    
    constructor() {
        this.username = null;
        this.password = null;
        this.fname = null;

        this.add1 = null;
        this.add2 = null;
        this.city = null;
        this.state = null;
        this.zipcode = null;
        this.history = [];
    }
    setCredits(username, password) {
        this.username = username;
        this.password = password;
    }
    setInfo(fname, add1, add2, city, state, zipcode) {
        this.fname = fname;
        this.add1 = add1;
        this.add2 = add2;
        this.city = city;
        this.state = state;
        this.zipcode = zipcode;
        this.username = JSON.parse(localStorage.user).username;
        this.password = JSON.parse(localStorage.user).password;

        localStorage.user = JSON.stringify(this)
    }
    updateHistory(x) {
        //log = [Gal,Ad,dDate,Price,Total];
        this.history.push(x);
    }

}


var User = new Client();
if (localStorage.user) {
    var data = JSON.parse(localStorage.user)
    User.setCredits(data.username, data.password)
    if (data.fname) {
        User.setInfo(data.fname, data.add1, data.add2, data.city, data.state, data.zipcode)
    }
}

// flexible validation function for user input:
// if the field is required, min = 1 otherwise min = 0, and max = character limit. input types will be numbers, text, and date.
var good = true;
function Valid(id, input, min, max, type) {

    var i = input.trim();
    // alert("testing"+id+"error");
    if (i.length < min || i.length > max) {
        var tag = id + "_error";
        document.getElementById(tag).innerHTML = "Enter " + type + " of length between " + min + " and " + max;
        good = false;
    }

}


const LoginForm = document.getElementById('LoginForm')
if (LoginForm) {
    LoginForm.addEventListener('submit', (e) => {
        e.preventDefault()
        login();
        // by default since we don't have a DB yet, every user is a new user when the app is launched. 
        // These steps can be built upon once the DB is ready to validate the client's username & password are present in the DB.
    })
}

// Homepage login 
function login() {
    good = true;
    var ext = 0;
    var uname = document.getElementById('username').value;
    var ppp = document.getElementById('password').value;

    Valid("username", uname, 1, 50, 'text');
    Valid("password", ppp, 1, 50, 'text');
    if (!good) {
        alert("Revise input");
        return;
    }

    // adding step here later to check DB for user profile

    if (User.username == null || User.password == null) {
        alert("Looks like you dont have an account. Register an new account to login");
        window.location.href = "Register.html"
    }
    else if (User.username != uname || User.password != ppp) {
        alert("Incorrect username or password");
        return;
    }
    else {
        window.location.href = "FuelQuoteForm.html"
    }

}


// Setting username and password
const RegForm = document.getElementById('RegForm')
if (RegForm) {
    RegForm.addEventListener('submit', (e) => {
        //e.preventDefault()
        reg();
    })
}

function reg() {
    let x = document.getElementById("uname").value;
    let y = document.getElementById("psw").value;
    localStorage.user = '{"username": "' + x + '", "password": ' + y + '}';
    User.setCredits(x, y);
}

function compp() {

    good = true;

    var fn = document.getElementById('fname').value;

    var a1 = document.getElementById('add1').value;

    var a2 = document.getElementById('add2').value;

    var ct = document.getElementById('city').value;

    var st = document.getElementById('state').value;

    var z = document.getElementById('zipcode').value;

    Valid("fname", fn, 1, 50, 'text');
    Valid("add1", a1, 1, 100, 'text');
    Valid("add2", a2, 0, 100, 'text');
    Valid("city", ct, 1, 100, 'text');
    Valid("state", st, 2, 2, 'text');
    Valid("zipcode", z, 5, 9, 'numbers');

    if (!good) {
        alert("Revise input");
        return;
    }
    else {
        User.setInfo(fn, a1, a2, ct, st, z);
        window.location.href = "FuelQuoteForm.html";
    }

}



// complete registration





// Fuel quote input



var entry = document.getElementById("entry");
if (entry) {
    entry.addEventListener("click", displayDetails);
    var row = 1;
}
function displayDetails() {

    var Gal = document.getElementById("Gallons").value;
    var Ad = User.add1;
    var tmp = document.getElementById("dDate").value;
    var dDate = new Date(tmp);
    var Price = 1.82;
    var Total = Gal * Price;

    document.getElementById('tot').innerHTML = Total;


    // creating history table: 

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
