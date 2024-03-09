using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Punto4
{
    public class Periodico : Publicacion
    {
        public string NombrePeriodico, Fecha;

        public Periodico(int NroHojas, int ValorHoja, int HojasAColor, string Titulo, string TipoPortada, string NombrePeriodico, string Fecha) : base(NroHojas, ValorHoja, HojasAColor, Titulo, TipoPortada)
        {
            this.NombrePeriodico = NombrePeriodico;
            this.Fecha = Fecha;
        }
    }
}
