//Se define una variable de tipo datable, púlica para la página
var oTabla = $("#tblUsuarios").DataTable();
var idUsuarioPerf;
jQuery(function () {
    //Registrar los botones para responder al evento click
    $("#dvMenu").load("../Paginas/Menu.html");
    //Activar el evento de click en los botones que vamos a programar
    //Con jquery, los objetos se identifican con "$(#" al inicio del nombre del objeto

    $("#btnInsertar").on("click", () => {
        EjecutarComando("POST", "CrearUsuario");
    });
        
    $("#btnActualizar").on("click", () => {
        EjecutarComando("PUT", "ActualizarUsuario");
    });

    $("#btnActivar").on("click", () => {
        EjecutarComando("PUT", "Activar");
    });

    $("#btnResetear").on("click", () => {
        EjecutarComando("PUT", "ResetearClave");
    });

    LlenarComboPerfiles();
    LlenarTablaPerfilesEmpleados();

});

function LlenarComboPerfiles() {
    LlenarComboXServicios("https://localhost:44374/api/Perfiles/ListarPerfiles", "#cboPerfil")
}

function LlenarTablaPerfilesEmpleados() {
    LlenarTablaXServicios("https://localhost:44374/api/Usuarios/ListarUsuariosEmpleados", "#tblUsuarios");
}

function Editar(Documento, Empleado, Cargo, Usuario, idPerfil, idUsuarioPerfil, Activo) {
    $("#txtDocumento").val(Documento);
    $("#txtNombre").val(Empleado);
    $("#txtCargo").val(Cargo);
    $("#txtUsuario").val(Usuario);
    $("#cboPerfil").val(idPerfil);
    $("#chkActivo").prop("checked", Activo);
    idUsuarioPerf = idUsuarioPerfil;
}

async function Buscar() {
    try {
        //Capturar los datos de entrada
        let Documento = $("#txtDocumento").val();
        //Invoca el fetch
        const Respuesta = await fetch("https://localhost:44374/api/Empleados/ConsultarConCargo?Documento=" + Documento,
            {
                method: "GET",
                mode: "cors",
                headers: { "Content-Type": "application/json" },
            });
        //Leer la respuesta y presentarla en el div
        const Resultado = await Respuesta.json();
        //La respuesta se escribe en los campos
        $("#txtNombre").val(Resultado[0].NombreEmpleado);
        $("#txtCargo").val(Resultado[0].Cargo);
    }
    catch (error) {
        $("#dvMensaje").html(error);
    }
}

async function EjecutarComando(Comando, Metodo) {
    //Capturar los datos de entrada
    let Documento = $("#txtDocumento").val();
    let Usuario = $("#txtUsuario").val();
    let Clave = $("#txtClave").val();
    let ClaveRepita = $("#txtConfirmaClave").val();
    let idPerfil = $("#cboPerfil").val();

    if (Clave != ClaveRepita) {
        $("#dvMensaje").html("Las claves ingresadas no son iguales, por favor valide la información");
        return;
    }

    let DatosUsuario = {
        id: "0",
        Documento_Empleado: Documento,
        userName: Usuario,
        Clave: Clave,
        Salt: ""
    }

    let Extension = "";
    let sURLBase = "https://localhost:44374/api/Usuarios/";

    if (Metodo == "Activar") {
        let Activo = $("#chkActivo").is(":checked");
        Extension = Metodo + "?idUsuarioPerfil=" + idUsuarioPerf + "&Activo=" + Activo;

    } else {
        Extension = Metodo + "?idPerfil=" + idPerfil;
    }

    try {
        const Respuesta = await fetch(sURLBase + Extension,
            {
                method: Comando,
                mode: "cors",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify(DatosUsuario)
            });
        //Leer la respuesta y presentarla en el div
        const Resultado = await Respuesta.json();
        $("#dvMensaje").html(Resultado);
        LlenarTablaPerfilesEmpleados();
    }
    catch (error) {
        $("#dvMensaje").html(error);
    }
}