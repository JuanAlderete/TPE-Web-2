"use strict"

const COMMENT_URL = "api/comentarios";
const formulario= document.querySelector(".form-comments");

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
        
        list.innerHTML = "";
        for (let comentario of comentarios){
            let html = `<li> ${comentario.comentario} Calificacion: ${comentario.calificacion}  <button data-id="${comentario.id}" class="b-borrar" >Borrar</button></li>`;
            list.innerHTML += html;
        }  
        
    }
    getComments(); 
    //document.querySelector(".form-comment").addEventListener("submit", agregarTarea);
    document.querySelector(".btn-comment").addEventListener('click', addComment);

    async function addComment(){ //(arreglar)
            console.log("funcionabtn");
             //e.preventDefault();
        let comentario = document.querySelector("#comentario").value;
        let calificacion = document.querySelector("#calificacion").value;
        let comments={
            "comentario": comentario, 
            //"fk_id_libro": fk_id_libro,
            //"fk_id_user":fk_id_user, 
            "calificacion": calificacion
        }
        
        try {
            let response = await fetch(COMMENT_URL, {
                "method": "POST",
                "headers": { "Content-type": "application/json" },
                "body": JSON.stringify(comments)
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


   