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
    [Authorize]
    public class ClientesController : ApiController
    {
        // GET api/<controller>
        public IQueryable Get()
        {
            clsCliente cliente = new clsCliente();
            return cliente.ListarClientes();
        }


        // GET api/<controller>/5
        public CLIEnte Get(string Documento)
        {
            clsCliente _cliente = new clsCliente();
            return _cliente.Consultar(Documento);
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
        public string Put(int id, [FromBody] string value)
        {
            return "Sin implementar";
        }

        // DELETE api/<controller>/5
        public string Delete(int id)
        {
            return "Sin implementar";
        }
    }
}