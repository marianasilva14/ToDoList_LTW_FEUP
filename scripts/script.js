list = document.getElementsByClassName("wrapper");

if (list != null) {

    let forms = document.getElementsByTagName('form');

    forms[2].addEventListener('submit', function (event) {
        let id = forms[2].children[0].value;
        id = parseInt(id, 10);

        let xmlhttp = new XMLHttpRequest();
        xmlhttp.open("POST", "delete_to_do_list.php", true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.onreadystatechange = function () {
            if (this.readyState === 4 || this.status === 200) {
                updateDropdownsAndScreen_Todolists(id); // echo from php
            }
        };
        xmlhttp.send("to_do_listID=" + id);


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
}