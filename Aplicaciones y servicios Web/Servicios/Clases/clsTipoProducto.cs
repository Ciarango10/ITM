using Servicios.Models;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;

namespace Servicios.Clases
{
    public class clsTipoProducto
    {
        //Crear el atributo que maneja las clases modelos, de la base de datos
        private DBSuperEntities dbSuper = new DBSuperEntities();

        //Crear propiedad de tipo producto para manipular la informacion de la base de datos 
        public TIpoPRoducto tipoProducto { get; set; }

        public List<TIpoPRoducto> ConsultarActivos()
        {
            return dbSuper.TIpoPRoductoes
                .Where(t => t.Activo == true)
                .OrderBy(t => t.Nombre)
                .ToList();
        }

        public IQueryable LlenarCombo()
        {
            return from TP in dbSuper.Set<TIpoPRoducto>()
                   orderby TP.Nombre
                   select new
                   {
                       Codigo = TP.Codigo,
                       Nombre = TP.Nombre
                   };
        }
    }
}
