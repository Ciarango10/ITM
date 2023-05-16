"""
Carlos Ivan Arango Londoño
Juan David Machado Mosquera
Santiago Gonzalez Ruiz
Cesar Augusto Marin Suaza
Grupo 580506004-10
"""
import datetime
import Hospital as h
import Medico as m
import Usuario as us

#Instanciacion Paciente 1
usu1 = us.Usuario("Carlos Arango",1025643641,3163338892,"carlosarango3101@gmail.com", datetime.date.today())
#LLamada a Metodos Paciente 1
usu1.ingreso()
usu1.salida()
#Instanciacion Paciente 2
usu2 = us.Usuario("Carlos Arango",1025643641,3163338892,"carlosarango3101@gmail.com", datetime.date(2023,2,28))
#LLamada a Metodos Paciente 2
usu2.ingreso()
usu2.salida()

#Instanciacion Medico 1
med1 = m.Medico("Neurocirujano", 11, 20000, "Jorge Garces", 123489123, 31635473478, "jorge@gmail.com")

#Instanciacion Hospital 1
hos1 = h.Hospital("Maria del Rosario","Cll42a 2405")
#Llamada a Metodos de Hospital 1
cita = hos1.agendar(usu1,  med1)
hos1.atender(cita)
hos1.cancelar(cita)
hos1.recibirCalificacion(cita)

#Llamada a metodos Medico 1
med1.calcularIngresos()
med1.reiniciarNroCitasAtendidas()









