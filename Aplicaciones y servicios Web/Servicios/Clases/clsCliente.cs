using Servicios.Models;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;

namespace Servicios.Clases
{
    public class clsCliente
    {
        //Se hara el proceso de grabacion en la base de datos
        
        //Crear el atributo que maneja las clases modelos, de la base de datos
        private DBSuperEntities super = new DBSuperEntities();

        //Crear propiedad de tipo cliente para manipular la informacion de la base de datos 
        public CLIEnte cliente { get; set; }

        //Metodo de insertar, que graba en la base de datos

        public string Insertar()
        {
            try
            {
                //Para grabar se utiliza el metodo add
                super.CLIEntes.Add(cliente);
                //Para garantizar la grabacion en la base de datos, se invoca el metodo SaveChanges
                super.SaveChanges();
                return "Se inserto el cliente de documento: " + cliente.Documento;
            }
            catch (Exception ex) 
            {
                return ex.Message;
            }

        }
    }
}