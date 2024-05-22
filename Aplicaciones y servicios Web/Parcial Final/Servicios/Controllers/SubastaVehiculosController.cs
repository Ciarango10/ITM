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
    [EnableCors(origins: "https://localhost:44347", headers: "*", methods: "*")]
    [RoutePrefix("api/SubastaVehiculos")]
    public class SubastaVehiculosController : ApiController
    {
        [HttpGet]
        [Route("ConsultarSubasta")]
        public SubastaVehiculo ConsultarSubasta(int idSubastaVehiculos)
        {
            clsSubastaVehiculo subastaVehiculo = new clsSubastaVehiculo();
            return subastaVehiculo.Consultar(idSubastaVehiculos);
        }

        [HttpGet]
        [Route("ListarSubastas")]
        public List<SubastaVehiculo> ListarSubastas()
        {
            clsSubastaVehiculo subastaVehiculo = new clsSubastaVehiculo();
            return subastaVehiculo.ConsultarTodos();
        }

        [HttpGet]
        [Route("ConsultarConTipoVehiculo")]
        public IQueryable ConsultarConTipoVehiculo()
        {
            clsSubastaVehiculo subastaVehiculo = new clsSubastaVehiculo();
            return subastaVehiculo.ConsultarConTipoVehiculo();
        }

        [HttpPost]
        [Route("CrearSubasta")]
        public string CrearSubasta([FromBody] SubastaVehiculo _subastaVehiculo)
        {
            clsSubastaVehiculo subastaVehiculo = new clsSubastaVehiculo();
            subastaVehiculo.subastaVehiculo = _subastaVehiculo;
            return subastaVehiculo.Insertar();
        }

        [HttpPut]
        [Route("ActualizarSubasta")]
        public string ActualizarSubasta([FromBody] SubastaVehiculo _subastaVehiculo)
        {
            clsSubastaVehiculo subastaVehiculo = new clsSubastaVehiculo();
            subastaVehiculo.subastaVehiculo = _subastaVehiculo;
            return subastaVehiculo.Actualizar();
        }

        public void Delete(int id)
        {
        }
    }
}