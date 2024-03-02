//Hacer un programa que almacene numeros en una matriz de 3 * 4.
//Imprimir la suma de los numeros pares almacenados en la matriz.

class Program
{
    public static void Main(string[] args)
    {
        int i, j;
        int Suma = 0;

        //Crear matriz
        int[,] num = new int[3, 4];

        //Llenamos filas en i
        for (i = 0; i <= 2; i++)
        {
            for (j = 0; j <= 3; j++)
            {
                Console.Write("Digite un numero["+i+"]["+j+"]: ");
                num[i,j] = Convert.ToInt32(Console.ReadLine());
            }
        }

        //Mostrar la matriz llena
        for (i = 0; i <= 2; i++)
        {
            for (j = 0; j <= 3; j++)
            {
                Console.Write(num[i,j] + "");
            }
            Console.WriteLine("");
        }

        //Hallar los pares y sumarlos
        for (i = 0; i <= 2; i++)
        {
            for (j = 0; j <= 3; j++)
            {
                if (num[i,j] % 2 == 0)
                {
                    Suma += num[i, j];
                }
                
            }
        }
        Console.WriteLine("");
        Console.WriteLine($"La suma de los pares es: {Suma}");
    }
}
