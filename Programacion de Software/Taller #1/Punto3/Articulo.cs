using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Punto3
{
    public class Articulo
    {
        public string Codigo, Nombre;
        public int CantidadExistente;
        public double Valor;

        public Articulo(string Codigo, string Nombre, double Valor, int CantidadExistente)
        {
            this.Codigo = Codigo;
            this.Nombre = Nombre;
            this.Valor = Valor;
            this.CantidadExistente = CantidadExistente;
        }
    }
}
