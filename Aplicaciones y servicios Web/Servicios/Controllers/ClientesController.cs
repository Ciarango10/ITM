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
    [EnableCors(origins: "https://localhost:44350", headers: "*", methods:"*")]
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
        public string Post([FromBody] CLIEnte Cliente)
        {
            //El metodo post permite grabar en la base de datos
            //recibe un objeto de tipo cliente y se lo pasara a la clase clsCliente 
            //para que haga el proceso en la base de datos.
            clsCliente _cliente = new clsCliente();
            _cliente.cliente = Cliente;
            return _cliente.Insertar();
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