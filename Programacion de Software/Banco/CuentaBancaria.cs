using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Banco
{
    public class CuentaBancaria
    {
        //Campos miembros de la clase
        private string Nombre, Apellidos, Direccion, Cedula;
        private double Saldo;

        //Constructor
        public CuentaBancaria(string NombrePa, string ApellidosPa, string DireccionPa, string CedulaPa, double SaldoPa)
        {
            Nombre = NombrePa;
            Apellidos = ApellidosPa;
            Direccion = DireccionPa;
            Cedula = CedulaPa;
            Saldo = SaldoPa;
        }

        //Metodos
        public double Deposito(double monto)
        {
            Saldo += monto;
            return Saldo;
        }

        public double Retiro (double monto)
        {
            if(monto <= Saldo)
            {
                Saldo -= monto;
            } else
            {
                Console.WriteLine("Saldo insuficiente!");
            }
            return Saldo;
        }

        public void ConsultaSaldoPa()
        {
            Console.WriteLine($"El saldo es de: {Saldo}");
        }

        public override string ToString()
        {
            string mensaje = "\n Titular:" + Nombre + " " + Apellidos + "\n Direccion: " + Direccion + "\n Documento de identidad: " + Cedula + "\n Saldo: $" + Saldo;
            return mensaje;
        }
    }
}
