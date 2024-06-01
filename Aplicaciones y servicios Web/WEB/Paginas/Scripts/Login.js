async function Ingresar() {
    let Usuario = document.getElementById('txtUsuario').value;
    let Clave = document.getElementById("txtClave").value;

    DatosLogin =
    {
        Usuario: Usuario,
        Password: Clave
    }
    
    //Invocamos el servicio de empleados de nuestra api, para realizar el proceso de inserción
    try {
        const Respuesta = await fetch("https://localhost:44374/api/Login/Ingresar",
            {
                method: "POST",
                mode: "cors",
                headers: {
                    "content-type": "application/json",
                },
                body: JSON.stringify(DatosLogin)
            }
        );
        const Rpta = await Respuesta.json();
        //alert(Rpta.Error);
        if (Rpta == null) {
            document.cookie = "token=0;path=/";
            //Hubo un error al procesar el comando
            $("#dvMensaje").removeClass("alert alert-success");
            $("#dvMensaje").addClass("alert alert-danger");
            $("#dvMensaje").html("El usuario no está registrado u olvidó la clave");
        }
        else {
            const extdays = 5;
            const d = new Date();
            d.setTime(d.getTime() + (extdays * 24 * 60 * 60 * 1000));
            let expires = ";expires=" + d.toUTCString();
            //alert(Rpta[0].Perfil);
            document.cookie = "token=" + Rpta[0].Token + expires + ";path=/";
            $("#dvMensaje").removeClass("alert alert-danger");
            $("#dvMensaje").addClass("alert alert-success");
            $("#dvMensaje").html(Rpta[0].Autenticado);
            window.location.href = Rpta[0].PaginaNavegar;
        }
    }
    catch (error) {
        $("#dvMensaje").removeClass("alert alert-success");
        $("#dvMensaje").addClass("alert alert-danger");
        $("#dvMensaje").html(error);
    }
}