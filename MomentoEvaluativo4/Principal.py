import Usuario as us
import Planilla as p
import SeguridadSocial as segSocial



planilla1 = p.Planilla("aaaa", 12.2, 0)

usuario1 = us.Usuario("1928319023", "Carlos Arango", "2015")
usuario2 = us.Usuario("1928319024","Ivan Londono", "2016")

usuario1.agregarPlanilla("BBBB", 13, 0)
print(usuario1.buscarPlanillaPeriodo("BBBB"))
print(usuario1.pagarPlanilla(0))

seguridad1 = segSocial.SeguridadSocial()


seguridad1.agregarUsuario("1928319023", "Carlos Arango", "2015")
seguridad1.agregarUsuario("1928319024","Ivan Londono", "2016")
seguridad1.agregarUsuario("1928319025","Isamuel", "2016")
seguridad1.agregarUsuario("1928319026","arango", "2016")



print(seguridad1.buscarUsuario("1928319023"))
print(seguridad1.eliminarUsuario("1928319023"))
print(seguridad1.buscarUsuario("1928319023"))
print(seguridad1.agregarPlanillaUsuario(usuario2.identificacion,"BBBB", 13, 0))
print(usuario2.buscarPlanillaCodigo(0))
print(seguridad1.eliminarPlanillaUsuario("1928319024", 0))
seguridad1.imprimirPlanillaUnica("1928319024",0)

seguridad1.listarUsuarios()



















