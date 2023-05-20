import DoubleList as dl
import Planilla as p

class Usuario():
    def __init__(self, identificacion = "", nombre = "", fechaNacimiento = ""):
        self.__identificacion = identificacion
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
        return str(self.__identificacion) + " " + self.__nombre + " " + str(self.__fechaNacimiento)
    
    def agregarPlanilla(self,periodo,IBC,claseRiesgo):
        planilla = p.Planilla(periodo,IBC,claseRiesgo)
        self.__planillas.addFirst(planilla)

    def buscarPlanillaCodigo(self,codigo):
        temp = self.__planillas.first()
        while temp != None and codigo != temp.data.codigo:
            temp = temp.next
        if temp == None:
            return None 
        else:
            return temp
        
    def buscarPlanillaPeriodo(self, periodo):
        temp = self.__planillas.first()
        listaTemporal = dl.DoubleList()
        while temp is not None:
            if temp.data.periodo == periodo:
                listaTemporal.addFirst(temp.data)
            temp = temp.next
        if listaTemporal.isEmpty():
            return None 
        else:
            return listaTemporal

    def eliminarPlanilla(self,codigo):
        temp = self.buscarPlanillaCodigo(codigo)
        if temp != None:
            self.__planillas.remove(temp)      
            return temp.data

    def pagarPlanilla(self, codigo):
        temp = self.buscarPlanillaCodigo(codigo)
        if temp is None:
            return None     
        else:
            planilla = temp.data  
            costo = planilla.calcularPago()
            planilla.estado = "Pagada"
            self.generarComprobante(planilla, costo)
            
    def generarComprobante(self, planilla, valor):
        try:
            file = open("ArchivoPagos.txt", "w")
            try:
                file.write("USUARIO= Id:" + str(self.identificacion) + " Nombre:" + str(self.nombre) + " PLANILLA= " + "Codigo:" + str(planilla.codigo) + " Periodo:" + str(planilla.periodo) + " IBC:" + str(planilla.IBC) +  " Clase Riesgo:" + str(planilla.claseRiesgo)  + " Estado:" + str(planilla.estado)+ " Pago salud:" + str(planilla.pagoSalud)+ " Pago Pension:" + str(planilla.pagoPension)+ " Valor:" + str(valor) + "\n")
            finally:
                file.close()
        except:
            print("Error de escritura en el archivo")

