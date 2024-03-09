using System;
using System.Collections.Generic;
using System.Data;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Punto2
{
    public class Cliente
    {
        public int Saldo;
        public string Nombre, Genero, NroCuenta;

        public Cliente(int Saldo, string Nombre, string Genero, string NroCuenta)
        {
            this.Saldo = Saldo;
            this.Nombre = Nombre;
            this.Genero = Genero;
            this.NroCuenta = NroCuenta;
        }

        //Metodos
        public string SaldoPromedio(Cliente[] cliente)
        {
            int Total = 0;
            for(int i = 0; i < cliente.Length; i++)
            {
                Total += cliente[i].Saldo;     
            }
            return $"El saldo promedio de los clientes es: { Total / cliente.Length}";
        }

        public string SaldoNegativo(Cliente[] cliente)
        {
            int Total = 0;
            for (int i = 0; i < cliente.Length; i++)
            {
                if (cliente[i].Saldo < 0)
                {
                    Total++;
                }
            }
            return $"La cantidad de clientes con saldo negativo son: {Total}";
        }

        public string SaldoPositivo(Cliente[] cliente)
        {
            int Total = 0;
            for (int i = 0; i < cliente.Length; i++)
            {
                if (cliente[i].Saldo >= 0)
                {
                    Total++;
                }
            }
            return $"La cantidad de clientes con saldo positivo son: {Total}";
        }

        public string SaldoMenor(Cliente[] cliente)
        {
            string NombreMenor = cliente[0].Nombre;
            int SaldoMenor = cliente[0].Saldo;
            for (int i = 0; i < cliente.Length; i++)
            {
                if (cliente[i].Saldo < SaldoMenor)
                {
                    NombreMenor = cliente[i].Nombre;
                    SaldoMenor = cliente[i].Saldo;
                }
            }
            return $"El saldo Menor es: {SaldoMenor} del cliente: {NombreMenor}";
        }

        public string SaldoMayor(Cliente[] cliente)
        {
            string NroCuentaMayor = cliente[0].NroCuenta;
            string NombreMayor = cliente[0].Nombre;
            int SaldoMayor = cliente[0].Saldo;
            for (int i = 0; i < cliente.Length; i++)
            {
                if (cliente[i].Saldo > SaldoMayor)
                {
                    NombreMayor = cliente[i].Nombre;
                    SaldoMayor = cliente[i].Saldo;
                    NroCuentaMayor = cliente[i].NroCuenta;
                }
            }
            return $"El saldo Mayor es: {SaldoMayor} del cliente: {NombreMayor} con numero de cuenta: {NroCuentaMayor}";
        }

        public string SaldoPromedioGenero(Cliente[] cliente)
        {
            int TotalHombres = 0, contHombres = 0;
            int TotalMujeres = 0, contMujeres = 0;
            for (int i = 0; i < cliente.Length; i++)
            {
                if (cliente[i].Genero == "Masculino")
                {
                    TotalHombres += cliente[i].Saldo;
                    contHombres++;
                }
                if (cliente[i].Genero == "Femenino")
                {
                    TotalMujeres += cliente[i].Saldo;
                    contMujeres++;
                }
                
            }
            return $"El saldo promedio de los clientes es:\n Hombres: {TotalHombres/contHombres} \n Mujeres: {TotalMujeres/contMujeres}";
        }
    }
}
