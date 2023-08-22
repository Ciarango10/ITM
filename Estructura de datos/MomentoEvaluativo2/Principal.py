"""
Carlos Ivan Arango Londoño
Juan David Machado Mosquera
Santiago Gonzalez Ruiz
Cesar Augusto Marin Suaza
Grupo 580506004-10
"""
import Servicio as serv
import Portafolio as pt
import PortafolioOrdenado as ptOrdenado

try: 
    portafolio1 = pt.Portafolio(10) #Inicializamos el portafolio
    
    servicios = open("serviciosCM.csv", "r", encoding = "utf8") #Abrimos el archivo que contiene los servicios de modo lectura
    cabecera = servicios.readline() #Esto lo hacemos para que la primera linea que contiene las cabeceras no se evalue dentro del ciclo sino que se almacene en la variable cabecera
    line = servicios.readline() 

    while line != "":
        infoServicios = line.split(";") #Separador
        Codigo = infoServicios[0] 
        Descripcion = infoServicios[1]
        Valor = infoServicios[2]
        servicio1 = serv.Servicio(Codigo,Descripcion,Valor) #Inicializacion del servicio
        portafolio1.almacenarInformacionServicios(servicio1) #Guardar Informacion Servicios
        line = servicios.readline() #Esto se usa para que no sea un ciclo infinito 
    servicios.close() #Cerrar Archivo

except:
    print("Error de lectura de Archivo.")

try:
    portafolioOrdenado1 = ptOrdenado.PortafolioOrdenado(5) #Inicializamos el portafolio Ordenado
    
    solicitudes = open("solicitudes.csv", "r", encoding="utf8")
    cabecera = solicitudes.readline() #Esto lo hacemos para que la primera linea que contiene las cabeceras no se evalue dentro del ciclo sino que se almacene en la variable cabecera
    line = solicitudes.readline()
    
    while line != "":
        infoSolicitudes = line.split(";") #Separador 
        Codigo = infoSolicitudes[0] #El valor de los codigos se encuentra en la posicion 0 del infoSolicitudes, por tanto pasamos esos valores a la variable Codigo
        portafolio1.incrementarSolicitudes(Codigo) #Incrementamos el contador de solicitudes cada vez que se haga un registro nuevo     
        line = solicitudes.readline() #Esto se usa para que no sea un ciclo infinito
    solicitudes.close() #Cerrar archivo
   
except:
    print("Error de la lectura de Archivo")

for i in range(portafolio1.nroEntradas):
    portafolioOrdenado1.agregarPortafolioOrdenado(portafolio1.arreglo[i])

portafolio1.llevarInfoServicioArchivo("InfoTodo.csv")#Llevar la informacion de todos los servicios a un archivo

servicioEncontrado = portafolio1.buscarServicio("E12") #Buscar el servicio
print(servicioEncontrado) #Imprimir el valor del servicio encontrado

servicioEliminado = portafolio1.eliminarServicio("C58") #Eliminar el servicio
print(servicioEliminado) #Imprimir el valor del servicio eliminado

portafolio1.llevarInfoServicioArchivo("InfoEliminado.csv")#Escribimos un archivo nuevo despues de eliminar el servicio para confirmar que se eliminó correctamente
portafolioOrdenado1.llevarInfoServicioArchivo("InfoOrdenada.csv")#Llevar la informacion ordenada de los 5 servicios mas solicitados a un archivo


