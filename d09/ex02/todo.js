var elems;
var cookie = [];

window.onload = function () {
    document.querySelector("#New").addEventListener("click", newContent);
    elems = document.querySelector("#ft_list");
    var tmp = document.cookie;
    if (tmp) {
        cookie = JSON.parse(tmp);
        cookie.forEach(function (e) {
            Add(e);
        });
    }
};

window.onunload = function () {
    var todo = elems.children;
    var newCookie = [];
    for (var i = 0; i < todo.length; i++)
        newCookie.unshift(todo[i].innerHTML);
    document.cookie = JSON.stringify(newCookie);
};

function newContent(){
    var todo = prompt("Nouvel élément :", '');
    if (todo !== '' && todo.trim()) {
        Add(todo)
    }
}

function Add(todo){
    var div = document.createElement("div");
    div.innerHTML = todo;
    div.addEventListener("click", deleteTodo);
    elems.insertBefore(div, elems.firstChild);
}

function deleteTodo(){
    if (confirm("Êtes vous sûr de vouloir supprimer cet élément ?")){
        this.parentElement.removeChild(this);
    }
}