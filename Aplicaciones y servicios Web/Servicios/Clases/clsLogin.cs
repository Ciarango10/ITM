using Servicios.Models;
using Servicios.Clases;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using Servicios_PD.Clases;

namespace Servicios.Clases
{
    public class clsLogin
    {
        private DBSuperEntities dbSuper = new DBSuperEntities();
        public LoginRequest login { get; set; }
        public IQueryable<LoginRespuesta> Consultar()
        {
            if (Validar())
            {
                string tokenGenerado = TokenGenerator.GenerateTokenJwt(login.Usuario);
                return from U in dbSuper.Set<Usuario>()
                       join UP in dbSuper.Set<Usuario_Perfil>()
                       on U.id equals UP.idUsuario
                       join P in dbSuper.Set<Perfil>()
                       on UP.idPerfil equals P.id
                       where U.userName == login.Usuario &&
                             U.Clave == login.Password

                       select new LoginRespuesta
                       {
                           Usuario = U.userName,
                           Perfil = P.Nombre,
                           Token = tokenGenerado,
                           Autenticado = true,
                           PaginaNavegar = P.PaginaNavegar
                       };
            }
            else
            {
                return null;
            }
        }
        private bool Validar()
        {
            //Consulta el usuario
            Usuario usuario = dbSuper.Usuarios.FirstOrDefault(u=> u.userName == login.Usuario);
            if (usuario == null)
            {
                return false;
            }
            else
            {
                byte[] arrBytesSalt = Convert.FromBase64String(usuario.Salt);
                clsCypher cifrar = new clsCypher();

                string ClaveCifrada = cifrar.HashPassword(login.Password, arrBytesSalt);
                login.Password = ClaveCifrada;
                return true;
            }
        }
    }
}