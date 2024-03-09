using System.Reflection.Metadata.Ecma335;
using System.Security.Cryptography.X509Certificates;

class Program 
{
    public static void Main(string[] args)
    {
        // Registro de usuario
        Console.Write("Ingrese su nombre: ");
        string nombre = Console.ReadLine();
        Console.Write("Ingrese su clave: ");
        string clave = Console.ReadLine();

        // Saldo inicial
        int saldo = 1000000; // 1,000,000 pesos

        while (true)
        {
            Console.WriteLine("\n******** Bienvenido al Cajero Automático ********");
            Console.WriteLine("1. Ver Saldo");
            Console.WriteLine("2. Retirar Efectivo");
            Console.WriteLine("3. Salir");
            Console.Write("Seleccione una opción: ");
            int opcion = int.Parse(Console.ReadLine());

            switch (opcion)
            {
                case 1:
                    Console.WriteLine($"Su saldo actual es: {saldo} pesos.");
                    break;
                case 2:
                    Console.Write("Ingrese la cantidad a retirar: ");
                    int cantidadRetiro = int.Parse(Console.ReadLine());

                    if (cantidadRetiro > 600000)
                    {
                        Console.WriteLine("El monto máximo de retiro es 600,000 pesos.");
                    }
                    else if(cantidadRetiro > saldo)
                    {
                        Console.WriteLine("Saldo insuficiente");
                    }
                    else if (cantidadRetiro < 1)
                    {
                        Console.WriteLine("Ingrese una cantidad válida.");
                    }
                    else
                    {
                        // Cálculo de billetes
                        int billetes50k = cantidadRetiro / 50000;
                        int billetes20k = (cantidadRetiro % 50000) / 20000;
                        int billetes10k = ((cantidadRetiro % 50000) % 20000) / 10000;
                        int billetes5k = (((cantidadRetiro % 50000) % 20000) % 10000) / 5000;

                        Console.WriteLine($"Billetes de 50,000: {billetes50k}");
                        Console.WriteLine($"Billetes de 20,000: {billetes20k}");
                        Console.WriteLine($"Billetes de 10,000: {billetes10k}");
                        Console.WriteLine($"Billetes de 5,000: {billetes5k}");

                        saldo -= cantidadRetiro;

                        if(saldo >= 2500 && saldo <= 4999)
                        {
                            saldo = 5000;
                        }
                        if(saldo == 2499)
                        {
                            saldo = 2500;
                        }
                    }
                    break;
                case 3:
                    Console.WriteLine("¡Gracias por usar nuestro servicio!");
                    return;
                default:
                    Console.WriteLine("Opción inválida. Intente nuevamente.");
                    break;
            }
        }

    }

}


