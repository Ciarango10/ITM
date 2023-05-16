import Stack as st
def invertir(s):
    inverser = st.Stack()
    print(s)

    for c in s:
        inverser.push(c)
    
    temp=""
    while not inverser.isEmpty():
        temp += inverser.pop()
    
    print(temp)

invertir("Estructuras")

def balance(s):
    myStack = st.Stack()
    print(s)

    for c in s:
        if c == "(":
            myStack.push(c)
        elif myStack.isEmpty():
            print("Expresion desbalanceada")
            return
        else:
            myStack.pop()
            
    if myStack.isEmpty():
        print("Expresion balanceada")
    else:
        print("Expresion desbalanceada")
    
balance("()()()()()()")
balance("(()(()()()")

def precedence(c):
    if c in "+-":
        return 1 
    elif c in "*/":
        return 2
    elif c in "^":
        return 3 
    else: 
        return 0
    
def infixToPostFix(infix):
    pila = st.Stack()
    operador = "+-*/^()"
    postfija= ""

    for c in infix:
        if c not in operador:
            postfija+=c
        elif c == "(":
            pila.push(c)
        elif c ==")":
            while not (pila.isEmpty()) and pila.top()!= "(":
                postfija += pila.pop()
            pila.pop()
        else:
            while not(pila.isEmpty()) and precedence(c) <= precedence(pila.top()):
                postfija+=pila.pop()
            pila.push(c)

    while not(pila.isEmpty()):
        postfija+=pila.pop()
    return postfija

def evalPostFix(postfix):
    pila = st.Stack()
    operador = "+-*/^()"

    for c in postfix:
        if c not in operador:
            pila.push(c)
        else:
            op2 = float(pila.pop())
            op1 = float(pila.pop())

            if c == "+":pila.push(str(op1+op2))
            elif c == "-":pila.push(str(op1-op2))
            elif c == "*":pila.push(str(op1*op2))
            elif c == "/":pila.push(str(op1/op2))
            elif c == "^":pila.push(str(op1**op2))
    return float(pila.top())
    

def evalExpression(exp):
    return evalPostFix(infixToPostFix(exp))

print(evalExpression("5*6+(5-7)+9"))
