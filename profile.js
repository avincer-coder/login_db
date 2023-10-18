let boxBottom = document.querySelector(".box_perfil_bottom");
let boxTop = document.querySelector(".box_perfil_top");
let is_open = true;
boxTop.addEventListener("click", MostrarModal);

function MostrarModal (){
    if (is_open) {
        boxBottom.style.display = "block";
        is_open=false
    } else {
        boxBottom.style.display = "none";
        is_open=true
    }
}