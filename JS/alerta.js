function confirmDelete() {
    console.log("confirmDelete function called");
    if (confirm("¿Estás seguro de que deseas eliminar la liga?")) {
        alert("Confirmed deletion");
        window.location.href = "/LigaBasket/PHP/eliminar_calendario.php";
    } else {
        alert("Deletion canceled");
    }
}

function validarYConfirmar() {
    var equipo_local = document.getElementById('equipo_local').value;
    var equipo_visitante = document.getElementById('equipo_visitante').value;

    if (equipo_local === "" || equipo_visitante === "") {
        alert('Por favor, complete toda la información antes de continuar.');
        return false;
    }

    return confirm('¿Está seguro de crear este duelo?');
}



function sesion()
{
    if($password == contrasena){
        alert("Has iniciado sesion")
    }
    else{
        alert("Correo O Contraseña Incorrecta. Vuelva A Intentaer");
    }
}