"""
Carlos Ivan Arango Londoño
Juan David Machado Mosquera
Santiago Gonzalez Ruiz
Cesar Augusto Marin Suaza
Grupo 580506004-10
"""
import datetime
class User():
    def __init__(self, id="", name="", birthday=datetime):
        self.__id = id
        self.__name = name
        self.__birthday = birthday

    @property
    def id(self):
        return self.__id

    @id.setter
    def id(self,id):
        self.__id = id

    @property
    def name(self):
        return self.__name

    @name.setter
    def name(self,name):
        self.__name = name

    @property
    def birthday(self):
        return self.__birthday
    
    @birthday.setter
    def birthday(self, birthday):
        self.__birthday = birthday

    def __str__(self):
        return str(self.__id) + " " + self.__name + " " + str(self.__birthday)