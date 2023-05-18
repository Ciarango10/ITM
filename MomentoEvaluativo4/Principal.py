import Usuario as us
import SeguridadSocial as segSocial
import Planilla as p

seguridad1 = segSocial.SeguridadSocial() #Inicializamos el objeto 
usuario1 = us.Usuario("1025643641", "Carlos Arango", "31/01/2005")

#METODOS USUARIO-----------------------------------------------------
#Agregamos las planillas al usuario
usuario1.agregarPlanilla("AAA",12.2,0)
usuario1.agregarPlanilla("BBB",12.2,1)

#----------------REVISION-----------------
#Buscamos las planillas mediante el codigo
#print(usuario1.buscarPlanillaCodigo(0))
#print(usuario1.buscarPlanillaCodigo(0))
#---------------FIN REVISION--------------

#Buscamos las planillas mediante el periodo
print(usuario1.buscarPlanillaPeriodo("AAA"))
print(usuario1.buscarPlanillaPeriodo("BBB"))

#----------------REVISION-----------------
#Eliminar Planilla
#print(usuario1.eliminarPlanilla(0))
#print(usuario1.eliminarPlanilla(1))
#---------------FIN REVISION--------------

#Pagar Planilla
usuario1.pagarPlanilla(0)
usuario1.pagarPlanilla(1) #Hay que organizar con los demás codigos, pero está funcional

#FIN METODOS USUARIO-------------------------------------------------

#METODOS SEGURIDAD SOCIAL--------------------------------------------
#Agregamos los usuarios a la coleccion de usuarios
seguridad1.agregarUsuario("1025643641", "Carlos Arango", "21/01/2005")
seguridad1.agregarUsuario("1025643644", "Ivan Londoño", "22/04/2000")
seguridad1.agregarUsuario("1025643645", "Santiago Ruiz", "14/08/1998")


#Buscamos los usuarios por id
print(seguridad1.buscarUsuario("1025643641"))
print(seguridad1.buscarUsuario("1025643644"))
print(seguridad1.buscarUsuario("1025643645"))

#Eliminamos usuarios por id
print(seguridad1.eliminarUsuario("1025643645"))
print(seguridad1.buscarUsuario("1025643645")) #Buscamos nuevamente el usuario para confirmar que ya no aparece en la coleccion

#Agregar Planilla Usuario
seguridad1.agregarPlanillaUsuario("1025643641", "PlanillaUsuario", 15.0, 3)
seguridad1.agregarPlanillaUsuario("1025643641", "PlanillaUsuario", 14.0, 0) #Funciona pero no se combinan las planillas con las que ya habian anteriormente

#Imprimir planilla Unica
seguridad1.imprimirPlanillaUnica("1025643641", 0)

#Imprimir planillas periodo
#-------------------------REVISION--------------------------------------
#seguridad1.imprimirPlanillasPeriodo("1025643641","PlanillaUsuario")
#-----------------------FIN REVISION------------------------------------

#Eliminar Planilla Usuario
print(seguridad1.eliminarPlanillaUsuario("1025643641",0))

#Pagar planilla usuario
#seguridad1.pagarPlanillaUsuario()  SIN REALIZAR

#Listar Usuarios
seguridad1.listarUsuarios()
#FIN METODOS SEGURIDAD SOCIAL----------------------------------------





















