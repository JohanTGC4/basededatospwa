import { resaltaSiEstasEn } from "../lib/js/resaltaSiEstasEn.js"

export class NavTabFixed extends HTMLElement {

 connectedCallback() {
  this.classList.add("md-tab", "fixed")

  this.innerHTML = /* HTML */`
   <a ${resaltaSiEstasEn(["/index.html", "", "/"])} href="index.html">
    <span class="material-symbols-outlined">pin_drop</span>
    Listado
   </a>

   <a ${resaltaSiEstasEn(["/alta.html"])} href="alta.html">
    <span class="material-symbols-outlined">upload_file</span>
    Altas
   </a>

   <a ${resaltaSiEstasEn(["/modificaciones.html"])} href="modificaciones.html">
    <span class="material-symbols-outlined">camera</span>
    Modificaciones
   </a>
   

   <a ${resaltaSiEstasEn(["/ayuda.html"])} href="ayuda.html">
    <span class="material-symbols-outlined">help</span>
    Ayuda
   </a>`
 }

}

customElements.define("nav-tab-fixed", NavTabFixed)