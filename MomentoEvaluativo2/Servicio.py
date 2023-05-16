"""
Carlos Ivan Arango Londoño
Juan David Machado Mosquera
Santiago Gonzalez Ruiz
Cesar Augusto Marin Suaza
Grupo 580506004-10
"""
class Servicio():
    def __init__(self, Codigo, Descripcion, Valor): #Constructor
        self.__Codigo=Codigo
        self.__Descripcion=Descripcion
        self.__Valor=Valor   
        self.nroRegistros=0 

    #Getters y Setters
    @property
    def Codigo(self):
        return self.__Codigo

    @Codigo.setter
    def Codigo(self,Codigo):
        self.__Codigo=Codigo

    @property
    def Descripcion(self):
        return self.__Descripcion

    @Descripcion.setter
    def Descripcion(self,Descripcion):
        self.__Descripcion=Descripcion

    @property
    def Valor(self):
        return self.__Valor

    @Valor.setter
    def Valor(self,Valor):
        self.__Valor=Valor

    def __str__(self):
        return str(self.Codigo)+' '+self.Descripcion+' '+str(self.Valor)




