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
    [RoutePrefix("api/Perfiles")]
    public class PerfilesController : ApiController
    {
        [HttpGet]
        [Route("ListarPerfiles")]
        public IQueryable ListarPerfiles()
        {
            clsPerfil perfil = new clsPerfil();
            return perfil.ListarPerfiles();
        }
    }
}