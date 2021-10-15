document.addEventListener("DOMContentLoaded", function (e) {
"use strict";

    document.querySelectorAll(".get_author_id").forEach(btn=>{
        btn.addEventListener('click', ()=>{
            getAuthorId(btn.dataset.id);
        });
    

    function getAuthorId(id){

    document.querySelector("#editAuthor").classList.add("hide");
    document.querySelector("#editAuthor").classList.remove("nohide");
    
    document.querySelector("#editA").value=id;
    }

    document.querySelector("#cancelDeleteAuthor").addEventListener('click', cancelEdit);

    function cancelEdit(){
        document.querySelector("#editAuthor").classList.add("nohide");
        document.querySelector("#editAuthor").classList.remove("hide");
    }


    });
});