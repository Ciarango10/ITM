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
    [RoutePrefix("api/TipoProductos")]
    [Authorize]
    public class TipoProductosController : ApiController
    {
        // GET api/<controller>
        public List<TIpoPRoducto> Get()
        {
            clsTipoProducto clsTipoProducto = new clsTipoProducto();
            return clsTipoProducto.ConsultarActivos();
        }

        [HttpGet]
        [Route("LlenarCombo")]
        public IQueryable LlenarCombo()
        {
            clsTipoProducto _tipoProducto = new clsTipoProducto();
            return _tipoProducto.LlenarCombo();
        }
    }

}
