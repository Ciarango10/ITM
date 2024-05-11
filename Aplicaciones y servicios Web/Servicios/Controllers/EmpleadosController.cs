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
    public class EmpleadosController : ApiController
    {
        // GET sin parametros, -- Invoca el ConsultarTodos
        public List<EMPLeado> Get()
        {
            clsEmpleado _empleado = new clsEmpleado();
            return _empleado.ConsultarTodos();
        }

        // GET -- Invoca el Consultar con un parametro: Documento
        public EMPLeado Get(string Documento)
        {
            clsEmpleado _empleado = new clsEmpleado();
            return _empleado.Consultar(Documento);
        }

        [HttpGet]
        [Route("api/Empleados/ConsultarConCargo")]
        // GET -- Invoca el Consultar con un parametro: Documento
        public IQueryable ConsultarConCargo(string Documento)
        {
            clsEmpleado _empleado = new clsEmpleado();
            return _empleado.ConsultarConCargo(Documento);
        }

        // POST -- Invoca el metodo Insertar
        public string Post([FromBody] EMPLeado empleado)
        {
            clsEmpleado _empleado = new clsEmpleado();
            _empleado.empleado = empleado;
            return _empleado.Insertar();
        }

        // PUT -- Invoca el metodo Actualizar
        public string Put([FromBody] EMPLeado empleado)
        {
            clsEmpleado _empleado = new clsEmpleado();
            _empleado.empleado = empleado;
            return _empleado.Actualizar();
        }

        // DELETE -- Invoca el metodo Eliminar
        public string Delete([FromBody] EMPLeado empleado)
        {
            clsEmpleado _empleado = new clsEmpleado();
            _empleado.empleado = empleado;
            return _empleado.Eliminar();
        }
    }
}