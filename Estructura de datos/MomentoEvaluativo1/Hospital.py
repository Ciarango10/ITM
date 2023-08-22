"""
Carlos Ivan Arango Londoño
Juan David Machado Mosquera
Santiago Gonzalez Ruiz
Cesar Augusto Marin Suaza
Grupo 580506004-10
"""
import datetime
import Cita as c
class Hospital():
    def __init__(self, nombre="", direccion=""):
        self._nombre = nombre
        self._direccion = direccion

    #funciones
    def agendar(self, paciente, doctor):
        cita1 = c.Cita(datetime.datetime.now(),"Pendiente",doctor,paciente,0)
        cita1._estadoCita = "Pendiente"
        doctor.nroCitas += 1
        print("La cita ha sido asignada: " +
                " Informacion Paciente: " + str(paciente) +
                " Informacion Doctor:" + str(doctor) +
                " Informacion Cita: " + str(cita1) 
                
        )
        return cita1
        
    def atender(self, cita):
        cita._estadoCita = "Finalizada"
        print("La cita ha sido Finalizada: " +
              " Informacion Paciente: " + str(cita._paciente) +
                " Informacion Doctor:" + str(cita._medico) +
                " Informacion Cita: " + str(cita)
        )

    def cancelar(self, cita): 
        cita._medico.nroCitas-=1
        cita._estadoCita = "Cancelada"
        print("La cita ha sido Cancelada: " +
              " Informacion Paciente: " + str(cita._paciente) +
                " Informacion Doctor:" + str(cita._medico) +
                " Informacion Cita: " + str(cita)
        )
       
       
    def recibirCalificacion(self,cita):
        cita._calificacion = 0
        while cita._calificacion > 5 or cita._calificacion < 1:
            cita._calificacion = int(input("Ingrese la calificacion referente a la cita del 1 al 5: "))
        print("La calificacion es de: " + str(cita._calificacion))
    

