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
                if (this.readyState === 4 && this.status === 200) {
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
                if (this.readyState === 4 && this.status === 200) {
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
                if (this.readyState === 4 && this.status === 200) {
                    let id_added = this.responseText;

                    if (id_added == "Error") {
                        alert("Error: Check if the name of the list you tryed to create only contains letters,numbers and spaces.\nTry again!");
                    } else if (id_added != "" && id_added != null)
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
        currentId=list[index].firstElementChild.firstElementChild.firstElementChild.firstElementChild.firstElementChild.firstElementChild.innerText;

        if (id == parseInt(currentId, 10)) {
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
                            <p hidden>${id_added}</p>
                            <p>${name}</p>
                        </div>
                    </div>
                    <div class="back">
                        <div class="box2">
                            <p hidden>${id_added}</p>
                            <p>${name}</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</li>`

    var selectobject = document.getElementById("todolistToEliminate");
    var option = document.createElement('option');
    option.text = name;
    option.value = id_added;
    selectobject.appendChild(option);

    var selectobject = document.getElementById("todolistToMark");
    var option = document.createElement('option');
    option.text = name;
    option.value = id_added;
    selectobject.appendChild(option);
}










let todo_sForm = document.getElementById("todo_sform");
let listid = document.getElementById("todolistid");

if (todo_sForm != null) {


    let request = new XMLHttpRequest();
    request.addEventListener('load', receiveTodo_s);
    request.open('POST', 'getTodosByListID.php', true);
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.send("listid=" + listid.value);




    todo_sForm.addEventListener('submit', function (event) {
        let inputs = todo_sForm.getElementsByTagName('div');

        for (var i = 0; i < inputs.length - 1; i++) {
            if (inputs[i].children[0].checked) {
                if (document.activeElement.getAttribute('value') == "Complete")
                    delete_completeTodo_s(inputs[i].children[0].value, "complete_toDo.php");
                else if (document.activeElement.getAttribute('value') == "Delete")
                    delete_completeTodo_s(inputs[i].children[0].value, "delete_toDo.php");
            }
        }

        event.preventDefault();
    });


    let addTask = document.getElementById("addTaskForm");

    addTask.addEventListener('submit', function (event) {
        let description = addTask.children[0].value;
        let date = addTask.children[1].value;
        let priority = addTask.children[2].value;

        let add_xmlhttp = new XMLHttpRequest();
        add_xmlhttp.open("POST", "newToDo.php", true);
        add_xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        add_xmlhttp.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {
                let todo_s = JSON.parse(this.responseText);

                if (todo_s == "Error") {
                    alert("Error: Check if the description of the task you tryed to create only contains letters,numbers and spaces.\nTry again!");
                } else {
                    updateScreen(todo_s);
                }
            }
        };
        add_xmlhttp.send("ListID=" + listid.value + "&Description=" + description + "&Priority=" + priority + "&Deadline=" + date);

        event.preventDefault();
    });

}


function delete_completeTodo_s(id_to_change, header) {

    let delete_complete_xmlhttp = new XMLHttpRequest();
    delete_complete_xmlhttp.open("POST", header, true);
    delete_complete_xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    delete_complete_xmlhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            let todo_s = JSON.parse(this.responseText);
            updateScreen(todo_s);
        }
    };
    delete_complete_xmlhttp.send("to_doID=" + id_to_change + "&listid=" + listid.value);
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
            if (element.toDO_priority == "1") {
                priority = "images/higher.png";
            }
            else if (element.toDO_priority == "2") {
                priority = "images/medium.png";
            }
            else {
                priority = "images/lower.png";
            }
            if (parseInt(element.toDo_isCompleted)) {
                completed = "images/check.png";
            }
            else {
                completed = "images/uncheck.png";
            }
            todo_sForm.innerHTML += `<div class="box">
        <input type="checkbox" id=${element.toDO_id} name="to_do" value="${element.toDO_id}">
        <label for="${element.toDO_id}"> ${element.toDO_description}
        &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;${element.toDO_deadline}
        &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp;
        <img src="${priority}" height=25px width=25px>
        &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp;
        <img src="${completed}" height=25px width=25px>
        </label>
      </div>`;
        });

        todo_sForm.innerHTML += `<div id=formbuttons>
        <input id="CompleteTasks" type="submit" value ="Complete">
        <input id="DeleteTasks" type="submit" value ="Delete">
        </div>`;
    }

    displayCalendar();
}
