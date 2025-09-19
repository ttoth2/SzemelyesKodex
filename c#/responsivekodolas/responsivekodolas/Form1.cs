using System;
using System.CodeDom.Compiler;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.IO;
using System.Linq;
using System.Net;
using System.Text;
using System.Text.RegularExpressions;
using System.Threading.Tasks;
using System.Windows.Forms;
using static System.Windows.Forms.VisualStyles.VisualStyleElement;

namespace responsivekodolas
{
    public partial class Form1 : Form
    {
        int sorszam = 0;
        public Form1()
        {
            InitializeComponent();
            
            

        }

        private void btnkod_Click(object sender, EventArgs e)
        {
            bool veges = false;
            if (File.Exists(filetxb.Text))
            {
                string[] txt = File.ReadAllLines(filetxb.Text);

                Regex valid = new Regex(@"xxx(\d+)\.x\.([01]{32})\.x\.([01]{32})\.x\.(.*?)\.x\.(\d+)\.-\+\.");
                Regex kezdr = new Regex(@"xxx");
                Regex veger = new Regex(@"\.-\+\.");
                Regex fileveg = new Regex(@"\.-\+\-\.");
                

                string msg = "";
               
                foreach (string s in txt) { msg += s; }
                int kezd = 0;
                int vege = 0;
                

                for (int i = 0; i < msg.Length; i++)
                {
                    ;
                    try
                    {
                        if (kezdr.IsMatch(msg.Substring(i, 3)))
                        {
                            kezd = i;
                            vege = 0;
                        }
                    }
                    catch (Exception) { }

                    if (i + 4 <= msg.Length)
                    {
                        try
                        {
                            if (fileveg.IsMatch(msg.Substring(i, 5)))
                            {
                                veges = true;
                            }
                        }catch (Exception) { }
                        
                        string temp = msg.Substring(i, 4);
                        if (veger.IsMatch(msg.Substring(i, 4)))
                        {

                            vege = i + 4 - kezd;

                            Match match = valid.Match(msg.Substring(kezd, vege));
                            if (match.Success && vege != 0)
                            {
                                sorszam = int.Parse(match.Groups[1].Value);
                            }
                            
                        }
                    }
                }
            }   
            string ip1 = textBIP.Text;
            string ip2 = textBIP2.Text;
            string text = textBTEXT.Text;
            string date = DateTime.Now.Ticks.ToString();

            string binaryIp1 = enkryptalas(ip1);
            string binaryIp2 = enkryptalas(ip2);
            string uzen = "";
            if (binaryIp1 == null || binaryIp2 == null)
            {
                MessageBox.Show("Hibás IP-cím formátum!", "Hiba", MessageBoxButtons.OK, MessageBoxIcon.Error);
                return;
            }
            if (veges)
            {
                MessageBox.Show("Ez a csatorna lezárult!");
            }
            else
            {
                if (checkBox1.Checked)
                {
                    uzen = $"xxx{sorszam + 1}.x.{binaryIp1}.x.{binaryIp2}.x.{text}.x.{date}.-+..-+-.";
                }
                else
                {
                    uzen = $"xxx{sorszam + 1}.x.{binaryIp1}.x.{binaryIp2}.x.{text}.x.{date}.-+.";
                }
            }
            
            
           
            File.AppendAllText(filetxb.Text, uzen + Environment.NewLine);
            sorszam = 0;
        }

        private void btndekod_Click(object sender, EventArgs e)
        {

            dataGridView1.Rows.Clear();
            Regex valid = new Regex(@"xxx(\d+)\.x\.([01]{32})\.x\.([01]{32})\.x\.(.*?)\.x\.(\d+)\.-\+\.");
            Regex kezdr = new Regex(@"xxx");
            Regex veger = new Regex(@"\.-\+\.");
            if (File.Exists(filetxb.Text))
            {
                string[] txt = File.ReadAllLines(filetxb.Text);
                string msg = "";

                foreach (string s in txt) { msg += s; }



                int kezd = 0;
                int vege = 0;


                for (int i = 0; i < msg.Length; i++)
                {
                    ;
                    try
                    {
                        if (kezdr.IsMatch(msg.Substring(i, 3)))
                        {
                            kezd = i;
                            vege = 0;
                        }
                    }
                    catch (Exception) { }

                    if (i + 4 <= msg.Length)
                    {


                        string temp = msg.Substring(i, 4);
                        if (veger.IsMatch(msg.Substring(i, 4)))
                        {

                            vege = i + 4 - kezd;

                            Match match = valid.Match(msg.Substring(kezd, vege));
                            if (match.Success && vege != 0)
                            {
                                string ssz = match.Groups[1].Value;
                                string ip1 = dekryptalas(match.Groups[2].Value);
                                string ip2 = dekryptalas(match.Groups[3].Value);
                                string text = match.Groups[4].Value;
                                DateTime myDate = new DateTime(long.Parse(match.Groups[5].Value));

                                string date = myDate.ToString("yyyy, MMMM dd. hh:mm"); ;
                                vege = 0;

                                dataGridView1.Rows.Add(ssz, ip1, ip2, text, date);
                            }
                        }
                    }
                }
            }
            
        }

        private string enkryptalas(string Ipalap)
        {
            if (IPAddress.TryParse(Ipalap, out IPAddress address))
            {
                byte[] bytes = address.GetAddressBytes();
                Array.Reverse(bytes);
                return string.Concat(Array.ConvertAll(bytes, b => Convert.ToString(b, 2).PadLeft(8, '0')));
            }
            return null;

        }
        private string dekryptalas(string Ipalap)
        {
            try
            {
                byte[] bytes = Enumerable.Range(0, 4).Select(i => Convert.ToByte(Ipalap.Substring(i * 8, 8), 2)).ToArray();
                Array.Reverse(bytes);
                return string.Join(".", bytes);
            }
            catch
            {
                return "Hibás IP";
            }
        }

        private void Form1_Load(object sender, EventArgs e)
        {
            dataGridView1.ColumnCount = 5;
            dataGridView1.AutoSizeColumnsMode=DataGridViewAutoSizeColumnsMode.Fill;
            dataGridView1.Columns[0].Name = "Sorszám";
            dataGridView1.Columns[0].Width = (int)(dataGridView1.Width * 0.1);
            dataGridView1.Columns[1].Name = "IP 1";
            dataGridView1.Columns[1].Width = (int)(dataGridView1.Width * 0.20);
            dataGridView1.Columns[2].Name = "IP 2";
            dataGridView1.Columns[2].Width = (int)(dataGridView1.Width * 0.20);
            dataGridView1.Columns[3].Name = "Üzenet";
            dataGridView1.Columns[3].Width = (int)(dataGridView1.Width * 0.3);
            dataGridView1.Columns[4].Name = "Dátum";
            dataGridView1.Columns[4].Width = (int)(dataGridView1.Width * 0.20);
        }

        private void tableLayoutPanel1_Paint(object sender, PaintEventArgs e)
        {

        }

        private void filetxb_TextChanged(object sender, EventArgs e)
        {

        }
    }
}
