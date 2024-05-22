using Servicios.Models;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;

namespace Servicios.Clases
{
    public class clsTipoVehiculo
    {
        //Objeto de conexion a la bd
        private DBExamenFinalEntities dbExamenFinal = new DBExamenFinalEntities();

        public IQueryable ListarTiposVehiculos()
        {
            return from TV in dbExamenFinal.Set<TipoVehiculo>()
                   select new
                   {
                       Codigo = TV.idTipoVehiculo,
                       Nombre = TV.Nombre
                   };
        }
    }
}