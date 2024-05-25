async function LlenarComboXServicios(URLServicio, ComboLlenar) {
    //Debe ir a la base de datos y llenar la información del combo de tipo producto
    //Invocamos el servicio a través del fetch, usando el método fetch de javascript
    try {
        const Respuesta = await fetch(URLServicio,
            {
                method: "GET",
                mode: "cors",
                headers: {
                    "Content-Type": "application/json"
                }
            });
        const Rpta = await Respuesta.json();
        //Se debe limpiar el combo
        $(ComboLlenar).empty();
        //Se recorre en un ciclo para llenar el select con la información
        for (i = 0; i < Rpta.length; i++) {
            $(ComboLlenar).append('<option value=' + Rpta[i].Codigo + '>' + Rpta[i].Nombre + '</option>');
        }
    }
    catch (error) {
        //Se presenta la respuesta en el div mensaje
        $("#dvMensaje").html(error);
    }
}
async function LlenarComboServiciosAuth(url, combo) {
    try {
        let ValorCookie = getCookie("token");
        
        const Respuesta = await fetch(url,
            {
                method: "GET",
                mode: "cors",
                headers: {
                    "content-type": "application/json",
                    'Authorization': 'Bearer ' + ValorCookie
                }
            }
        );
        const Rpta = await Respuesta.json();
        //Recorrer la respuesta en Rpta, para agregarla al combo de tipo de producto
        $(combo).empty();
        //Se recorre la respuesta
        for (i = 0; i < Rpta.length; i++) {
            $(combo).append('<option value=' + Rpta[i].Codigo + '>' + Rpta[i].Nombre + '</option>');
        }
    }
    catch (error) {
        $("#dvMensaje").removeClass("alert alert-success");
        $("#dvMensaje").addClass("alert alert-danger");
        $("#dvMensaje").html(error);
    }
}