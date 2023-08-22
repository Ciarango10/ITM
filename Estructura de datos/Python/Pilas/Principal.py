import ArrayStack as ArrayStack
#ARREGLO-------------------------------------

#Iniciamos el arreglo con su tamaño
array1 = ArrayStack.ArrayStack(5)

#Preguntamos si esta vacio el arreglo
vacio = array1.isEmpty()
print(vacio)

#Preguntamos el tamaño del arreglo
tamaño = array1.size()
print(tamaño)

#Agregamos los valores que queremos al arreglo y los imprimimos
array1.push("Carlos")
array1.push("Santiago")
array1.push("Victor")
array1.push("Efren")
array1.push("Julio")
print(array1)

#Preguntamos si el arreglo está lleno, debe retornar verdadero porque ya hay 5 valores
#en el arreglo
lleno = array1.isFull()
print(lleno)


#Preguntamos el tamaño del arreglo nuevamente para confirmar que si se incrementó su tamaño
tamaño = array1.size()
print(tamaño)

#Eliminamos el top del arreglo, e imprimimos el valor que eliminamos
print(array1.pop())

#Validamos que el top sea distinto al que se eliminó anteriormente
top = array1.top()
print(top)


#LISTA-------------------------------------
import Stack as stack

#Iniciamos la lista
stack1 = stack.Stack()

#Preguntamos si esta vacia la pila
vacio = stack1.isEmpty()
print(vacio)

#Preguntamos el tamaño de la pila
tamaño = stack1.size()
print(tamaño)

#Agregamos los valores que queremos a la pila y los imprimimos
stack1.push("Arango")
stack1.push("Londoño")
stack1.push("Ruiz")
stack1.push("Bolivar")
print(stack1)

#Eliminamos el top de la pila, e imprimimos el valor que eliminamos
print(stack1.pop())

#Validamos que el top sea distinto al que se eliminó anteriormente
top = stack1.top()
print(top)

#Preguntamos el tamaño de la pila nuevamente para confirmar que se actualizó su valor
tamaño = stack1.size()
print(tamaño)

