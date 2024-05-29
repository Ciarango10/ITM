using Servicios.Models;
using System;
using System.Collections.Generic;
using System.Data.Entity.Migrations;
using System.Linq;
using System.Web;
using System.Xml.Linq;

namespace Servicios.Clases
{
    public class clsEmpleado
    {
        //Objeto de conexion a la bd
        private DBSuperEntities dbSuper = new DBSuperEntities();

        //Objeto que tiene la informacion del empleado
        public EMPLeado empleado { get; set; }

        public string Insertar()
        {
            try
            {
                //Se agrega el empleado en la base de datos
                dbSuper.EMPLeadoes.Add(empleado);
                //Graba en la base de datos
                dbSuper.SaveChanges();
                return "Se grabo el empleado " + empleado.Nombre + " " + empleado.PrimerApellido;

            }
            catch (Exception ex)
            {
                return ex.Message;
            }
        }

        public string Actualizar()
        {
            //Utilizaremos el AddOrUpdate
            try
            {
                dbSuper.EMPLeadoes.AddOrUpdate(empleado);
                dbSuper.SaveChanges();
                return "Se actualizó el empleado " + empleado.Nombre + " " + empleado.PrimerApellido;

            }
            catch (Exception ex)
            {
                return ex.Message;
            }
        }

        //Para la consulta de un empleado se utiliza la funcion FirstOrDefault con criterios
        //En los criterios se utilizan las expresiones lambda
        public EMPLeado Consultar(string Documento)
        {
            return dbSuper.EMPLeadoes.FirstOrDefault(e => e.Documento == Documento);
        }

        public IQueryable ConsultarConCargo(string Documento)
        {
            return from E in dbSuper.Set<EMPLeado>()
                   join EC in dbSuper.Set<EMpleadoCArgo>()
                   on E.Documento equals EC.Documento
                   join C in dbSuper.Set<CARGo>()
                   on EC.CodigoCargo equals C.Codigo
                   where E.Documento == Documento 
                   //&& EC.FechaFin == null
                   select new
                   {
                       NombreEmpleado  = E.Nombre + " " + E.PrimerApellido + " " + E.SegundoApellido,
                       Cargo = C.Nombre
                   };
        }

        public IQueryable LlenarCombo()
        {
            return from E in dbSuper.Set<EMPLeado>()
                   join EC in dbSuper.Set<EMpleadoCArgo>()
                   on E.Documento equals EC.Documento
                   where EC.CodigoCargo == 1
                   select new
                   {
                       Codigo = EC.Codigo,
                       NombreEmpleado = E.Nombre + " " + E.PrimerApellido + " " + E.SegundoApellido,
                       Cargo = C.Nombre
                   };
        }

        //Para consultar todos los empleados, se retorna una list de empleados
        public List<EMPLeado> ConsultarTodos()
        {
            return dbSuper.EMPLeadoes.OrderBy(e => e.PrimerApellido).ToList();
        }

        public string Eliminar()
        {
            try
            {
                //Se consulta el empleado
                EMPLeado _empleado = Consultar(empleado.Documento);
                //El empleado se remueve de la lista de empleados
                dbSuper.EMPLeadoes.Remove(_empleado);
                dbSuper.SaveChanges();
                return "Se elimino el empleado de documento: " + _empleado.Documento;
            }
            catch (Exception ex)
            {
                return ex.Message;
            }

        }
    }
}