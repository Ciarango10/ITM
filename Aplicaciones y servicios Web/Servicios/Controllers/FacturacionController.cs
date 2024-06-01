using Servicios.Clases;
using Servicios.Models;
using Servicios_Jueves.Clases;
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
    [RoutePrefix("api/Facturacion")]
    [Authorize]
    public class FacturacionController : ApiController
    {
        [HttpPost]
        [Route ("GrabarEncabezado")]
        public string GrabarEncabezado(FACTura factura)
        {
            clsFacturacion facturacion = new clsFacturacion();
            facturacion.factura = factura;
            return facturacion.GrabarFactura();
        }
        [HttpPost]
        [Route("GrabarDetalle")]
        public string GrabarDetalle(DEtalleFActura DetalleFactura)
        {
            clsFacturacion facturacion = new clsFacturacion();
            facturacion.detalleFactura = DetalleFactura;
            return facturacion.GrabarDetalle();
        }
        [HttpGet]
        [Route("LlenarTablaFacturacion")]
        public IQueryable LlenarTablaFactura(int NumeroFactura)
        {
            clsFacturacion facturacion = new clsFacturacion();
            return facturacion.LlenarTablaFactura(NumeroFactura);
        }
        [HttpDelete]
        [Route("EliminarDetalle")]
        public string EliminarDetalle(int idDetalleFactura)
        {
            clsFacturacion facturacion = new clsFacturacion();
            return facturacion.Eliminar(idDetalleFactura);
        }
    }
}