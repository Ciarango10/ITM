class Node():
    def __init__(self, data=None):
        self.__data = data
        self.__next = None

    @property
    def data(self):
        return self.__data

    @data.setter
    def data(self,data):
        self.__data=data

    @property
    def next(self):
        return self.__next

    @next.setter
    def next(self,next):
        self.__next=next

    def __str__(self):
        return str(self.data)+' '+str(self.next)

