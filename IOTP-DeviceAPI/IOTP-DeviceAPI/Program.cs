// using System;
// using System.IO.Ports;
// using MySql.Data.MySqlClient;
//
// namespace IOTP_DeviceAPI {
//     class Program {
//         private static MySqlConnection dbConnection = null;
//
//         static void Main(string[] args) {
//             //Arduino SP Specs
//             SerialPort arduinoPort = new SerialPort();
//             arduinoPort.BaudRate = 9600;
//             arduinoPort.PortName = "COM5";
//
//             //Open Arduino Port.
//             arduinoPort.Open();
//
//             //Open database connection.
//             dbConnect();
//
//             while (true) {
//                 //Somehow, this SerialPort literally pauses this entire while-loop until a valid data is available for SerialPort::ReadLine();
//                 //Life-saver man...
//                 string currentFingerprint = arduinoPort.ReadLine();
//                 Console.WriteLine("Detected fingerprint ID #" + currentFingerprint);
//                 try {
//                     int fingerprintId = Int32.Parse(currentFingerprint);
//                     Console.WriteLine("Parsing data to integer: " + fingerprintId);
//
//                     //Insert into DB
//                     dbInsert(currentFingerprint);
//                 }
//                 catch (Exception) {
//                     Console.WriteLine("Parsing failed!");
//                 }
//             }
//         }
//
//         private static void dbConnect() {
//             try {
//                 dbConnection = new MySqlConnection(@"server=182.253.169.121;userid=rootpublic;password=;database=iotp");
//                 dbConnection.Open();
//             }
//             catch (Exception e) {
//                 Console.WriteLine(e);
//             }
//         }
//
//         private static void dbInsert(String eid) {
//             Console.WriteLine("Attempting to insert into attendance with employeeID #" + eid);
//             try {
//                 MySqlCommand query = new MySqlCommand();
//                 query.Connection = dbConnection;
//
//                 string queryText = "INSERT INTO iotp.attendance (timecode, employeeID) VALUES (CURRENT_TIMESTAMP()," + eid + ")";
//
//                 Console.WriteLine("Executing Query: \n" + queryText);
//
//                 query.CommandText = queryText;
//
//                 query.Prepare();
//                 query.ExecuteNonQuery();
//
//                 Console.WriteLine("Insertion Success!");
//             }
//
//             catch (Exception e) {
//                 Console.WriteLine("Insertion failed!");
//                 Console.WriteLine("error: " + e);
//             }
//         }
//     }
// }