def crearClase(modulo,clase,atributos, metodos):
    # Definimos la tabulacion como 4 espacios
    tab="    " # El caractér \t puede generar errores, entonces usamos 4 espacios.
    # Abrimos/Creamos el archivo
    file=open(modulo+".py","w",encoding="utf-8")
    
    # Comando de creacion de clase
    file.write("class "+clase+"():\n")
    
    # Defiendo el Constructor
    file.write(tab+"def __init__(self")
    for i in range(len(atributos)): # Define los parametros que recibe
        file.write(", "+atributos[i])
    file.write("):\n")
    
    # Inicializando los atributos
    for i in range(len(atributos)):
        file.write(tab*2+"self.__"+atributos[i]+"="+atributos[i]+"\n")    
    file.write("\n")
    
    # Definiendo los Getters y Setter
    for i in range(len(atributos)):
       file.write(tab+"@property\n")
       file.write(tab+"def "+atributos[i]+"(self):\n")
       file.write(tab*2+"return self.__"+atributos[i]+"\n\n")
       
       file.write(tab+"@"+atributos[i]+".setter\n")
       file.write(tab+"def "+atributos[i]+"(self,"+atributos[i]+"):\n")
       file.write(tab*2+"self.__"+atributos[i]+"="+atributos[i]+"\n\n")
    
    # Sobreescribiendo el metodo str

    file.write(tab+"def __str__(self):\n")
    file.write(tab*2+"return ")
    for i in range(len(atributos)-1):
        file.write("self."+atributos[i]+"+' '+")
    file.write("self."+atributos[-1])
    file.write("\n\n")
    
    # Definiendo Metodos Adicionales
    for i in range(len(metodos)):
        file.write(tab+"def "+metodos[i]+"():\n"+tab*2+"pass \n\n")
    
    # Cerrar el Archivo
    file.close()
       
modulo='Estudiante' # Definir nombre del módulo
clase="Estudiante"  # Definir nombre de la clase 
atributos=["Documento","Carne","Apellidos","Nombres", "Telefono" , "Email" , "Fecha_Nacimiento"]  # Definir lista de atributos
metodos=[] # Definir lista de métodos adicionales

crearClase(modulo,clase,atributos,metodos) # Llamando al método de creación de clases





