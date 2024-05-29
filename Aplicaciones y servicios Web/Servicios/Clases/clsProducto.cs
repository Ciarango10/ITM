using Servicios.Models;
using System;
using System.Collections.Generic;
using System.Data.Entity.Migrations;
using System.Linq;
using System.Web;

namespace Servicios.Clases
{
    public class clsProducto
    {
        //Crear el atributo que maneja las clases modelos, de la base de datos
        private DBSuperEntities dbSuper = new DBSuperEntities();

        //Crear propiedad de tipo producto para manipular la informacion de la base de datos 
        public PRODucto producto { get; set; }

        public string Insertar()
        {
            try
            {
                //Para grabar se utiliza el metodo Add
                dbSuper.PRODuctoes.Add(producto);
                //Para garantizar la grabacion en la base de datos, se invoca el metodo SaveChanges
                dbSuper.SaveChanges();
                return "Se inserto el producto: " + producto.Nombre;
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
                //Para actualizar se utiliza el metodo AddOrUpdate
                dbSuper.PRODuctoes.AddOrUpdate(producto);
                //Para garantizar la grabacion en la base de datos, se invoca el metodo SaveChanges
                dbSuper.SaveChanges();
                return "Se actualizó el producto: " + producto.Nombre;
            }
            catch (Exception ex)
            {
                return ex.Message;
            }

        }

        public PRODucto Consultar(int id)
        {
            //Para consultar se utiliza el metodo FirstOrDefault
            return dbSuper.PRODuctoes.FirstOrDefault(p => p.Codigo == id);
        }

        public IQueryable ListarProductos()
        {
            return from TP in dbSuper.Set<TIpoPRoducto>()
                   join P in dbSuper.Set<PRODucto>()
                   on TP.Codigo equals P.CodigoTipoProducto
                   orderby TP.Nombre, P.Nombre
                   select new
                   {
                       Cod_Tipo_Producto = TP.Codigo,
                       Tipo_Producto = TP.Nombre,
                       Codigo = P.Codigo,
                       Nombre = P.Nombre,
                       Descripcion = P.Descripcion,
                       Cantidad = P.Cantidad,
                       ValorUnitario = P.ValorUnitario
                   };
        }
        
        public IQueryable LlenarCombo(int idTipoProducto)
        {
            return from P in dbSuper.Set<PRODucto>()
                   join TP in dbSuper.Set<TIpoPRoducto>()
                   on P.CodigoTipoProducto equals TP.Codigo
                   where P.CodigoTipoProducto == idTipoProducto
                   select new
                   {
                       Codigo = P.Codigo 
                   };
        }


        public string Eliminar()
        {
            try
            {
                //Se consulta el producto
                PRODucto _producto = Consultar(producto.Codigo);
                //El producto se remueve de la lista de productos con el metodo Remove
                dbSuper.PRODuctoes.Remove(_producto);
                //Para garantizar la grabacion en la base de datos, se invoca el metodo SaveChanges
                dbSuper.SaveChanges();
                return "Se eliminó el producto: " + producto.Nombre;
            }
            catch (Exception ex)
            {
                return ex.Message;
            }

        }
    }
}
