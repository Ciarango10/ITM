using Punto2;

class Program
{
    public static void Main(string[] args)
    {
        Cliente cliente1 = new Cliente(600000, "Jose", "Masculino", "1025124124");
        Cliente cliente2 = new Cliente(800000, "Sara", "Femenino", "11231244");
        Cliente cliente3 = new Cliente(400000, "Valentina", "Femenino", "63573373");
        Cliente cliente4 = new Cliente(-100000, "Juan", "Masculino", "342363636");
        Cliente cliente5 = new Cliente(900000, "Carlos", "Masculino", "8738363123");

        Cliente[] arregloClientes = new Cliente[] { cliente1, cliente2, cliente3, cliente4, cliente5 };

        Console.WriteLine(cliente1.SaldoPromedio(arregloClientes));
        Console.WriteLine(cliente1.SaldoNegativo(arregloClientes));
        Console.WriteLine(cliente1.SaldoPositivo(arregloClientes));
        Console.WriteLine(cliente1.SaldoMenor(arregloClientes));
        Console.WriteLine(cliente1.SaldoMayor(arregloClientes));
        Console.WriteLine(cliente1.SaldoPromedioGenero(arregloClientes));
    }

}

