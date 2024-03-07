using Servicios.Models;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;

namespace Servicios.Clases
{
    public class clsCliente
    {
        //Objeto de conexion a la bd
        DBExamenEntities DBExamenEntities = new DBExamenEntities();

        //Objeto que tiene la informacion de la natillera
        public tblExamen_Natillera cliente { get; set; }

        public string Insertar(tblExamen_Natillera cliente)
        {
            try
            {   //Se invoca el metodo de calculo
                CalcularInteres();
                //Agregamos el cliente a la base de datos
                DBExamenEntities.tblExamen_Natillera.Add(cliente);
                //Actualizamos la base de datos
                DBExamenEntities.SaveChanges();

                return $"Se grabo el cliente: {cliente.Nombre}";
            } 
            catch (Exception ex)
            {
                return ex.Message;
            }
        }

        public void CalcularInteres()
        {
            if (cliente.Afiliado == "NO")
            {
                cliente.PorcentajeCredito = (float)(0.018); // 1.8% para los no afiliados
            }
            else if (cliente.Afiliado == "SI")
            {
                cliente.PorcentajeCredito = (float)(0.012); // 1.2% para los afiliados
            }
            // Calcula la cuota mensual de los intereses
            cliente.CuotaMensualIntereses = Convert.ToInt32(cliente.ValorCredito * cliente.PorcentajeCredito);
        }
    }
}