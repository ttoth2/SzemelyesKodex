using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.IO;

namespace RealEstate
{
    internal class Program
    {
        static void Main(string[] args)
        {

            List<Ad> adatok = Ad.Loadfromcsv("realestates.csv");

            int db = 0;
            double ossz = 0;
            foreach (Ad ad in adatok) 
            {
                if (ad.floors == 0) 
                {
                    ossz += ad.area;
                    db++;
                }
            }

            Console.WriteLine($"6. feladat földszint átlagos alapterülete:{ossz/3:0.00}m2");
            int lkind = 0;

            foreach (Ad ad in adatok) 
            { 
                if(ad.freeOfCharge) break;
                else lkind++;
            }
            for(int i = 0; i < adatok.Count; i++)
            {
                if (adatok[i].DistanceTo(47.4164220114023, 19.066342425796986) < adatok[lkind].DistanceTo(47.4164220114023, 19.066342425796986)
                    &&
                    adatok[i].freeOfCharge) lkind = i;

            }



            Console.WriteLine("8. feladat mesevár adatai:");
            Console.WriteLine($"\tElado neve:{adatok[lkind].seller.name}");
            Console.WriteLine($"\tElado telefon:{adatok[lkind].seller.phone}");
            Console.WriteLine($"\talapterülete:{adatok[lkind].area}");
            Console.WriteLine($"\tszobaszám:{adatok[lkind].rooms}");
            Console.ReadKey();
        }
        public class Ad
        {
            public int id;
            public string description;
            public int rooms;
            public int area;
            public int floors;
            public Category category; 
            public Seller seller;
            public bool freeOfCharge;
            public string imageUrl;
            public string latlong;
            public DateTime createAT;
            
            public Ad(string line)
            {

                string[] data = line.Split(';');
                this.id = int.Parse(data[0]);
                this.rooms = int.Parse(data[1]);
                this.latlong = data[2];
                this.floors = int.Parse(data[3]);
                this.area = int.Parse(data[4]);
                this.description = data[5];
                this.freeOfCharge = data[6] == "1";
                this.imageUrl = data[7];
                this.createAT = DateTime.Parse(data[8]);
                this.seller =new Seller();
                this.seller.id =int.Parse(data[9]);
                this.seller.name = data[10];
                this.seller.phone = data[11];
                this.category = new Category();
                this.category.id =int.Parse(data[12]);
                this.category.name = data[13];


            }
            public static List<Ad> Loadfromcsv(string filename)
            {
                List<string> list = File.ReadAllLines(filename).ToList();
                List<Ad> ad = new List<Ad>();

                list.RemoveAt(0);

                foreach (string s in list)
                {
                    ad.Add(new Ad(s));
                }
                return ad;
            }
            public double DistanceTo(double x,double y)
            {
                double a = x - double.Parse(latlong.Split(',')[0].Replace(".",","));
                double b = y - double.Parse(latlong.Split(',')[1].Replace(".", ","));
                return Math.Sqrt(a * a + b * b);
            }

        }
        public class Category
        {
            public int id { get; set; }
            public string name { get; set; }
        }
        public class Seller
        {
            public int id { get; set; }
            public string name { get; set; }
            public string phone { get; set; }
        }
        
    }
}
