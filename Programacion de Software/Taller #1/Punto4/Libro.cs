using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Punto4
{
    public class Libro : Publicacion
    {
        public string Autor;

        public Libro(int NroHojas, int ValorHoja, int HojasAColor, string Titulo, string TipoPortada, string Autor) : base(NroHojas, ValorHoja, HojasAColor, Titulo, TipoPortada)
        {
            this.Autor = Autor;
        }
    }
}
