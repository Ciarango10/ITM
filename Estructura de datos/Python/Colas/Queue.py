import List as lst
class Queue():
    def __init__(self):
        self.__data = lst.List()
    
    def size(self):
        return self.__data.size
    
    def isEmpty(self):
        return self.size() == 0
    
    def enqueue(self,e):
        self.__data.addLast(e)
    
    def dequeue(self):
        if self.isEmpty():
            return None
        else:
            return self.__data.removeFirst()

    def first(self):
        if self.isEmpty():
            return None
        else:
            return self.__data.First().data
        
    def __str__(self):
        return str(self.__data)
    