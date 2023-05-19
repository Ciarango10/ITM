class Planilla():
    contador_plantillas = 0
    def __init__(self,periodo = "",IBC= 0.0,claseRiesgo = 0):
        Planilla.contador_plantillas += 1
        self.__periodo = periodo
        self.__IBC = IBC
        self.__claseRiesgo = claseRiesgo
        self.__estado = "Pago Pendiente"
        self.__pagoSalud = 0.0
        self.__pagoPension = 0.0
        self.__codigo = Planilla.contador_plantillas

    @property
    def codigo(self):
        return self.__codigo
    
    @property
    def periodo(self):
        return self.__periodo
    @periodo.setter
    def periodo(self,periodo):
        self.__periodo = periodo

    @property
    def IBC(self):
        return self.__IBC
    @IBC.setter
    def IBC(self,IBC):
        self.__IBC = IBC
    
    @property
    def claseRiesgo(self):
        return self.__claseRiesgo
    @claseRiesgo.setter
    def claseRiesgo(self,claseRiesgo):
        self.__claseRiesgo = claseRiesgo
    
    @property
    def estado(self):
        return self.__estado
    @estado.setter
    def estado(self,estado):
        self.__estado = estado

    @property
    def pagoSalud(self):
        return self.__pagoSalud
    
    @property
    def pagoPension(self):
        return self.__pagoPension
    
    def __str__(self):
        return str(self.__codigo) + " " + str(self.__periodo) + " " + str(self.__IBC) + " " + str(self.__claseRiesgo) + " " + str(self.__estado) + " " + str(self.__pagoPension) + " " + str(self.__pagoSalud) + "\n"

    def calcularPago(self):
        self.__pagoSalud = 0.16 * self.__IBC 
        self.__pagoPension = 0.12 * self.__IBC 

        if self.__claseRiesgo == 0:
            pagoArl = 0
        elif self.__claseRiesgo == 1:
            pagoArl = self.__IBC * 0.00522 
        elif self.__claseRiesgo == 2:      
            pagoArl = self.__IBC * 0.01044
        elif self.__claseRiesgo == 3:        
             pagoArl = self.__IBC * 0.02436
        elif self.__claseRiesgo == 4:       
            pagoArl = self.__IBC * 0.04350
        elif self.__claseRiesgo == 5:      
            pagoArl = self.__IBC * 0.06960
        
        sumaPagos = pagoArl + self.__pagoPension + self.__pagoSalud
        return sumaPagos