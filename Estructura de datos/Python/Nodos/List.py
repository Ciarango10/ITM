import Node as nd
class List():
    def __init__(self):
        self.__head = None
        self.__tail = None
        self.__size = 0
        
    @property
    def size(self):
        return self.__size

    @size.setter
    def size(self,size):
        self.__size=size

    def isEmpty(self):
        return self.__size==0

    def First(self):
        return self.__head

    def Last(self):
        return self.__tail

    def addFirst(self,e):
        n = nd.Node(e)
        if self.isEmpty():
            self.__head = n
            self.__tail = n
        else:
            n.next = self.__head
            self.__head = n
        self.__size+=1

    def addLast(self,e):
        n = nd.Node(e)
        if self.isEmpty():
            self.__head = n
            self.__tail = n
        else:
            self.__tail.next = n
            self.__tail = n
        self.__size+=1

    def removeFirst(self):
        if not self.isEmpty():
            temp = self.__head
            self.__head = temp.next
            temp.next = None
            self.__size-=1
            return temp.data
        else:
            return None

    def removeLast(self):
        if self.__size == 1:
            self.removeFirst()
        elif self.__size > 1:
            temp = self.__tail
            anterior = self.__head
            while anterior.next != self.__tail:
                anterior = anterior.next
            anterior.next = None
            self.__tail = anterior
            self.__size-=1
            return temp.data
        else:
            return None
    
    def __str__(self):
        return str(self.__head)