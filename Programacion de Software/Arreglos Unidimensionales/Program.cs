//Crea un arreglo unidimensional con un tamaño de 5 (numeros reales),
//preguntale al usuario los valores y calcula la suma y promedio de todos ellos.
class Program
{
    public static void Main(String[] args)
    {
        int i;
        double Suma, Promedio;
        double[] numerosReales = new double[5];
        Suma = 0;

        //Ingresar los elementos del arreglo
        for (i = 0; i < numerosReales.Length; i++)
        {
            Console.Write(i+1 + ".Digite un numero real: ");
            numerosReales[i] = Convert.ToDouble(Console.ReadLine());
            Suma += numerosReales[i];
        }

        Promedio = Suma / numerosReales.Length;
        Console.WriteLine($"La suma es: {Suma}");
        Console.WriteLine($"El promedio es: {Promedio}");
    }
}
