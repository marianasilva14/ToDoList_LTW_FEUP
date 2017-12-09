list = document.getElementsByClassName("wrapper");

if (list != null) {
    
    let forms = document.getElementsByTagName('form');
    let todolists=document.getElementById("todolists")
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
                if(id_added!="" && id_added != null)
                add_to_do_list(id_added, category, name);
            }
        };
        xmlhttp.send("category=" + category + "&name=" + name);
        event.preventDefault();
    });

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
    document.getElementById("todolists").innerHTML +=
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