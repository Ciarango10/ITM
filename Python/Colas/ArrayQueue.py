import numpy as np
class ArrayQueue():
    def __init__(self, capacity):
        self.__data = np.empty(capacity, dtype=object)
        self.__first = -1
        self.__rear = -1
    
    def size(self):
        if self.__rear == -1 and self.__first == -1:
            return 0
        else:
            temp = len(self.__data) - self.__first + self.__rear
            temp = temp % len(self.__data) + 1
            return temp
    
    def isEmpty(self):
        return self.size()==0
    
    def enqueue(self, e):
        if self.size() < len(self.__data): 
            if self.isEmpty():
                self.__first = 0 
            self.__rear = (self.__rear + 1) % len(self.__data)
            self.__data[self.__rear] = e

    def dequeue(self):
        if self.isEmpty():
            return None
        elif self.__first == self.__rear:
            temp = self.__data[self.__first]
            self.__data[self.__first] = None
            self.__first = -1
            self.__rear = -1
            return temp
        else:
            temp = self.__data[self.__first]
            self.__data[self.__first] = None
            self.__first = (self.__first + 1) % len(self.__data)
            return temp
    
    def first(self):
        if self.isEmpty():
            return None
        else:
            return self.__data[self.__first]
    
    def __str__(self):
        return str(self.__data) 