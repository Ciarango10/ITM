using Banco;

class Program {
    public static void Main(string[] args)
    {
        //Variables apertura cuenta
        double MontoAr, SaldoInicialAr;
        int opcion;
        string NombreAr, ApellidosAr, DireccionAr, CedulaAr;

        Console.Write("Esta a punto de crear una nueva cuenta bancaria, presione una tecla para continuar: ");
        Console.ReadKey();
        Console.WriteLine("\nIngrese los datos que se piden a continuacion: ");
       
        Console.Write("\n Nombre: ");
        NombreAr = Console.ReadLine();
        Console.Write("\n Apellidos: ");
        ApellidosAr = Console.ReadLine();
        Console.Write("\n Direccion: ");
        DireccionAr = Console.ReadLine();
        Console.Write("\n Cedula: ");
        CedulaAr = Console.ReadLine();
        Console.Write("Ingrese el saldo inicial para abrir su cuenta bancaria: $ ");
        SaldoInicialAr = Convert.ToDouble(Console.ReadLine());

        //Instanciamos la clase y creamos un objeto llamado cliente
        CuentaBancaria cliente = new CuentaBancaria(NombreAr, ApellidosAr, DireccionAr, CedulaAr, SaldoInicialAr);

        Console.Write("Felicitaciones, ha creado una nueva cuenta, presione una tecla para continuar: ");
        Console.ReadKey();

        do
        {
            Console.WriteLine("\n1. Deposito");
            Console.WriteLine("2. Retiro");
            Console.WriteLine("3. Consultar Saldo");
            Console.WriteLine("4. Mostrar Informacion de la cuenta");
            Console.WriteLine("5. Salir");

            Console.WriteLine("Elija una opcion del menu: ");
            opcion = Convert.ToInt32(Console.ReadLine());

            switch (opcion)
            {
                case 1:
                    Console.Write("Ingrese el monto a depositar: ");
                    MontoAr = Convert.ToDouble(Console.ReadLine());
                    cliente.Deposito(MontoAr);
                    break;
                case 2:
                    Console.Write("Ingrese el monto a retirar: ");
                    MontoAr = Convert.ToDouble(Console.ReadLine());
                    cliente.Retiro(MontoAr);
                    break;
                case 3:
                    cliente.ConsultaSaldoPa();
                    break;
                case 4:
                    Console.WriteLine(cliente.ToString());
                    break;
                default:
                    Console.WriteLine("Seleccione la opcion correcta");
                    break;
            }

        } while(opcion != 5);
    }
}

