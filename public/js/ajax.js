window.onload = function() {
    read();
    modal = document.getElementById("modal");
}

function objetoAjax() {
    var xmlhttp = false;
    try {
        xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
    } catch (e) {
        try {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        } catch (E) {
            xmlhttp = false;
        }
    }
    if (!xmlhttp && typeof XMLHttpRequest != 'undefined') {
        xmlhttp = new XMLHttpRequest();
    }
    return xmlhttp;
}

/* Muestra todos los registros de la base de datos (sin filtrar y filtrados) */
function read() {
    var section = document.getElementById('section-3');
    // var buscador = document.getElementById('searchPokemon').value;
    var ajax = new objetoAjax();
    var token = document.getElementById('token').getAttribute('content');
    // Busca la ruta read y que sea asyncrono
    ajax.open('POST', 'read', true);
    var datasend = new FormData();
    // datasend.append('filtro', buscador);
    datasend.append('_token', token);
    ajax.onreadystatechange = function() {
        if (ajax.readyState == 4 && ajax.status == 200) {
            var respuesta = JSON.parse(ajax.responseText);
            var tabla = '';
            tabla += '<div>'
            tabla += '<div class="container">';
            tabla += '<table class="table table-striped">'
            tabla += '<tr class="thead-dark">'
            tabla += '<th>ID</th>'
            tabla += '<th>Titulo</th>'
            tabla += '<th>Descripcion</th>'
            tabla += '<th>Editar</th>'
            tabla += '<th>Borrar</th>'
            tabla += '</tr>'
            for (let i = 0; i < respuesta.length; i++) {
                //const element = array[i];
                tabla += '<tr>'
                tabla += '<td>' + respuesta[i].id + '</td>';
                tabla += '<td>' + respuesta[i].title + '</td>';
                tabla += '<td>' + respuesta[i].description + '</td>';
                tabla += '<td><button class="btn btn-info" onclick="openModal(' + respuesta[i].id + ',&#039' + respuesta[i].title + '&#039,&#039' + respuesta[i].description + '&#039)">Editar Nota</button></td>';
                tabla += '<td><button class="btn btn-danger" onclick="eliminar(' + respuesta[i].id + ')">Eliminar nota</button></td><br>';
                tabla += '</tr>'
            }

            tabla += '</table>'
            tabla += '</div>';
            section.innerHTML = tabla;
        }
    }
    ajax.send(datasend);
}

function openModal(id, title, description) {
    //alert(nombre);
    modal.style.display = "block";
    document.getElementById('id').value = id;
    document.getElementById('title2').value = title;
    document.getElementById('description2').value = description;
}

function closeModal() {
    modal.style.display = "none";
}

window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

/* Actualiza el campo favorito de un pokemon en la base de datos */
function crear() {
    // var mensaje = document.getElementById('mensaje');
    var ajax = new objetoAjax();
    var token = document.getElementById('token').getAttribute('content');
    ajax.open('POST', 'crear', true);
    var datos = new FormData();
    datos.append('title', title.value);
    datos.append('description', description.value);
    datos.append('_token', token)
    ajax.onreadystatechange = function() {
        if (ajax.readyState == 4 && ajax.status == 200) {
            var respuesta = JSON.parse(ajax.responseText);
            // var tabla = '';
            // mensaje.innerHTML = 'Pokemon '+num+' agregado a favorito';

            if (respuesta.resultado == 'OK') {
                mensaje.innerHTML = 'Nota creada';
            } else {
                mensaje.innerHTML = 'Ha ocurrido un error.' + respuesta.resultado;
            }
            read();
        }
    }
    ajax.send(datos);
}

/* Actualiza el campo imagen de un pokemon en la base de datos */
function eliminar(id) {
    //var mensaje = document.getElementById('message');
    var token = document.getElementById("token").getAttribute("content");
    var ajax = new objetoAjax();
    ajax.open('POST', 'eliminar', true);
    var datasend = new FormData();
    //alert(id);
    datasend.append('id', id);
    datasend.append('_token', token);
    ajax.onreadystatechange = function() {
        if (ajax.readyState == 4 && ajax.status == 200) {

        }
        read();
    }
    ajax.send(datasend);
}

function updateNota() {
    var ajax = new objetoAjax();
    var token = document.getElementById('token').getAttribute('content');
    var id = document.getElementById('id').value;
    var title = document.getElementById('title2').value;
    var description = document.getElementById('description2').value;
    ajax.open('POST', 'updateNota', true);
    var datasend = new FormData();
    datasend.append('id', id);
    datasend.append('title', title);
    datasend.append('description', description);
    datasend.append('_token', token);
    ajax.onreadystatechange = function() {
        if (ajax.readyState == 4 && ajax.status == 200) {
            var respuesta = JSON.parse(ajax.responseText);
        }
        closeModal();
        read();
    }
    ajax.send(datasend);
}