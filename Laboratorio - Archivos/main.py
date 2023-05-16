import numpy as np
import Estudiante as Est
import datetime as dt

try: 
    ListaEstudiantes = open("ListaEstudiantes.csv", "r", encoding = "utf8")
    line = ListaEstudiantes.readline()
    line = ListaEstudiantes.readline()

    estu_array = np.empty(30, dtype = object)

    i = 0 #Contador
    
    while line != "":
        a = line.split(";")
        line = ListaEstudiantes.readline()
        Documento = a[0]
        Carne = a[1]
        Apellidos = a[2]
        Nombres = a[3]
        Telefono = a[4]
        Email = a [5]
        Fecha_Nacimiento = a[6].split("/")
        Fecha = dt.date(int(Fecha_Nacimiento[2]), int(Fecha_Nacimiento[1]), int(Fecha_Nacimiento[0]))

        estudiante1 = Est.Estudiante(Documento, Carne, Apellidos, Nombres, Telefono, Email, Fecha) #Crear objeto Estudiante
        
        #estu_array[i] = estudiante1
        #i += 1 #Incremento del contador en 1
        line = ListaEstudiantes.readline()
        print(estudiante1)


    ListaEstudiantes.close()

except:
    print("Error de lectura de Archivo.")
