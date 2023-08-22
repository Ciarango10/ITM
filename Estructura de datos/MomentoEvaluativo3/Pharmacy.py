"""
Carlos Ivan Arango Londoño
Juan David Machado Mosquera
Santiago Gonzalez Ruiz
Cesar Augusto Marin Suaza
Grupo 580506004-10
"""
import Stack as st
import Queue as q
import User as us
from datetime import datetime
class Pharmacy():
    def __init__(self):
        self.__Users = st.Stack()
        self.__Priority = q.Queue()
        self.__General = q.Queue()
        self.__count = 0
    
    def addUser(self,id, nombre, fechaNacimiento):
        temp = st.Stack()
        fecha = datetime.strptime(fechaNacimiento, '%d-%m-%Y')
        while not self.__Users.isEmpty() and fecha > self.__Users.top().birthday:
            temp.push(self.__Users.pop())
        if self.__Users.isEmpty() or id != self.__Users.top().id:
            persona = us.User(id,nombre,fecha)
            self.__Users.push(persona)
        while not temp.isEmpty():
            self.__Users.push(temp.pop())

    def findUser(self,id):
        temp = st.Stack()
        if not self.__Users.isEmpty():
            while id != self.__Users.top().id:
                temp.push(self.__Users.pop())
                if self.__Users.isEmpty():
                    while not temp.isEmpty():
                        self.__Users.push(temp.pop())
                    return None
            encontrado = self.__Users.top()
            while not temp.isEmpty():
                self.__Users.push(temp.pop())
            return encontrado
        else:
            return None
        
    def removeUser(self, id):
        if self.__Users.isEmpty():
            return None      
        temp = st.Stack()
        while not self.__Users.isEmpty() and id != self.__Users.top().id:
            temp.push(self.__Users.pop())        
        if self.__Users.isEmpty():
            while not temp.isEmpty():
                self.__Users.push(temp.pop())
            return None          
        eliminar = self.__Users.pop()
        while not temp.isEmpty():
            self.__Users.push(temp.pop())
        return eliminar

    def printUsers(self):
        temp = st.Stack()
        while not self.__Users.isEmpty():
            print(self.__Users.top())
            temp.push(self.__Users.pop())
        while not temp.isEmpty():
            self.__Users.push(temp.pop())
         

    def request(self,id):
        if self.findUser(id) != None:
            usuario = self.findUser(id)
            if usuario.birthday.year <= 1958:
                self.__Priority.enqueue(usuario)
            else:
                self.__General.enqueue(usuario)
        else: 
            print("El usuario no ha sido registrado en la base de datos")
    
    def nextService(self):
        while not self.__Priority.isEmpty() and self.__count <2:
            siguiente = self.__Priority.first()
            self.__Priority.dequeue()
            self.__count += 1
            return siguiente
        self.__count = 0
        if not self.__General.isEmpty():
            siguiente = self.__General.first()
            self.__General.dequeue()
            return siguiente
        
    def __str__(self):
        return str(self.__Users)
