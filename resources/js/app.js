import './bootstrap';
import 'flowbite';


// let botonesEliminar = document.getElementsByClassName('bt-eliminar');


// Array.from(botonesEliminar).forEach(boton => (
//   boton.addEventListener('click', e => (
//     console.log(boton.parentNode)
//   ))
// ));

let botonesEliminar = document.querySelectorAll('.bt-eliminar');

let urlEliminar = '';

botonesEliminar.forEach((boton) => {
  boton.addEventListener('click', (e) => {
    let idElemento = boton.parentNode.id;
    console.log(idElemento);
  });
});