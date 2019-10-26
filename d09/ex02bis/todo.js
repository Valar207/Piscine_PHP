var elems;
var cookie = [];

$(document).ready(function(){
    $('#New').click(newTodo);
    $('#ft_list div').click(deleteTodo);
    elems = $('#ft_list');
    var tmp = document.cookie;
    if (tmp) {
        cookie = JSON.parse(tmp);
        cookie.forEach(function (e) {
            addTodo(e);
        });
    }
});

$(window).unload(function(){
    var todo = ft_list.children();
    var newCookie = [];
    for (var i = 0; i < todo.length; i++)
        newCookie.unshift(todo[i].innerHTML);
    document.cookie = JSON.stringify(newCookie);
})

function newTodo(){
    var todo = prompt("Nouvel élément :", '');
    if (todo !== '' && todo.trim()) {
        addTodo(todo)
    }
}

function addTodo(todo){
    elems.prepend($('<div>' + todo + '</div>').click(deleteTodo));
}

function deleteTodo(){
    if (confirm("Êtes vous sûr de vouloir supprimer cet élément ?")){
        this.remove();
    }
}