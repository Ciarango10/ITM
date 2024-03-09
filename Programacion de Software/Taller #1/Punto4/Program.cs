using Punto4;

class Program
{
    public static void Main(string[] args)
    {
        Libro libro = new Libro(10,500,1,"100 Años de soledad", "Lujo", "Gabriel Garcia Marquez");
        Periodico periodico = new Periodico(3, 600, 2, "Asalto en Medellin", "Normal", "QHUBO", "31/01/2024");

        Console.WriteLine(libro.CalcularCosto());
        Console.WriteLine(periodico.CalcularCosto());
    }
}