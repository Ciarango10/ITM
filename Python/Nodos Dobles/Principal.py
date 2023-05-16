import DoubleList as Dlst

#Creamos un objeto tipo nodo
nodo1 = Dlst.DoubleList()

#Preguntamos si el nodo está vacio
print(nodo1.isEmpty())

#Preguntamos el tamaño del nodo
print(nodo1.size())

#Añadimos valores al nodo
nodo1.addFirst("Carlos")
nodo1.addLast("Juan")
nodo1.addLast("Jose")

#Verificamos las posiciones por medio de los metodos
print(nodo1.first())
print(nodo1.last())

#Borramos el nodo del medio
borrar = nodo1.first().next
print(nodo1.remove(borrar))

#Eliminamos el primero del nodo
print(nodo1.removeFirst())

#Eliminamos el ultimo del nodo
print(nodo1.removeLast())

#Añadimos valores al nodo
nodo1.addFirst("Carlos")
nodo1.addLast("Juan")
nodo1.addLast("Jose")

#Añadimos valores despues de *CARLOS*
agregar = nodo1.first()
nodo1.addAfter(agregar,"Jorge")
print(nodo1.first())

#Añadimos valores antes de *JORGE*
agregar = nodo1.first().next
nodo1.addBefore(agregar,"Fredy")
print(nodo1.first())

