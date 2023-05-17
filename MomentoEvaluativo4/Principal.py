import Usuario as us
import Planilla as p

planilla1 = p.Planilla("aaaa", 12.2, 0)

usuario1 = us.Usuario("1928319023", "Carlos Arango", "2015")

usuario1.agregarPlanilla(planilla1.periodo, planilla1.IBC, planilla1.claseRiesgo)
print(usuario1.planillas)
usuario1.buscarPlanillaPeriodo("aaaa")
print(usuario1.pagarPlanilla(0))











