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
    public class TipoVehiculosController : ApiController
    {
        [EnableCors(origins: "https://localhost:44347", headers: "*", methods: "*")]
        public IQueryable Get()
        {
            clsTipoVehiculo tipoVehiculo = new clsTipoVehiculo();
            return tipoVehiculo.ListarTiposVehiculos();
        }
    
    }
}