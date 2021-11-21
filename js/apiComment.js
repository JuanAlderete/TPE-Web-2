"use strict"

const COMMENT_URL = "api/comentarios";

/*async function getComments(){
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
*/
    function render(comentarios){  //falta poder mostrar el usuario y el libro en cada item
        let list = document.querySelector("#list-comments");
        
        list.innerHTML = "";
        for (let comentario of comentarios){
            let html = `<li> ${comentario.detalle} Calificacion: ${comentario.calificacion}  <button data-id="${comentario.id}" class="b-borrar" >Borrar</button></li>`;
            list.innerHTML += html;
        }  
        
    }


    //document.querySelector(".form-comment").addEventListener("submit", agregarTarea);
   
    async function addComment(){ 
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
    
        document.querySelector(".btn-comment").addEventListener('click', addComment);
        getComments();

// funcion borrar comentario
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


   