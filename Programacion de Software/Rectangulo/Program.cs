// See https://aka.ms/new-console-template for more information
//Calcular el area y perimetro de un rectangulo

class Program
{
    static void Main()
    {
        float Ancho, Altura, Area, Perimetro;

        Console.Write("Ingrese el ancho del rectangulo: ");
        Ancho = float.Parse(Console.ReadLine());

        Console.Write("Ingrese la altura del rectangulo: ");
        Altura = float.Parse(Console.ReadLine());

        Area = Ancho * Altura;
        Perimetro = (Ancho * 2) + (Altura * 2);
        Console.WriteLine("El area es: " + Area);
        Console.WriteLine("El Perimetro es: " + Perimetro);
    }
}