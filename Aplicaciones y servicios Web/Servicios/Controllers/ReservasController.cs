using Servicios.Clases;
using Servicios.Models;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Net;
using System.Net.Http;
using System.Web.Http;
using System.Web.Http.Cors;

namespace Servicios.Controllers
{
    [EnableCors(origins: "https://localhost:44350", headers: "*", methods: "*")]
    public class ReservasController : ApiController
    {
        // POST api/<controller>
        public string Post([FromBody] ReservaEscenario reserva)
        {
            //Crear el objeto de la clase que hace el proceso
            clsReserva _reserva  = new clsReserva();
            //Se pasa la informacion con los datos de entrada
            _reserva.reserva = reserva;
            //Invoca el metodo que graba informacion en la base de datos
            return _reserva.Insertar();
        }
    }
}