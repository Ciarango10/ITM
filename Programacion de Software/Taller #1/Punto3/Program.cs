using Punto3;

class Program 
{
    public static void Main(string[] args)
    {
        //Variables Iniciales
        double IVA = 0.19;
        double Total = 0;
        double Descuento = 0.1;
        double Subtotal = 0;

        //Inicializamos los objetos
        Articulo articulo1 = new Articulo("A001", "Camisa" , 50000, 10);
        Articulo articulo2 = new Articulo("A002", "Pantalón", 80000, 3);
        Articulo articulo3 = new Articulo("A003", "Zapatos", 140000, 1);

        //Arreglo
        Articulo[] articulos = new Articulo[] { articulo1, articulo2, articulo3 };

        Console.WriteLine("Ingrese el codigo del articulo: ");
        string Codigo = Console.ReadLine();
        Console.WriteLine("Ingrese la cantidad a comprar: ");
        int Cantidad = Convert.ToInt32(Console.ReadLine());

        int indiceArticulo = -1;
        for(int i = 0; i < articulos.Length; i++)
        {
            if (articulos[i].Codigo == Codigo) 
            {
                indiceArticulo = i;
                if (articulos[i].CantidadExistente >= Cantidad)
                {
                    articulos[i].CantidadExistente-=Cantidad;
                } 
                else
                {
                    Console.WriteLine("El producto se encuentra agotado");
                }
            } 
        }
        if(indiceArticulo == -1)
        {
            Console.WriteLine("El articulo no fue encontrado");
        } 
        else
        {
            double Valor = articulos[indiceArticulo].Valor;
            string Nombre = articulos[indiceArticulo].Nombre;

            Subtotal = Valor * Cantidad;
            double TotalIva = Subtotal * IVA;
            double TotalDescuento  = Subtotal * Descuento;
            Total = Subtotal + TotalIva - TotalDescuento;

            Console.WriteLine("FACTURA DE COMPRA");
            Console.WriteLine($"Codigo: {Codigo}\n Nombre: {Nombre} \n Valor: {Valor} \n Cantidad: {Cantidad} \n Subtotal: {Subtotal} \n IVA: {TotalIva} \n Descuento: {TotalDescuento} \n Total: {Total}");
        }
    }
}

