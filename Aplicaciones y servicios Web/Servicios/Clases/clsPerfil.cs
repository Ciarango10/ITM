using Servicios.Models;
using System.Linq;

namespace Servicios.Controllers
{
    public class clsPerfil
    {
        private DBSuperEntities dbSuper = new DBSuperEntities();
        public IQueryable ListarPerfiles()
        {
            return from P in dbSuper.Set<Perfil>()
                   select new
                   {
                       Codigo = P.id,
                       Nombre = P.Nombre
                   };
        }
    }
}