list= document.getElementsByClassName("wrapper");

if (list != null) {
    
    let forms = document.getElementsByTagName('form');
    
    forms[2].addEventListener('submit', function (event) {
        let id = forms[2].children[0].value;
        let index = 0;
        
        for (index; index < list.length; index++) {
            if (id == list[index].innerText) {
                list[index].parentNode.removeChild(list[index]);
                break;
            }
        }

        var selectobject=document.getElementById("todolistToEliminate");
        for (var i=0; i<selectobject.length; i++){
            if (selectobject.options[i].value == id) {
                selectobject.remove(i);
                break;
            } 
        }
        
        id = parseInt(id, 10);
        if (index < list.length) {
            let xmlhttp = new XMLHttpRequest();
            xmlhttp.open("POST", "delete_to_do_list.php", true);
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.onreadystatechange = function () {
                if (this.readyState === 4 || this.status === 200) {
                    console.log(this.responseText); // echo from php
                }
            };
            xmlhttp.send("to_do_listID=" + id);
        }

        event.preventDefault();
    });

}

