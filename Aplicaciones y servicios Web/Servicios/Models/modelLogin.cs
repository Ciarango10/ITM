using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;

namespace Servicios.Models
{
    public class LoginRequest
    {
        public string Usuario { get; set; }
        public string Password { get; set; }
    }
    public class LoginRespuesta
    {
        public string Usuario { get; set; }
        public string Perfil { get; set; }
        public string Token { get; set; }
        public bool Autenticado {  get; set; }  
        public string PaginaNavegar {  get; set; }  

    }
}