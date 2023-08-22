class Cita():
    def __init__(self,fechaHora, estadoCita, medico, paciente, calificacion): 
        self._fechaHora = fechaHora
        self._estadoCita = estadoCita
        self._medico = medico
        self._paciente = paciente
        self._calificacion = calificacion

    #getters
    @property
    def fechaHora(self):
        return self._fechaHora

    @property
    def estadoCita(self):
        return self._estadoCita

    @property
    def medico(self):
        return self._medico

    @property
    def paciente(self):
        return self._paciente
    
    @property 
    def calificacion(self):
        return self._calificacion
    
    #setters
    @fechaHora.setter
    def fechaHora(self, value):
        self._fechaHora = value

    @estadoCita.setter
    def estadoCita(self, value):
        self._estadoCita = value

    @medico.setter
    def medico(self, value):
        self._medico = value
    
    @paciente.setter
    def medico(self, value):
        self._medico = value

    @calificacion.setter
    def calificacion(self,value):
        self._calificacion = value
    
    def __str__(self):
        return "Fecha: " + str(self._fechaHora) + " Estado Cita: " + self._estadoCita
    