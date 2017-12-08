list= document.getElementsByClassName("wrapper");

if (list != null) {
    
    let forms = document.getElementsByTagName('form');
    
    forms[2].addEventListener('submit', function (event) {
        console.log("working i guess");
        event.preventDefault();
    })
   /* for (let index = 0; index < list.length; index++) {
        if (9 == parseInt(list[index].innerText, 10))
            list[index].parentNode.removeChild(list[index]);   
    }*/
}

function closeSelf () {
    window.close();
 }