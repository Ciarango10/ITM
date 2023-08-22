"""
Carlos Ivan Arango Londoño
Juan David Machado Mosquera
Santiago Gonzalez Ruiz
Cesar Augusto Marin Suaza
Grupo 580506004-10
"""
import Portafolio as pt
class PortafolioOrdenado(pt.Portafolio): 
    def __init__(self,capacidad): #Constructor
        super().__init__(capacidad) #Herencia de atributos

    def agregarPortafolioOrdenado(self,servicio):
        if self.nroEntradas < len(self.arreglo):#Si el nro de entradas es menor a la longitud del arreglo
            self.arreglo[self.nroEntradas] = servicio #Se almacena el servicio en la posicion del nro de entradas
            self.nroEntradas+=1 #Se incrementa el nro de entradas en 1
        elif servicio.nroRegistros > self.arreglo[self.nroEntradas-1].nroRegistros: #Si el nroRegistros del servicio que se ingresó es mayor al nroRegistros del servicio en la ultima posicion
            self.arreglo[self.nroEntradas-1] = servicio #Guardamos el servicio en la ultima posicion del arreglo
        if self.nroEntradas>1: #Si nro de entradas es mayor a 1
            temp=self.nroEntradas-1 #Guardamos en la variable temporal el ultimo indice
            while temp>0 and self.arreglo[temp].nroRegistros>self.arreglo[temp-1].nroRegistros: #Mientras temporal sea mayor a 0 y el nroRegistros del servicio en la posicion temporal sea mayor al nroRegistros del servicio en la posicion temporal-1
                self.arreglo[temp] = self.arreglo[temp-1] #Basicamente movemos la informacion una casilla hacia la izquierda hasta que se deje de cumplir la condicion
                self.arreglo[temp-1] = servicio
                temp-=1 #Decrementamos temporal en 1
                
                
    