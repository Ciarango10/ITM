import ArrayQueue as arrayQ
#ARREGLO-------------------------------------

#Iniciamos el arreglo con su tamaño
array1 = arrayQ.ArrayQueue(5)

#Verificamos que el metodo funcione correctamente
print(array1.isEmpty())

#Validamos el tamaño del arreglo
print(array1.size())

#Agregamos los valores al arreglo
array1.enqueue(1)
array1.enqueue(2)
array1.enqueue(3)
array1.enqueue(4)
array1.enqueue(5)
#Imprimimos el valor del arreglo para verificar que funcionó el metodo insertar
print(array1)

#Validamos que el tamaño del arreglo si haya cambiado
print(array1.size())

#Llamamos al metodo eliminar, guardamos el valor en una variable y lo mostramos en pantalla
eliminado = array1.dequeue()
print(eliminado)

#Imprimimos el primer valor del arreglo
print(array1.first())

#Imprimos nuevamente el arreglo para ver los valores actualizados
print(array1)

#LISTA-------------------------------------
import Queue as q
#Inicializamos la cola
cola1 = q.Queue()

#Verificamos que el metodo funcione correctamente
print(cola1.isEmpty())

#Validamos el tamaño de la cola
print(cola1.size())

#Agregamos los valores a la cola
cola1.enqueue(1)
cola1.enqueue(2)
cola1.enqueue(3)
cola1.enqueue(4)
cola1.enqueue(5)
cola1.enqueue(6)
#Imprimimos el valor de la lista para verificar que funcionó el metodo insertar
print(cola1)

#Validamos que el tamaño de la lista si haya cambiado
print(cola1.size())

#Llamamos al metodo eliminar, guardamos el valor en una variable y lo mostramos en pantalla
eliminado = cola1.dequeue()
print(eliminado)

#Imprimimos el primer valor de la lista
print(cola1.first())

#Imprimos nuevamente la lista para ver los valores actualizados
print(cola1)

