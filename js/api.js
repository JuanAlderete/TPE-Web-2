"use strict"

const API_URL = "api/libros"  // http://localhost/TPE2-flor/TPE-Web-2/api/libros

async function getLibros(){
    // fetch para traer los libros
    try{
        let response = await fetch(API_URL);
        let libros = await response.json(); 

        console.log(libros);
        render(libros);
    } catch (error){
        console.log(error);
    }
}

function render(libros){
    let list = document.querySelector("#list-books");
    list.innerHTML = "";
    for (let libro of libros){
        let html = `<li> ${libro.titulo} </li>`;
        list.innerHTML += html;
    }  
}

getLibros();