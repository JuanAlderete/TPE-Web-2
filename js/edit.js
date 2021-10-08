document.addEventListener("DOMContentLoaded", function (e) {
"use strict";

document.querySelectorAll(".get_book_id").forEach(btn=>{
    btn.addEventListener('click', ()=>{
        getBookId(btn.dataset.id);
    });
})   

function getBookId(id){
document.querySelector("#editBook").classList.remove("hide");
document.querySelector("#createBook").classList.add("hide");

document.querySelector("#edit").value=id;
}

document.querySelector("#cancelEdit").addEventListener('click', cancelEdit);

function cancelEdit(){
    document.querySelector("#editBook").classList.add("hide");
document.querySelector("#createBook").classList.remove("hide");
}

});

//function edit author
document.querySelectorAll(".get_author_id").forEach(btn=>{
    btn.addEventListener('click', ()=>{
        getAuthorId(btn.dataset.id);
    });
   

function getAuthorId(id){

document.querySelector("#editAuthor").classList.remove("hide");
document.querySelector("#createAuthor").classList.add("hide");

document.querySelector("#editA").value=id;
}

document.querySelector("#cancelEditAuthor").addEventListener('click', cancelEdit);

function cancelEdit(){
    document.querySelector("#editAuthor").classList.add("hide");
document.querySelector("#createAuthor").classList.remove("hide");
}



});