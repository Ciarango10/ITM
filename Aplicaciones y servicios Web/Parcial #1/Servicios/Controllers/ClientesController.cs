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
    [EnableCors(origins: "https://localhost:44305", headers: "*", methods: "*")]
    public class ClientesController : ApiController
    {
        // GET api/<controller>
        public IEnumerable<string> Get()
        {
            return new string[] { "value1", "value2" };
        }

        // GET api/<controller>/5
        public string Get(int id)
        {
            return "value";
        }

        // POST api/<controller>
        public string Post([FromBody] tblExamen_Natillera cliente)
        {
            //Crear el objeto de la clase que hace el proceso
            clsCliente _cliente = new clsCliente();
            //Se pasa la informacion con los datos de entrada
            _cliente.cliente = cliente;
            //Invoca el metodo que graba informacion en la base de datos
            return _cliente.Insertar(cliente);
        }

        // PUT api/<controller>/5
        public void Put(int id, [FromBody] string value)
        {
        }

        // DELETE api/<controller>/5
        public void Delete(int id)
        {
        }
    }
}