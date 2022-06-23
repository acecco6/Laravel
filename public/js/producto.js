function borrar(buton) {
    fetch("http://127.0.0.1:8000/api/productos/"+buton.getAttribute("data-id"), 
    {
        method: 'DELETE'
    })
    .then(res => res.json())
    .catch(error => console.error('Error:', error))
    .then((response)=>{
        // console.log(response)
        buton.parentNode.parentNode.remove()
        document.getElementsByClassName("modal_delete")[0].classList.add("modalAnimation")
        setTimeout(() => {
            document.getElementsByClassName("modal_delete")[0].classList.remove("modalAnimation")
        }, 1500);
    })
    
}

window.onload = function(){
    let modal = document.getElementById("modal_succes")
    if (modal != null) {
        setTimeout(() => {
            modal.remove()    
        }, 2000);
    }
} 

