"""
Carlos Ivan Arango Londoño
Juan David Machado Mosquera
Santiago Gonzalez Ruiz
Cesar Augusto Marin Suaza
Grupo 580506004-10
"""
import Pharmacy as ph

#Creamos el objeto Farmacia
farmacia1 = ph.Pharmacy()

#Agregamos los usuarios a la farmacia
farmacia1.addUser("1025643641", "Carlos", "28-2-2005")
farmacia1.addUser("1025643642", "Juan", "28-2-2006")
farmacia1.addUser("1025643643", "Jose", "28-2-2004")
farmacia1.addUser("1025643646", "Efren", "28-2-1950" )
farmacia1.addUser("1412412415", "Fernando", "13-1-1958")
farmacia1.addUser("1412412412", "Arturo", "12-1-1958")
farmacia1.addUser("14124124189", "Santiago", "12-1-1951")

#Imprimimos los usuarios por medio del metodo 
farmacia1.printUsers()

#Buscamos el usuario
print(farmacia1.findUser("1025643643"))

#Borramos el usuario 
print(farmacia1.removeUser("1025643643"))

#Buscamos nuevamente el usuario despues de eliminarlo para confirmar que ya no aparece
print(farmacia1.findUser("1025643643"))

#Imprimimos los usuarios por medio del metodo nuevamente para confirmar que se eliminó el anterior
farmacia1.printUsers()

#Pedimos los turnos de los usuarios
farmacia1.request("1025643641")
farmacia1.request("1025643642")
farmacia1.request("1025643646")
farmacia1.request("1412412415")
farmacia1.request("1412412412")
farmacia1.request("14124124189")

#Imprimimos el orden de las consultas para validar, cada dos usuarios con prioridad, se atiende uno general
print(farmacia1.nextService())
print(farmacia1.nextService())
print(farmacia1.nextService())
print(farmacia1.nextService())
print(farmacia1.nextService())
print(farmacia1.nextService())






