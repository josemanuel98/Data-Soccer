using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.IO.Ports;

namespace WpfPruebaGraficas
{
    class ControladorArduino
    {
        List<double> jugador1 = new List<double>();

        /*public void CrearLista()
        {
            jugador1 = new List<double>();
        }*/

        public void Insertar(double dist)
        {
            try
            {
                jugador1.Add(dist);
            }
            catch (Exception e) { }
        }

        public List<double> GetAll()
        {
            return jugador1;
        }

        public double Max()
        {
            return jugador1.Max();
        }
        public double Min()
        {
            return jugador1.Min();
        }

        public int Distancias()
        {
            int cont = 0;
            foreach(double a in GetAll())
            {
                if (a != 11)
                    cont++;
            }
            return cont;
        }
        public double Ultimo()
        {
            if (jugador1.Count > 0)
                return jugador1[jugador1.Count - 1];
            else
                return 0;
        }
    }
}
