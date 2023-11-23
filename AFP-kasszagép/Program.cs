using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace AFP_kasszagép
{
    internal class Program
    {
        static ConsoleKey Menu()
        {

            Console.WriteLine("U: Új vásárlás");
            Console.WriteLine("L: Vásárlások megjelenítése");
            Console.WriteLine("V: Vásárlások kezelése");
            Console.WriteLine("Esc: Kassza bezár");

            return Console.ReadKey(true).Key;
        }

        static void Main(string[] args)
        {
            Console.WriteLine("Válasszon a lenti menüpontok közül: ");

            ConsoleKey k;
            do
            {
                k = Menu();

                Console.WriteLine("Ide jönnek a menük majd");


            }
            while (k != ConsoleKey.Escape);

        }
    }
}
