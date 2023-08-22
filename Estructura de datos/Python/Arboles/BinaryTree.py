import DoubleNode as Dnd
import Queue as q
class BinaryTree():
    def __init__(self):
        self.__root = Dnd.DoubleNode()
        self.__size = 0

    def size(self):
        return self.__size
    
    def isEmpty(self):
        return self.__size == 0
    
    def isRoot(self,v):
        return v == self.__root
    
    def isInternal(self, v):
        if v == None:
            return False
        if v.prev == None and v.next == None:
            return False
        else:
            return True
        
    def hasLeft(self,v):
        return v.prev != None
    
    def hasRight(self,v):
        return v.next != None
    
    def left(self,v):
        return v.prev
    
    def right(self,v):
        return v.next
    
    def parent(self,v):
        if self.isRoot(v):
            return None
        else:
            Q = q.Queue()
            Q.enqueue(self.__root)
            temp = self.__root
            while not(Q.isEmpty()) and self.left(Q.first()) != v and self.right(Q.first()) != v:
                temp = Q.dequeue()
                if self.hasLeft(temp):
                    Q.enqueue(self.left(temp))
                if self.hasRight(temp):
                    Q.enqueue(self.right(temp))
            return Q.first()
    
    def depth(self,v):
        if self.isRoot(v):
            return 0
        else:
            return 1 + self.depth(self.parent(v))
        
    def height(self,v):
        if not self.isInternal(v):
            return 0
        else:
            if self.hasLeft(v) and self.hasRight(v):
                h = max(self.height(self.left(v)), self.height(self.right(v)))
            elif not(self.hasLeft(v)):
                h = self.height(self.right(v))
            else:
                h = self.height(self.left(v))
            return 1+h
    
    def addRoot(self, e):
        self.__root = Dnd.DoubleNode(e)
        self.__size = 1
    
    def insertLeft(self, v, e):
        left = Dnd.DoubleNode(e)
        v.prev = left
        self.__size+=1

    def insertRight(self, v, e):
        right = Dnd.DoubleNode(e)
        v.next = right
        self.__size+=1
    
    def remove(self, v):
        p = self.parent(v)
        if self.hasLeft(v) or self.hasRight(v):
            if self.hasLeft(v):
                child = self.left(v)
            else:
                child = self.right(v)
            if self.left(p) == v:
                p.prev = child
            else:
                p.next = child
            v.prev = None
            v.next = None
        else:
            if self.left(p) == v:
                p.prev = None
            else:
                p.next = None
        self.__size-=1

