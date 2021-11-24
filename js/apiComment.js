"use strict"

const COMMENT_URL = "api/comentarios/";
const formulario= document.querySelector(".form-comments");

//document.querySelector(".form-comment").addEventListener("submit", agregarTarea);
document.querySelector(".btn-comment").addEventListener('click', addComment);

async function getComments(){
        try{
            let response = await fetch(COMMENT_URL);
            let comentarios = await response.json(); 
    
            console.log(comentarios);
            render(comentarios);
        } catch (error){
            console.log(error);
        }
        document.querySelectorAll(".b-borrar").forEach((borrar)=> {
            borrar.addEventListener('click',()=>{
            deleteComment(borrar.dataset);
            });
        });
}
/*async function getComments(){
    try {
        let idBook= formulario.getAttribute('data-idBook');
        let response=await fetch (COMMENT_URL + "/book" +"/${idBook}");
    } catch (error) {
        
    }
}*/

function render(comentarios){  //falta poder mostrar el comentario de cada item
    let list = document.querySelector("#list-comments");
    let book = document.querySelector('#idbook').getAttribute('data-book');
    
    list.innerHTML = "";
    for (let comentario of comentarios){
        if (book == `${comentario.fk_id_libro}`){
        let html = `<li> ${comentario.detalle} Calificacion: ${comentario.calificacion}  <button data-id="${comentario.id}" class="b-borrar" >Borrar</button></li>`;
        list.innerHTML += html;
        }
    }  
    
}

async function addComment(){ //(arreglar)
        console.log("funcionabtn");
            //e.preventDefault();
    let comentario = document.querySelector("#comentario").value;
    let calificacion = document.querySelector("#calificacion").value;
    let fk_id_libro = document.querySelector('#idbook').getAttribute('data-book');
    let fk_id_user = document.querySelector('#user').getAttribute('data-user');
    let comments={
        "detalle": comentario, 
        "calificacion": calificacion,
        "fk_id_libro": fk_id_libro,
        "fk_id_user":fk_id_user
    };
    
    try {
        let response = await fetch(COMMENT_URL, {
            method: 'POST',
            body: JSON.stringify(comments),
            headers: {
                'Content-Type': 'application/json'
            }
        });
        
        if (response.status == 201) {
            console.log("response");
        }
    } catch (error) {
        console.log(error);
        }   
}

// funcion borrar comentario (funciona)
async function deleteComment(id){
    console.log(id.id);
    console.log("funciona borrar");
    try{
        let response= await fetch (`${COMMENT_URL}/${id.id}`,{
            "method": "DELETE"
    });
        if(response.ok){
            getComments();
        }
    }catch(error){
            console.log(error)
        }
}

getComments();
// function getIdBookUrl(){
//     //Se obtiene el valor de la URL desde el navegador
//     var actual = window.location+'';
//     //Se realiza la división de la URL
//     var split = actual.split("/");
//     //Se obtiene el ultimo valor de la URL
//     var id = split[split.length-1];
//     console.log(id);
//     return id;
// }