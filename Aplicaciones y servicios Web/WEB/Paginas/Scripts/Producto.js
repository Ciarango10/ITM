var oTabla = $("#tblProductos").DataTable();
jQuery(function () {
    //Registrar los botones para responder al evento click
    $("#dvMenu").load("../Paginas/Menu.html");

    //Llenar el combo de tipo producto
    LlenarComboTipoProducto();
    //Llenar la tabla de productos
    LlenarTablaProductos();

    //Levantar el evento click del boton insertar
    $("#btnInsertar").on("click", () => {
        EjecutarComando("POST");
    });

    $("#btnActualizar").on("click", () => {
        EjecutarComando("PUT");
    });

    $("#btnEliminar").on("click", () => {
        EjecutarComando("DELETE");
    });

    $("#btnConsultar").on("click", () => {
        Consultar();
    });
});

async function LlenarTablaProductos() {
    LlenarTablaXServicios("https://localhost:44374/api/Productos", "#tblProductos");
}

async function LlenarComboTipoProducto() {
    LlenarComboXServicios("https://localhost:44374/api/TipoProductos", "#cboTipoProducto");
}

//async function LlenarTablaProductos() {
//    try {
//        const Respuesta = await fetch("https://localhost:44374/api/Productos",
//            {
//                method: "GET",
//                mode: "cors",
//                headers: { "Content-Type": "application/json" },
//            });
//        //Leer la respuesta y presentarla en el div
//        const Resultado = await Respuesta.json();
//        //Con la respuesta se llena la tabla
//        //Llena el encabezado
//        var Columnas = [];
//        NombreColumnas = Object.keys(Resultado[0]);
//        for (var i in NombreColumnas) {
//            Columnas.push({
//                data: NombreColumnas[i],
//                title: NombreColumnas[i]
//            });
//        }
//        //Llena los datos
//        $("#tblProductos").DataTable({
//            data: Resultado,
//            columns: Columnas,
//            destroy: true
//        });
//    }
//    catch (error) {
//        $("#dvMensaje").html(error);
//    }
//}

//async function LlenarComboTipoProducto() {
//    try {
//        const Respuesta = await fetch("https://localhost:44374/api/TipoProductos",
//            {
//                method: "GET",
//                mode: "cors",
//                headers: { "Content-Type": "application/json" },
//            });
//        //Leer la respuesta y presentarla en el div
//        const Resultado = await Respuesta.json();
//        //Con la respuesta se llena el combo
//        for (let i = 0; i < Resultado.length; i++) {
//            $("#cboTipoProducto").append(`<option value="${Resultado[i].Codigo}">${Resultado[i].Nombre}</option>`);
//        }
//    }
//    catch (error) {
//        $("#dvMensaje").html(error);
//    }
//}

async function EjecutarComando(Comando) {
    //Capturar los datos de entrada
    let Codigo = $("#txtCodigo").val();
    let Nombre = $("#txtNombre").val();
    let Descripcion = $("#txtDescripcion").val();
    let Cantidad = $("#txtCantidad").val();
    let ValorUnitario = $("#txtValorUnitario").val();
    let CodigoTipoProducto = $("#cboTipoProducto").val();

    if (CodigoTipoProducto == 0) {
        $("#dvMensaje").html("Debe elegir un tipo de producto");
        return;
    }

    //Construir la estructura JSON para enviar la informacion al servidor
    let DatosProducto = {
        Codigo: Codigo,
        Nombre: Nombre,
        Descripcion: Descripcion,
        Cantidad: Cantidad,
        ValorUnitario: ValorUnitario,
        CodigoTipoProducto: CodigoTipoProducto
    }

    //Invocar la función fetch para grabar en la base de datos, a través del servicio
    //La función fetch de javascript, permite invocar un servicio en la nube
    //fetch("Ruta del servicio", Opciones para la ejecución: Comando que se ejecuta: POST, PUT, GET, DELETE, modo de conexión,
    //el tipo de dato que se envía, los datos)
    //En el body, se envían los datos al servicio, en formato json
    //Javascript, tiene una librería JSON, que permite convertir la variable en formato json
    try {
        const Respuesta = await fetch("https://localhost:44374/api/Productos",
            {
                method: Comando,
                mode: "cors",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify(DatosProducto)
            });
        //Leer la respuesta y presentarla en el div
        const Resultado = await Respuesta.json();
        LlenarTablaProductos();
        $("#dvMensaje").html(Resultado);
    }
    catch (error) {
        $("#dvMensaje").html(error);
    }
}

async function Consultar() {
    try {
        //Capturar los datos de entrada
        let Codigo = $("#txtCodigo").val();
        //Invoca el fetch
        const Respuesta = await fetch("https://localhost:44374/api/Productos?id=" + Codigo,
            {
                method: "GET",
                mode: "cors",
                headers: { "Content-Type": "application/json" },
            });
        //Leer la respuesta y presentarla en el div
        const Resultado = await Respuesta.json();
        //La respuesta se escribe en los campos
        $("#txtNombre").val(Resultado.Nombre);
        $("#txtDescripcion").val(Resultado.Descripcion);
        $("#txtCantidad").val(Resultado.Cantidad);
        $("#txtValorUnitario").val(Resultado.ValorUnitario);
        $("#cboTipoProducto").val(Resultado.CodigoTipoProducto);
    }
    catch (error) {
        $("#dvMensaje").html(error);
    }
}