var button = document.getElementById('New');
button.addEventListener('click', Add);

var divclick = document.getElementById("ft_list");

var i = 0;

function Add(){
    var content = prompt("Nouvel élément :");
    var newDiv = document.createElement("div");
    document.cookie = content;
    newDiv.innerHTML = content;
    newDiv.addEventListener('click', Remove);



    if(content.trim()){
        var currentDiv = document.getElementById('ft_list').prepend(newDiv);
    }
    document.cookie = "todo" + i + "=" + content + ";";
        i++;    
}


function Remove(){
    if(confirm("Êtes vous sûr de vouloir supprimer cet élément ?"))
        this.parentElement.removeChild(this);
}


