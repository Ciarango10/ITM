using Servicios.Clases;
using Servicios.Models;
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
    [RoutePrefix("api/Usuarios")]
    [AllowAnonymous]
    public class UsuariosController : ApiController
    {
        [HttpPost]
        [Route("CrearUsuario")]
        public string CrearUsuario(Usuario _usuario, int idPerfil)
        {
            clsUsuario usuario = new clsUsuario();
            usuario.usuario = _usuario;
            return usuario.Insertar(idPerfil);
        }

        [HttpGet]
        [Route("ListarUsuariosEmpleados")]
        public IQueryable ListarUsuariosEmpleados()
        {
            clsUsuario usuario = new clsUsuario();
            return usuario.ListarUsuariosEmpleados();
        }

        [HttpPut]
        [Route("ActualizarUsuario")]
        public string ActualizarUsuario(Usuario _usuario, int idPerfil)
        {
            clsUsuario usuario = new clsUsuario();
            usuario.usuario = _usuario;
            return usuario.Actualizar(idPerfil);
        }

        [HttpPut]
        [Route("Activar")]
        public string Activar(int idUsuarioPerfil, bool activo)
        {
            clsUsuario usuario = new clsUsuario();
            return usuario.Activar(idUsuarioPerfil, activo);
        }

        [HttpPut]
        [Route("ResetearClave")]
        public string ResetearClave(Usuario _usuario, int idPerfil)
        {
            clsUsuario usuario = new clsUsuario();
            usuario.usuario = _usuario;
            return usuario.ResetearClave();
        }
    }
}