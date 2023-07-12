async function load_table() {
    let response = await fetch("./php/load-table.php")
    let data = await response.json()
    let str = '';
    let count = 0;
    for (let i = 0; i < data.length; i++) {
        count++
        str += `<tr>
                <td>${count}</td>
                <td>${data[i].fname} ${data[i].lname}</td>
                <td>${data[i].cname}</td>
                <td>${data[i].city}</td> 
                <td class="btns">
                <a class="Edit" onclick="edt(${data[i].id})">edit</a>
                <a class="Delete" onclick="delet(${data[i].id})">remove</a>
                </td>
                </tr>`
    }
    let tbody = document.querySelector(".tbody");
    tbody.innerHTML = str;
}
load_table();


// add-------------------------------------------------------------->>>>>>
async function add() {
    let addbox = document.querySelector(".add");
    let container = document.querySelector(".container");
    addbox.classList.add("sadd");
    container.style.pointerEvents = "none"

    let response = await fetch("./php/get_classes.php")
    let data = await response.json()
    let str = '<option selected value="0" disable>Select Class</option>';
    for (let i = 0; i < data.length; i++) {
        str += `<option value="${data[i].id}">${data[i].cname}</option>`
    }
    let selector = document.querySelector("#b")
    selector.innerHTML = str;
}

function hide() {
    let addbox = document.querySelector(".add");
    addbox.classList.remove("sadd");
    let container = document.querySelector(".container");
    container.style.pointerEvents = "unset"
}

let savebtn = document.querySelector("#savebtn");
let form = document.querySelector(".form");
let fname = document.querySelector("#fname").value

savebtn.addEventListener("click", save);
async function save(e) {
    e.preventDefault()
    let fname = document.querySelector("#fname").value
    let lname = document.querySelector("#lname").value
    let options = document.querySelector("#b").value
    let city = document.querySelector("#city").value
    if (fname === '' || lname === '' || options === '0' || city === '') {

    } else {
        let formData = {
            "Fname": fname,
            "Lname": lname,
            "Options": options,
            "City": city

        }
        jsonData = JSON.stringify(formData)

        let myinit = {
            method: "POST",
            headers: {
                'Content-type': 'application/json',
            },

            body: jsonData,
        }

        let response = await fetch("./php/add.php", myinit);
        let data = await response.json()
        if (data.insert == "success") {
            document.querySelector('form').reset()
            load_table();
            hide();
        }
    }
}

// edit-------------------------------------------------------------->>>>>>

async function edt(id) {
    let editbox = document.querySelector("#edit");
    let container = document.querySelector(".container");
    editbox.style = "transition:0.2s;top: 28%;visibility: visible;";
    container.style.pointerEvents = "none"


    let response = await fetch("./php/fetch_edit.php?id=" + id)
    let data = await response.json()
    for (let i = 0; i < data.text.length; i++) {
        document.querySelector("#hidden").value = data.text[i].id
        document.querySelector("#F").value = data.text[i].fname
        document.querySelector("#L").value = data.text[i].lname
        document.querySelector("#C").value = data.text[i].city

        let selector = document.querySelector("#O")
        let str = "";
        let selected = ""
        for (let j = 0; j < data.classes.length; j++) {
            if (data.classes[j].id === data.text[i].class_id) {
                selected = "selected"
            } else {
                selected = ""
            }
            str += `
        <option ${selected} value="${data.classes[j].id}">${data.classes[j].cname}</option>
        `
        }
        selector.innerHTML = str
    }

}
function hid_edt_box() {
    let editbox = document.querySelector("#edit");
    editbox.style = "transition:0.2s;top: -130%;visibility: hidden;"
    let container = document.querySelector(".container");
    container.style.pointerEvents = "unset"
}

async function modify() {
    let id = document.querySelector("#hidden").value
    let fname = document.querySelector("#F").value
    let lname = document.querySelector("#L").value
    let options = document.querySelector("#O").value
    let city = document.querySelector("#C").value
    if (fname === '' || lname === '' || options === '0' || city === '') {
        alert();
    } else {
        let formData = {
            Id: id,
            Fname: fname,
            Lname: lname,
            Options: options,
            City: city
        }
        jsonData = JSON.stringify(formData)
        let myinit = {
            method: "POST",
            headers: {
                'Content-Type': 'application/json',
            },
            body: jsonData,
        }

        let response = await fetch("./php/edit.php", myinit);
        let data = await response.json();
        if (data.insert === 'success') {
            hid_edt_box();
            load_table();
        } else {

        }

    }
}

// delete-------------------------------------------------------------->>>>>>

async function delet(id) {
    if (confirm("Are you sure to delete this record?")) {
        let myinit = {
            method: "DELETE"
        }
        let response = await fetch("./php/delete.php?id=" + id, myinit)
        let data = await response.json();
        if (data.delete === "success") {
            load_table();
        } else {
            prompt("FAIL");
        }
    }
}

// search------------------------------------------------------------------>>>>>>>>
let search_input = document.querySelector("#search")
search_input.addEventListener("input", search_fun)
async function search_fun() {
    if (search_input.value === "") {
        load_table();
    } else {
        let response = await fetch("./php/search.php?search=" + search_input.value)
        let data = await response.json()
        let str = '';
        let count = 0;
        for (let i = 0; i < data.length; i++) {
            count++
            str += `<tr>
                <td>${count}</td>
                <td>${data[i].fname} ${data[i].lname}</td>
                <td>${data[i].cname}</td>
                <td>${data[i].city}</td>
                <td class="btns">
                <a class="Edit" onclick="edt(${data[i].id})">edit</a>
                <a class="Delete" onclick="delet(${data[i].id})">remove</a>
                </td>
                </tr>`
        }
        let tbody = document.querySelector(".tbody");
        tbody.innerHTML = str;
    }
}


