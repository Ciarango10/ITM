"""
Carlos Ivan Arango Londoño
Juan David Machado Mosquera
Santiago Gonzalez Ruiz
Cesar Augusto Marin Suaza
Grupo 580506004-10
"""
import Usuario as us
import SeguridadSocial as segSocial
import Planilla as p

seguridad1 = segSocial.SeguridadSocial() #Inicializamos el objeto 
usuario1 = us.Usuario("1025643689", "Efren Ruiz", "20-1-2001") #Creamos un usuario

#METODOS SEGURIDAD SOCIAL--------------------------------------------
#Agregamos los usuarios a la coleccion de usuarios
seguridad1.agregarUsuario("1025643641", "Carlos Arango", "21-1-2005")
seguridad1.agregarUsuario("1025643644", "Ivan Londoño", "22-4-2000")
seguridad1.agregarUsuario("1025643645", "Santiago Ruiz", "17-2-1998")

#Buscamos los usuarios por id
print(seguridad1.buscarUsuario("1025643641"))
print(seguridad1.buscarUsuario("1025643644"))
print(seguridad1.buscarUsuario("1025643645"))

#Eliminamos usuarios por id
print(seguridad1.eliminarUsuario("1025643645"))
print(seguridad1.buscarUsuario("1025643645")) #Buscamos nuevamente el usuario para confirmar que ya no aparece en la coleccion

#Agregar Planilla Usuario
seguridad1.agregarPlanillaUsuario("1025643641", "PlanillaUsuario", 15.0, 3)
seguridad1.agregarPlanillaUsuario("1025643641", "PlanillaUsuario", 14.0, 0)
seguridad1.agregarPlanillaUsuario("1025643641", "PlanillaUsuario", 22.0, 5)

#Imprimir planilla Unica
seguridad1.imprimirPlanillaUnica("1025643641", 3)

#Imprimir multiples planillas por periodo
seguridad1.imprimirPlanillasPeriodo("1025643641","PlanillaUsuario")

#Eliminar Planilla Usuario
print(seguridad1.eliminarPlanillaUsuario("1025643641",1))

#Pagar planilla usuario
seguridad1.pagarPlanillaUsuario("1025643641",3)

#Listar Usuarios
seguridad1.listarUsuarios()
#FIN METODOS SEGURIDAD SOCIAL----------------------------------------


#METODOS USUARIO-----------------------------------------------------
#Agregamos las planillas al usuario
usuario1.agregarPlanilla("Enero",30.0,0)
usuario1.agregarPlanilla("Febrero",31.2,0)
usuario1.agregarPlanilla("Junio",42.2,1)

#Buscamos las planillas mediante el codigo"
print(usuario1.buscarPlanillaCodigo(4))
print(usuario1.buscarPlanillaCodigo(5))

#Buscamos las planillas mediante el periodo
print(usuario1.buscarPlanillaPeriodo("Enero"))
print(usuario1.buscarPlanillaPeriodo("Junio"))

#Eliminar Planilla
print(usuario1.eliminarPlanilla(4))

#Pagar Planilla
usuario1.pagarPlanilla(5)
#FIN METODOS USUARIO-------------------------------------------------



















