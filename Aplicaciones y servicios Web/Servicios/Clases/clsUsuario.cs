using Servicios.Models;
using Servicios_PD.Clases;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;

namespace Servicios.Clases
{
    public class clsUsuario
    {
        private DBSuperEntities dbSuper = new DBSuperEntities();
        public Usuario usuario { get; set; }

        public string Insertar()
        {
            try
            {
                //Instanciamos la clase de cifrado
                clsCypher Cifrado = new clsCypher();
                //Pasamos la contraseña del usuario
                Cifrado.Password = usuario.Clave;
                //Ciframos la clave
                if(Cifrado.CifrarClave())
                {
                    //Si el cifrado es exitoso pasamos la contraseña cifrada al usuario nuevamente
                    usuario.Clave = Cifrado.PasswordCifrado;
                    usuario.Salt = Cifrado.Salt;
                    //Para grabar se utiliza el metodo Add
                    dbSuper.Usuarios.Add(usuario);
                    //Para garantizar la grabacion en la base de datos, se invoca el metodo SaveChanges
                    dbSuper.SaveChanges();
                    return "Se ingresó el producto: " + usuario.userName;
                }
                else { return "No se pudo generar la clave del usuario"; }
            }
            catch (Exception ex)
            {
                return ex.Message;
            }
        }
    }
}