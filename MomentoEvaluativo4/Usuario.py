import DoubleList as dl
import Planilla as p
class Usuario():
    def __init__(self, idenfificacion, nombre, fechaNacimiento):
        self.__identificacion = idenfificacion
        self.__nombre = nombre
        self.__fechaNacimiento = fechaNacimiento
        self.__planillas = dl.DoubleList()

    @property
    def identificacion(self):
        return self.__identificacion
    @identificacion.setter
    def identificacion(self,identificacion):
        self.__identificacion = identificacion

    @property
    def nombre(self):
        return self.__nombre
    @nombre.setter
    def nombre(self,nombre):
        self.__nombre = nombre

    @property
    def fechaNacimiento(self):
        return self.__fechaNacimiento
    @fechaNacimiento.setter
    def fechaNacimiento(self,fechaNacimiento):
        self.__fechaNacimiento = fechaNacimiento

    @property
    def planillas(self):
        return self.__planillas 
    
    def __str__(self):
        return self.__identificacion + " " + self.__nombre + " " + self.__fechaNacimiento + " " + self.__planillas
    
    def agregarPlanilla(self,periodo,IBC,claseRiesgo):
        planilla = p.Planilla(periodo,IBC,claseRiesgo) #Creamos la planilla
        agregarPlanilla = dl.DoubleList() #Creamos el nodo doble
        agregarPlanilla.addFirst(planilla) #Agregamos la planilla al nodo doble

    def buscarPlanillaCodigo(self,codigo):
        pass
        #return doubleNode
    def buscarPlanillaPeriodo(self, periodo):
        pass
        #return doubleList
    def eliminarPlanilla(self,codigo):
        pass
        #return planilla
    def pagarPlantilla(self,codigo):
        pass
    def generarComprobante(self,planilla,valor):
        pass