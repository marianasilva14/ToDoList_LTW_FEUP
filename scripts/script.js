let list = document.getElementsByClassName("wrapper");
let todolists = document.getElementById("todolists");

if (todolists != null) {

    let forms = document.getElementsByTagName('form');
    
    if (forms != null) {
        forms[2].addEventListener('submit', function (event) {
            let id = forms[2].children[0].value;
            id = parseInt(id, 10);

            let xmlhttp = new XMLHttpRequest();
            xmlhttp.open("POST", "delete_to_do_list.php", true);
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.onreadystatechange = function () {
                if (this.readyState === 4 || this.status === 200) {
                    updateDropdownsAndScreen_Todolists(id);
                }
            };
            xmlhttp.send("to_do_listID=" + id);
            event.preventDefault();
        });

        forms[1].addEventListener('submit', function (event) {
            let id = forms[1].children[0].value;
            id = parseInt(id, 10);

            let xmlhttp = new XMLHttpRequest();
            xmlhttp.open("POST", "markAsCompleted_to_do_list.php", true);
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.onreadystatechange = function () {
                if (this.readyState === 4 || this.status === 200) {
                    updateDropdownsAndScreen_Todolists(id);
                }
            };
            xmlhttp.send("to_do_listID=" + id);
            event.preventDefault();
        });

        forms[0].addEventListener('submit', function (event) {
            let category = forms[0].children[0].value;
            let name = forms[0].children[1].value;


            let xmlhttp = new XMLHttpRequest();
            xmlhttp.open("POST", "newToDoList.php", true);
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.onreadystatechange = function () {
                if (this.readyState === 4 || this.status === 200) {
                    let id_added = this.responseText;
                    if (id_added != "" && id_added != null)
                        add_to_do_list(id_added, category, name);
                }
            };
            xmlhttp.send("category=" + category + "&name=" + name);
            event.preventDefault();
        });
    }
}

function updateDropdownsAndScreen_Todolists(id) {
    let index = 0;
    for (index; index < list.length; index++) {
        if (id == parseInt(list[index].innerText, 10)) {
            list[index].parentNode.removeChild(list[index]);
            break;
        }
    }

    var selectobject = document.getElementById("todolistToEliminate");
    for (var i = 0; i < selectobject.length; i++) {
        if (parseInt(selectobject.options[i].value) == id) {
            selectobject.remove(i);
            break;
        }
    }

    var selectobject = document.getElementById("todolistToMark");
    for (var i = 0; i < selectobject.length; i++) {
        if (parseInt(selectobject.options[i].value) == id) {
            selectobject.remove(i);
            break;
        }
    }
}

function add_to_do_list(id_added, category, name) {
    todolists.innerHTML +=
        `<li>
    <div class="wrapper">
        <div class="col_third">
            <div class="hover panel">
                <a class="table_toDo" href="toDoList.php?toDoList_id=${id_added}">
                    <div class="front">
                        <div class="box1">
                            <p>${id_added} : ${name}</p>
                        </div>
                    </div>
                    <div class="back">
                        <div class="box2">
                            <p>${id_added} : ${name}</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</li>`

    var selectobject = document.getElementById("todolistToEliminate");
    var option = document.createElement('option');
    option.text = option.value = id_added + " : " + name;
    selectobject.appendChild(option);

    var selectobject = document.getElementById("todolistToMark");
    var option = document.createElement('option');
    option.text = option.value = id_added + " : " + name;
    selectobject.appendChild(option);
}










let todo_sForm = document.getElementById("todo_sform");
let listid = document.getElementById("todolistid").value;
if (todo_sForm != null) {


    let request = new XMLHttpRequest();
    request.addEventListener('load', receiveTodo_s);
    request.open('POST', 'getTodosByListID.php', true);
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.send("listid=" + listid);




    todo_sForm.addEventListener('submit', function (event) {
        let inputs = todo_sForm.getElementsByTagName('div');

        for (var i = 0; i < inputs.length - 1; i++){
            if (inputs[i].children[0].checked) { 
                if (document.activeElement.getAttribute('value') == "Complete")          
                    delete_completeTodo_s(inputs[i].children[0].value,"complete_toDo.php");
                else if (document.activeElement.getAttribute('value') == "Delete")
                    delete_completeTodo_s(inputs[i].children[0].value,"delete_toDo.php");
            }

        }

        event.preventDefault();
    });



}


function delete_completeTodo_s(id_todelete,header) { 
    console.log(id_todelete);

    let deletexmlhttp = new XMLHttpRequest();
    deletexmlhttp.open("POST", header, true);
    deletexmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    deletexmlhttp.onreadystatechange = function () {
        if (this.readyState === 4 || this.status === 200) {
            let todo_s = JSON.parse(this.responseText);
            updateScreen(todo_s);
        }
    };
    deletexmlhttp.send("to_doID=" + id_todelete + "&listid=" + listid);
    event.preventDefault();
}

function receiveTodo_s() {
    let todo_s = JSON.parse(this.responseText);
    updateScreen(todo_s);
} 

function updateScreen(todo_s) {
    todo_sForm.innerHTML = ``;
    if (todo_s.length > 0) {
        todo_s.forEach(element => {      
            todo_sForm.innerHTML += `<div>
        <input type="checkbox" id=${element.toDO_id} name="to_do" value="${element.toDO_id}">
        <label for="${element.toDO_id}"> ${element.toDO_description} 
        &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;${element.toDO_deadline}
        &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp;
        ${element.toDO_priority}
        &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp;
        ${element.toDo_isCompleted}
        </label>
      </div>`;           
        });

        todo_sForm.innerHTML += `<div id=formbuttons>
        <input id="Complete Tasks" type="submit" value ="Complete">
        <input id="Delete Tasks" type="submit" value ="Delete">
        </div>`; 
    }
}


