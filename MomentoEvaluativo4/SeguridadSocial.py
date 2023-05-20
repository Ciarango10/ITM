import DoubleList as dl
import Usuario as u
class SeguridadSocial():
    def __init__(self):
        self.__usuarios = dl.DoubleList()

    def agregarUsuario(self, identificacion, nombre, fechaNacimiento):
        usuario = u.Usuario(identificacion, nombre, fechaNacimiento)
        temp = self.__usuarios.first()
        while temp is not None:
            if usuario.identificacion == temp.data.identificacion:
                print("Usuario ya registrado")
                return
            temp = temp.next
        self.__usuarios.addFirst(usuario)

    def buscarUsuario(self,identificacion):
        temp = self.__usuarios.first()
        while temp != None and identificacion != temp.data.identificacion:
            temp = temp.next
        if temp == None:
            return None
        else: 
            return temp

    def eliminarUsuario(self,identificacion):
        eliminar = self.buscarUsuario(identificacion)
        if eliminar != None:
            self.__usuarios.remove(eliminar)
            return eliminar.data

    def agregarPlanillaUsuario(self, identificacion, periodo, IBC, claseRiesgo):
        usuario = self.buscarUsuario(identificacion)
        if usuario is not None:
            usuario.data.agregarPlanilla(periodo, IBC, claseRiesgo)

    def imprimirPlanillaUnica(self,identificacionUsuario,codigoPlanilla): 
        usuario = self.buscarUsuario(identificacionUsuario)
        planilla = usuario.data.buscarPlanillaCodigo(codigoPlanilla)
        try:
            file = open("PlanillaUnica.txt", "w")
            try:
                file.write("USUARIO= Id:" + str(usuario.data.identificacion) + " Nombre:" + str(usuario.data.nombre) + " PLANILLA= " + "Codigo:" + str(planilla.data.codigo) + " Periodo:" + str(planilla.data.periodo) + " IBC:" + str(planilla.data.IBC) +  " Clase Riesgo:" + str(planilla.data.claseRiesgo)  + " Estado:" + str(planilla.data.estado)+ " Pago salud:" + str(planilla.data.pagoSalud)+ " Pago Pension:" + str(planilla.data.pagoPension)+ "\n")
            finally:
                file.close()
        except:
            print("Error de escritura en el archivo")

#METODO INCOMPLETO Y NO FUNCIONAL-------------------------------------------------
    def imprimirPlanillasPeriodo(self,identificacionUsuario, periodoPlanilla): 
       usuario = self.buscarUsuario(identificacionUsuario)
       planilla = usuario.data.buscarPlanillaPeriodo(periodoPlanilla)
       try:
            file = open("MultiplesPlanillas.txt", "w")
            try:
                temp = planilla.first()
                while temp != None:
                    file.write("USUARIO= Id:" + str(usuario.data.identificacion) + " Nombre:" + str(usuario.data.nombre) + " PLANILLA= " + "Codigo:" + str(temp.data.codigo) + " Periodo:" + str(temp.data.periodo) + " IBC:" + str(temp.data.IBC) +  " Clase Riesgo:" + str(temp.data.claseRiesgo)  + " Estado:" + str(temp.data.estado)+ " Pago salud:" + str(temp.data.pagoSalud)+ " Pago Pension:" + str(temp.data.pagoPension)+ "\n")
                    temp = temp.next
            finally:
                file.close()
       except:
            print("Error de escritura en el archivo")



#---------------------------------------------------------------------------------
    def eliminarPlanillaUsuario(self,identificacionUsuario,codigoPlanilla): 
        usuario = self.buscarUsuario(identificacionUsuario)
        if usuario is not None:
            eliminada = usuario.data.eliminarPlanilla(codigoPlanilla)
            return eliminada

    def pagarPlanillaUsuario(self,identificacioUsuario,codigoPlanilla): 
        usuario = self.buscarUsuario(identificacioUsuario)
        usuario.data.pagarPlanilla(codigoPlanilla)
    
    def listarUsuarios(self): 
        temp = self.__usuarios.first()
        while temp is not None:
            print(temp.data)
            temp = temp.next


