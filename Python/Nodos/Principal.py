import List as ls
#Inicializamos la lista
lista1 = ls.List()

#Verificamos que el nodo este vacio
print(lista1.isEmpty()) 

#Agregamos los valores al nodo
lista1.addFirst(1)
lista1.addLast(3)
lista1.addFirst(2)
#Imprimimos la lista
print(lista1)

#Imprimimos el valor de la cabeza del nodo
print(lista1.First().data)

#Imprimimos el valor de la cola del nodo
print(lista1.Last().data)

#Volvemos a verificar si está vacio para ver si su valor cambia despues de agregar
print(lista1.isEmpty())

#Eliminamos la cabeza del nodo e imprimimos el valor eliminado
eliminadoCabeza = lista1.removeFirst()
print(eliminadoCabeza)

#Eliminamos la cola del nodo e imprimimos el valor eliminado
eliminadoCola = lista1.removeLast()
print(eliminadoCola)

#Volvemos a imprimir el nodo para ver sus valores actualizados
print(lista1)

