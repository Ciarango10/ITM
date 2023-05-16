import numpy as np
class ArrayStack():
    def __init__(self,capacity):
        self.__data = np.empty(capacity, dtype=object)
        self.__top = -1

    def size(self):
        return self.__top+1

    def isEmpty(self):
        return self.size() == 0

    def isFull(self):
        return self.size() == len(self.__data)

    def push(self, e):
        if not self.isFull():
            self.__top +=1
            self.__data[self.__top] = e
            
    def pop(self):
        if self.isEmpty():
            return None
        else:
            temp = self.__data[self.__top]
            self.__data[self.__top] = None
            self.__top-=1
            return temp

    def top(self):
        if self.isEmpty():
            return None
        else:
            return self.__data[self.__top]
        
    def __str__(self):
        return str(self.__data)