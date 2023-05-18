class DoubleNode():
    def __init__(self,data):
        self.__data = data
        self.__next = None
        self.__prev = None
    
    @property
    def data(self):
        return self.__data
    
    @data.setter
    def data(self,data):
        self.__data = data

    @property
    def next(self):
        return self.__next
    
    @next.setter
    def next(self,next):
        self.__next = next
    
    @property
    def prev(self):
        return self.__prev
    
    @prev.setter
    def prev(self,prev):
        self.__prev = prev

    def __str__(self):
        return str(self.data)


