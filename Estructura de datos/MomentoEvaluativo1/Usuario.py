"""
Carlos Ivan Arango Londoño
Juan David Machado Mosquera
Santiago Gonzalez Ruiz
Cesar Augusto Marin Suaza
Grupo 580506004-10
"""
import datetime
class Usuario():
    def __init__(self, nombreCompleto="", id=0, telefono=0, email="",fechaNacimiento=datetime,estadoLinea=0):
        self._nombreCompleto = nombreCompleto
        self._id = id
        self._telefono = telefono
        self._email = email
        self._fechaNacimiento = fechaNacimiento
        self._estadoLinea = estadoLinea
    
    #getters
    @property
    def nombreCompleto(self):
        return self._nombreCompleto
    
    @property
    def id(self):
        return self._id
    
    @property
    def telefono(self):
        return self._telefono
    
    @property
    def email(self):
        return self._email
    
    @property
    def fechaNacimiento(self):
        return self._fechaNacimiento
    
    @property
    def estadoLinea(self):
        return self._estadoLinea

    #setters
    @nombreCompleto.setter
    def nombreCompleto(self, value):
        self._nombreCompleto = value

    @id.setter
    def id(self, value):
        self._id = value

    @telefono.setter
    def telefono(self, value):
        self._telefono = value

    @email.setter
    def email(self, value):
        self._email = value

    @fechaNacimiento.setter
    def fechaNacimiento(self, value):
        self._fechaNacimiento = value
        
    @estadoLinea.setter
    def estadoLinea(self, value):
        self._estadoLinea = value

    #funciones
    def ingreso(self):
        self._estadoLinea = 1
        if self._estadoLinea == 1:
            print("Usuario Conectado")
        else:
            print("Usuario Desconectado")
        print("Bienvenido de vuelta")
        if datetime.date.today().day == self.fechaNacimiento.day and datetime.date.today().month == self.fechaNacimiento.month:
            print("Feliz cumpleaños")
            
    def salida(self):
        self._estadoLinea = 0
        if self._estadoLinea == 0:
            print("Usuario Desconectado")
        else:
            print("Usuario Conectado")
        print("Hasta pronto...!")

    def __str__(self):
         return " Nombre Paciente: " + self._nombreCompleto + " Id: " + str(self._id) + " Telefono: " + str(self._telefono) + " Email: " + self._email + " Fecha Nacimiento: " + str(self._fechaNacimiento) 