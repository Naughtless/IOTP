using System;
using System.IO.Ports;
using MySql.Data.MySqlClient;

namespace lol {
    class Program2 {
        private static MySqlConnection dbConnection = null;

        static void Main(string[] args) {
            //Arduino SP Specs
            SerialPort arduinoPort = new SerialPort();
            arduinoPort.BaudRate = 9600;
            arduinoPort.PortName = "COM5";

            //Open Arduino Port.
            arduinoPort.Open();

            //Open database connection.
            dbConnect();

            while (true)
            {
                string currentData = arduinoPort.ReadLine();

                dbInsert(currentData);
            }
        }

        private static void dbConnect() {
            try {
                dbConnection = new MySqlConnection(@"server=localhost;userid=root;password=;database=w12pt");
                dbConnection.Open();
            }
            catch (Exception e) {
                Console.WriteLine(e);
            }
        }

        private static void dbInsert(String dataInput) {
            Console.WriteLine("Attempting to insert data:" + dataInput);
            try {
                MySqlCommand query = new MySqlCommand();
                query.Connection = dbConnection;

                string queryText = "INSERT INTO w12pt.data VALUES (CURRENT_TIMESTAMP()," + dataInput + ")";

                Console.WriteLine("Executing Query: \n" + queryText);

                query.CommandText = queryText;

                query.Prepare();
                query.ExecuteNonQuery();

                Console.WriteLine("Insertion Success!");
            }

            catch (Exception e) {
                Console.WriteLine("Insertion failed!");
                Console.WriteLine("error: " + e);
            }
        }
    }
}