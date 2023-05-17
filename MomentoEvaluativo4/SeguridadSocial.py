import DoubleList as dl
import Usuario as u
import Planilla as p
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
            return eliminar

    def agregarPlanillaUsuario(self, identificacion, periodo, IBC, claseRiesgo):
        usuario = self.buscarUsuario(identificacion)
        if usuario is not None:
            usuario.data.agregarPlanilla(periodo, IBC, claseRiesgo)

    def imprimirPlanillaUnica(self,identificacionUsuario,codigoPlanilla): #INCOMPLETO
        usuario = self.buscarUsuario(identificacionUsuario)
        planilla = usuario.data.buscarPlanillaCodigo(codigoPlanilla)
        try:
            file = open("PlanillaUnica.txt", "w")
            try:
                    file.write(str(usuario) + " " + str(planilla) + "\n")
            finally:
                file.close()
        except:
            print("Error de escritura en el archivo")

    def imprimirPlanillasPeriodo(self,identificacionUsuario, periodoPlanilla): #INCOMPLETO
        pass

    def eliminarPlanillaUsuario(self,identificacionUsuario,codigoPlanilla): 
        usuario = self.buscarUsuario(identificacionUsuario)
        if usuario is not None:
            eliminada = usuario.data.eliminarPlanilla(codigoPlanilla)
            return eliminada

    def pagarPlanillaUsuario(self,identificacioUsuario,codigoPlanilla): #INCOMPLETO
        pass
    
    def listarUsuarios(self): 
        temp = self.__usuarios.first()
        while temp is not None:
            print(temp.data)
            temp = temp.next


