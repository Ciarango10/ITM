﻿using Servicios.Clases;
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
    public class ProductosController : ApiController
    {
        // GET api/<controller>
        public PRODucto Get(int id)
        {
            clsProducto _producto = new clsProducto();
            return _producto.Consultar(id);
        }

        // POST api/<controller>
        public string Post([FromBody] PRODucto producto)
        {
            clsProducto _producto = new clsProducto();
            _producto.producto = producto;
            return _producto.Insertar();
        }

        // PUT api/<controller>/5
        public string Put([FromBody] PRODucto producto)
        {
            clsProducto _producto = new clsProducto();
            _producto.producto = producto;
            return _producto.Actualizar();
        }

        // DELETE api/<controller>/5
        public string Delete([FromBody] PRODucto producto)
        {
            clsProducto _producto = new clsProducto();
            _producto.producto = producto;
            return _producto.Eliminar();
        }
    }
}