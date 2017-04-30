using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows;
using System.Windows.Controls;
using System.Windows.Data;
using System.Windows.Documents;
using System.Windows.Input;
using System.Windows.Media;
using System.Windows.Media.Imaging;
using System.Windows.Navigation;
using System.Windows.Shapes;
using System.IO.Ports;

namespace WpfPruebaGraficas
{
    /// <summary>
    /// Interaction logic for MainWindow.xaml
    /// </summary>
    public partial class MainWindow : Window
    {
        
        ControladorArduino ca = new ControladorArduino();
        double ultimo = 0;
        public MainWindow()
        {
            InitializeComponent();
        }

        // Draw a simple graph.
        private void Window_Loaded(object sender, RoutedEventArgs e)
        {
            dibujar();
        }


        private void dibujar()
        {
            int cuenta = 0;
            try
            {
                cuenta = ca.Distancias();
            }
            catch(Exception e)
            {
                cuenta = 0;
                return;
            }
            const double margin = 10;
            double xmin = margin;
            double xmax = canGraph.Width - margin;
            double ymin = margin;
            double ymax = 200;// canGraph.Height;
            double step = xmax;
            if (cuenta > 1)
                step = xmax / (cuenta - 1);
            else
                return;
            ymax = ymax / ca.Max();


            Brush[] brushes = { Brushes.Red, Brushes.Green, Brushes.Blue };
            //double[] puntos = ca.GetAll().ToArray();
            PointCollection points = new PointCollection();
            double x = xmin;
            bool ya = false;
            foreach(double y in ca.GetAll())
            {
                if (ya && y != 11)
                {
                    double yaux = y * ymax - margin;

                    points.Add(new Point(x, 200 - yaux));
                    x += step;
                }
                else
                    ya = true;
            }
            Polyline polyline = new Polyline(); polyline.StrokeThickness = 1;
                polyline.Stroke = brushes[0];
                polyline.Points = points;
                canGraph.Children.Add(polyline);
        }

        private void button_Click(object sender, RoutedEventArgs e)
        {

        }

        private void button_Click_1(object sender, RoutedEventArgs e)
        {
            canGraph.Children.Clear();
            dibujar();
            fechaHora = DateTime.Now;
            string tiempo = fechaHora.Hour + ":" + fechaHora.Minute + ":" + fechaHora.Second;
            txtResultado.Text = "Actualizado por ultima vez: " + tiempo;
            txtDistandiaTotal.Text = ca.Ultimo().ToString() + " centrimetros";
        }

        private SerialPort miPuerto;
        string datos;
        DateTime fechaHora;
        
        
        private void MiPuerto_DataReceived(object sender, SerialDataReceivedEventArgs e)
        {
            datos = miPuerto.ReadLine();
            string respuesta = "";
            for (int i = 0; i < datos.Length; i++)
            {
                if (datos[i] == '0' || datos[i] == '1' || datos[i] == '2' || datos[i] == '3' || datos[i] == '4' || datos[i] == '5' || datos[i] == '6' || datos[i] == '7' || datos[i] == '8' || datos[i] == '9')
                    respuesta += datos[i];
            }
            ca.Insertar(double.Parse(respuesta.ToString()));
        }        
        private void btnComenzar_Click(object sender, EventArgs e)
        {
            miPuerto = new SerialPort();
            miPuerto.BaudRate = 9600;
            
            miPuerto.PortName = txtPuerto.Text;
            miPuerto.Parity = Parity.None;
            miPuerto.DataBits = 8;
            miPuerto.StopBits = StopBits.One;
            miPuerto.DataReceived += MiPuerto_DataReceived;
            try
            {
                miPuerto.Open();
            }
            catch (Exception ex)
            {
                MessageBox.Show(ex.Message, "Error");
            }
        }

        private void btnDetener_Click_1(object sender, EventArgs e)
        {
            try
            {
                miPuerto.Close();
            }
            catch (Exception ex2)
            {
                MessageBox.Show(ex2.Message, "Error");
            }
        }
        
    }
}
