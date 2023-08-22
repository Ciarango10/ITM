"""
Carlos Ivan Arango Londoño
Juan David Machado Mosquera
Santiago Gonzalez Ruiz
Cesar Augusto Marin Suaza
Grupo 580506004-10
"""
import numpy as np
class Portafolio():
    def __init__(self,capacidad): #Constructor
        self.__nroEntradas=0
        self.__arreglo =np.empty(capacidad,dtype=object) #Instanciación del arreglo

    #Getters y Setters
    @property
    def arreglo(self):
        return self.__arreglo

    @arreglo.setter
    def arreglo(self,arreglo):
        self.__arreglo=arreglo

    @property
    def nroEntradas(self):
        return self.__nroEntradas

    @nroEntradas.setter
    def nroEntradas(self,nroEntradas):
        self.__nroEntradas=nroEntradas

    def __str__(self):
        return self.arreglo+' '+self.nroEntradas

    #Métodos:
    def almacenarInformacionServicios(self,servicio):
    #Si el numero de entradas es menor al tamaño del arreglo, 
    #se agrega el servicio en el indice numero de entradas y se incrementa
        if self.nroEntradas < len(self.arreglo): 
            self.arreglo[self.nroEntradas] = servicio
            self.nroEntradas+=1
    
    def eliminarServicio(self,codigo):
        #Si nroEntradas es igual a 0 se retorna nulo, ya que quiere decir que no hay servicios en el arreglo
        if self.nroEntradas == 0: 
            return None
        else:
        #Sino, se captura el índice por medio de la variable temporal.
        #En caso de que la variable temporal sea menor al numero de entradas y 
        #El codigo ingresado sea distinto al codigo del arreglo la variable temporal se incrementa en 1
            temp = 0
            while temp<self.nroEntradas and self.arreglo[temp].Codigo != codigo:
                temp+=1
        #Si la variable temporal es igual al numero de entradas se retorna nulo
        #ya que, esto nos indica que se recorrió el arreglo en su totalidad y no se encontró el código
            if temp == self.nroEntradas:
                return None
        #Sino, guardamos la información del código a eliminar en registroTemporal
        #creamos un ciclo que va desde temporal(guarda el indice a eliminar) hasta la última posición del arreglo
        #y basicamente todos los valores del arreglo se mueven una casilla hacia la izquierda desde la posicion en donde 
        #eliminamos el servicio, como la ultima posicion queda duplicada, al salir del ciclo, le damos el valor de nulo.
        #Y como eliminamos un servicio del arreglo, debemos decrementar el nro de entradas en 1.
            else:
                registroTemporal = self.arreglo[temp]
                for i in range(temp,self.nroEntradas-1):
                    self.arreglo[i] = self.arreglo[i+1]
                self.arreglo[self.nroEntradas-1] = None
                self.nroEntradas -=1
                return registroTemporal
            
    def buscarServicio(self,codigo):
        #Si el nro de entradas es igual a 0 retorna nulo, porque quiere decir que no hay servicios en el arreglo
        if self.nroEntradas == 0:
            return None
        #Sino, se captura el índice por medio de la variable temporal.
        #En caso de que la variable temporal sea menor al numero de entradas y 
        #El codigo ingresado sea distinto al codigo del arreglo la variable temporal se incrementa en 1
        else:
            temp = 0
            while temp < self.nroEntradas and self.arreglo[temp].Codigo != codigo:
                temp+=1
        #Si la variable temporal es igual al numero de entradas se retorna nulo
        #ya que, esto nos indica que se recorrió el arreglo en su totalidad y no se encontró el código
            if temp == self.nroEntradas:
                return None
        #Sino, quiere decir que se encontró el codigo que se buscaba en el arreglo.
            else:
                return self.arreglo[temp]
            
    def llevarInfoServicioArchivo(self,fileName):
        try:
        #Se valida que sea mayor a 0, porque de lo contrario no habria ninguna información para almacenar en el archivo
            if self.nroEntradas>0:
                file = open(fileName,"w") #Abrimos el archivo
                try:
                    for i in range(self.nroEntradas):
                        file.write(str(self.arreglo[i]) + " Nro Registros Solicitados: " + str(self.arreglo[i].nroRegistros) +"\n")

                        
                finally:
                    file.close() #Cerramos el archivo
        except:
            print("Error de Escritura") 
    
    def incrementarSolicitudes(self,codigo):
        a = self.buscarServicio(codigo) #Llamamos al método buscarServicio y el valor que retorne lo almacenamos en a
        if a != None: #Si a es != de nulo quiere decir que si se encontró un servicio, por lo tanto se incrementa nroRegistros en 1         
            a.nroRegistros+=1 
            

            
       

