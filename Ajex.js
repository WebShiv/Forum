console.log("ajex added")
let btn = document.getElementsByClassName("fetchbtn");

btn.addEventListener("click", buttonhandler())

function buttonhandler(){
    console.log("btn clickd")
    xhr = new XMLHttpRequest;

    xhr.open('GET','Threadslist.php', true);
    
    xhr.onload = function () {
            if (xhr.status === 200) {
                document.getElementById("container").innerHTML = xhr.responseText; // inject HTML here
            } else {
                console.error("Error loading HTML:", xhr.status);
            }
        };

        xhr.send();
}