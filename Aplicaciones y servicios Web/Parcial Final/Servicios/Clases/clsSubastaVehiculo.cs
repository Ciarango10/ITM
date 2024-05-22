using Servicios.Models;
using System;
using System.Collections.Generic;
using System.Data.Entity.Migrations;
using System.Linq;
using System.Web;

namespace Servicios.Clases
{
    public class clsSubastaVehiculo
    {
        //Objeto de conexion a la bd
        private DBExamenFinalEntities dbExamenFinal = new DBExamenFinalEntities();

        public SubastaVehiculo subastaVehiculo { get; set; }

        public void CalcularComision()
        {
           subastaVehiculo.ValorComision = (float)(subastaVehiculo.ValorVenta * 0.013);
        }

        public string Insertar()
        {
            try
            {
                CalcularComision();
                dbExamenFinal.SubastaVehiculos.Add(subastaVehiculo);
                dbExamenFinal.SaveChanges();
                return "Se grabó la subasta del vehiculo con placa: " + subastaVehiculo.PlacaVehiculo;
            }
            catch (Exception ex)
            {
                return ex.Message;
            }
        }

        public string Actualizar()
        {
            try
            {
                CalcularComision();
                dbExamenFinal.SubastaVehiculos.AddOrUpdate(subastaVehiculo); 
                dbExamenFinal.SaveChanges();
                return "Se actualizó la subasta del vehiculo con placa: " + subastaVehiculo.PlacaVehiculo;
            }
            catch (Exception ex)
            {
                return ex.Message;
            }
        }

        public SubastaVehiculo Consultar(int idSubastaVehiculos)
        {
            return dbExamenFinal.SubastaVehiculos.FirstOrDefault(s => s.idSubastaVehiculos == idSubastaVehiculos);
        }

        public List<SubastaVehiculo> ConsultarTodos()
        {
            return dbExamenFinal.SubastaVehiculos.OrderBy(s => s.Vehiculo).ToList();
        }

        public IQueryable ConsultarConTipoVehiculo()
        {
            return from SV in dbExamenFinal.Set<SubastaVehiculo>()
                   join TV in dbExamenFinal.Set<TipoVehiculo>()
                   on SV.idTipoVehiculo equals TV.idTipoVehiculo
                   select new
                   {
                       Codigo = SV.idSubastaVehiculos,
                       Nombre = SV.Vehiculo,
                       Vendedor = SV.Vendedor,
                       Comprador = SV.Comprador,
                       ValorVenta = SV.ValorVenta,
                       Placa = SV.PlacaVehiculo,
                       Comision = SV.ValorComision,
                       Ciudad = SV.CiudadEntrega,
                       TipoVehiculo = TV.Nombre,
                   };
        }

    }
}
