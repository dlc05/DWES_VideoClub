
document.addEventListener("submit", (ev)=>{
    console.log(ev.target.name);
    if(ev.target.name != "deleteForm") return;
    let option = confirm("¿Desea eliminar a este cliente?");

    if(!option){
        ev.preventDefault();
    }
}, false);
