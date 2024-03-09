using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Punto4
{
    public class Publicacion
    {
        int NroHojas, ValorHoja, HojasAColor;
        string Titulo, TipoPortada;

        public Publicacion(int NroHojas, int ValorHoja, int HojasAColor, string Titulo, string TipoPortada)
        {
            this.NroHojas = NroHojas;
            this.ValorHoja = ValorHoja;
            this.HojasAColor = HojasAColor;
            this.Titulo = Titulo;
            this.TipoPortada = TipoPortada;
        }

        public string CalcularCosto()
        {
            int Costo = 0;
            switch (TipoPortada)
            {
                case "Lujo":
                    Costo += 10000;
                    break;
                case "Normal":
                    Costo += 5000;
                    break;
                case "Economica":
                    Costo += 3000;
                    break;
            }
            Costo += NroHojas * ValorHoja;
            Costo += HojasAColor * (ValorHoja+200);

            return "El costo total es: " + Costo;
        }
    }
}
