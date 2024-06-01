using Servicios.Models;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;

namespace Servicios_Jueves.Clases
{
    public class clsFacturacion
    {
        private DBSuperEntities dbSuper = new DBSuperEntities();
        public  FACTura factura { get; set; }
        public  DEtalleFActura detalleFactura { get; set; }
        public string GrabarFactura()
        {
            factura.Numero = CalcularNumeroFactura();
            factura.Fecha = DateTime.Now;
            dbSuper.FACTuras.Add(factura);
            dbSuper.SaveChanges();
            return factura.Numero.ToString();
        }
        private int CalcularNumeroFactura()
        {
            return dbSuper.FACTuras.Select(f => f.Numero).DefaultIfEmpty(0).Max() + 1;
        }
        public string GrabarDetalle()
        {
            dbSuper.DEtalleFActuras.Add(detalleFactura);
            dbSuper.SaveChanges();
            return detalleFactura.Numero.ToString();
        }
        public IQueryable LlenarTablaFactura(int Numero)
        {
            return from F in dbSuper.Set<FACTura>()
                   join DF in dbSuper.Set<DEtalleFActura>()
                   on F.Numero equals DF.Numero
                   join P in dbSuper.Set<PRODucto>()
                   on DF.CodigoProducto equals P.Codigo
                   join TP in dbSuper.Set<TIpoPRoducto>()
                   on P.CodigoTipoProducto equals TP.Codigo
                   where F.Numero == Numero
                   select new
                   {
                       Eliminar = "<button type=\"button\" id=\"btnEliminar\" class=\"btn-block btn-sm btn-danger\" " +
                                "onclick=\"Eliminar(" + DF.Codigo + ")\">ELIMINAR</button>",
                       Cod_tipo_producto = TP.Codigo,
                       Tipo_producto = TP.Nombre,
                       Codigo = P.Codigo,
                       Producto = P.Nombre,
                       Cantidad = DF.Cantidad,
                       ValorUnitario = DF.ValorUnitario
                   };
        }
        public string Eliminar(int idCodigoDetalleFactura)
        {
            DEtalleFActura dEtalleFActura = dbSuper.DEtalleFActuras.FirstOrDefault(d => d.Codigo == idCodigoDetalleFactura);
            dbSuper.DEtalleFActuras.Remove(dEtalleFActura);
            dbSuper.SaveChanges();
            return "Se eliminó el detalle";
        }
    }
}