"""
Carlos Ivan Arango Londoño
Juan David Machado Mosquera
Santiago Gonzalez Ruiz
Cesar Augusto Marin Suaza
Grupo 580506004-10
"""
import Usuario as us
class Medico(us.Usuario):
    def __init__(self, especialidad="", nroCitas=0, valorCita=0,nombreCompleto="", id=0, telefono=0, email="",fechaNacimiento="",estadoLinea=0):
        super().__init__(nombreCompleto, id, telefono, email,fechaNacimiento,estadoLinea)
        self._especialidad = especialidad
        self._nroCitas = nroCitas
        self._valorCita = valorCita
    
    #getters
    @property
    def especialidad(self):
        return self._especialidad

    @property
    def nroCitas(self):
        return self._nroCitas

    @property
    def valorCita(self):
        return self._valorCita

    
    #setters
    @especialidad.setter
    def especialidad(self, value):
        self._especialidad = value

    @nroCitas.setter
    def nroCitas(self, value):
        self._nroCitas = value

    @valorCita.setter
    def valorCita(self, value):
        self._valorCita = value

    #funciones
    def calcularIngresos(self):
        print(" Los ingresos son: " + str(self._nroCitas * self._valorCita))
        
    def reiniciarNroCitasAtendidas(self):
        self._nroCitas = 0

    def __str__(self):
        return " Nombre Doctor: " + self._nombreCompleto + " Especialidad: " + self._especialidad  + " Citas: " + str(self._nroCitas)
        
    