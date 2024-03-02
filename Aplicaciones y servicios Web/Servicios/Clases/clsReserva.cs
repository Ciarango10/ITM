using Servicios.Models;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;

namespace Servicios.Clases
{
    public class clsReserva
    {
        //Objeto de conexion a la bd
        DBTallerEntities dbTaller = new DBTallerEntities();

        //Objeto que tiene la informacion de la reserva
        public ReservaEscenario reserva { get; set; }

        public string Insertar()
        {
            try
            {
                //Se invoca el metodo de calculo
                CalcularPago();
                //Se agrega el escenario en la base de datos
                dbTaller.ReservaEscenarios.Add(reserva);
                //Graba en la base de datos
                dbTaller.SaveChanges();
                return "Se grabo la reserva del señor(a): " + reserva.Nombre;
            }
            catch (Exception ex)
            {
                return ex.Message;
            }
        }

        private void CalcularPago()
        {
            int ValorHora = 50000;
            double PorcentajeDescuento = 0.0;
            if(reserva.HorasReserva > 2)
            {
                PorcentajeDescuento += 0.20;
            }
            switch(reserva.DiaReserva.ToUpper())
            {
                case "LUNES":
                case "MARTES":
                case "MIERCOLES":
                case "JUEVES":
                case "VIERNES":
                    PorcentajeDescuento += 0.40;
                    break;
                default:
                    PorcentajeDescuento += 0.0;
                    break;
            }
            //Calcular los datos
            reserva.ValorSinDescuento = ValorHora * reserva.HorasReserva;
            reserva.ValorDescuento = Convert.ToInt32((reserva.ValorSinDescuento * PorcentajeDescuento));
            reserva.ValorPagar = reserva.ValorSinDescuento - reserva.ValorDescuento;
        }

    }
}