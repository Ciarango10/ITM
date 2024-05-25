async function LlenarTablaXServicios(URLServicio, TablaLlenar) {
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
        //Se recorre en un ciclo para llenar la tabla, con encabezados y los campos
        //Llena el encabezado
        var Columnas = [];
        NombreColumnas = Object.keys(Rpta[0]);
        for (var i in NombreColumnas) {
            Columnas.push({
                data: NombreColumnas[i],
                title: NombreColumnas[i]
            });
        }
        //Llena los datos
        $(TablaLlenar).DataTable({
            data: Rpta,
            columns: Columnas,
            destroy: true
        });
    }
    catch (error) {
        //Se presenta la respuesta en el div mensaje
        $("#dvMensaje").html(error);
    }
}
async function LlenarTablaServiciosAuth(url, Tabla) {
    //Llamar el servicio de Productos, para el método post
    try {
        let Token = getCookie("token");
        const Respuesta = await fetch(url,
            {
                method: "GET",
                mode: "cors",
                headers: {
                    "content-type": "application/json",
                    'Authorization': 'Bearer ' + Token
                }
            }
        );
        const Rpta = await Respuesta.json();
        //Llena la tabla de productos: tblProducto
        //Llena el encabezado
        var columns = [];
        columnNames = Object.keys(Rpta[0]);
        for (var i in columnNames) {
            columns.push({
                data: columnNames[i],
                title: columnNames[i]
            });
        }
        //Llena los datos
        $(Tabla).DataTable({
            data: Rpta,
            columns: columns,
            destroy: true
        });
    }
    catch (error) {
        $("#dvMensaje").removeClass("alert alert-success");
        $("#dvMensaje").addClass("alert alert-danger");
        $("#dvMensaje").html(error);
    }
}