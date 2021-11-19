"use strict"

const COMMENT_URL = "api/comentarios";

async function getComments(){
        try{
            let response = await fetch(COMMENT_URL);
            let comentarios = await response.json(); 
    
            console.log(comentarios);
            render(comentarios);
        } catch (error){
            console.log(error);
        }
}
    
    function render(comentarios){  //falta poder mostrar el usuario y el libro en cada item
        let list = document.querySelector("#list-comments");
        list.innerHTML = "";
        for (let comentario of comentarios){
            let html = `<li> ${comentario.detalle} </li>`;
            list.innerHTML += html;
        }  
    }
   

    //cargar un comentario

    //document.querySelector(".form-comment").addEventListener("submit", agregarTarea);
   
        async function addComment(){ 
            console.log("funcionabtn");
             //e.preventDefault();

        let comentario = document.querySelector("#comentario").value;
        let libro = document.querySelector("#libro").value;
        let usuario = document.querySelector("#usuario").value;
        let comments={
            "comentario": comentario,
            "libro":libro,
            "usuario":usuario
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
/*async function deleteComment(id){
    
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
    } */



     
    