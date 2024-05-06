using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using MySql.Data.MySqlClient;
using System.Web.Services;

/// <summary>
/// Summary description for WebService1
/// </summary>
[WebService(Namespace = "http://tempuri.org/")]
[WebServiceBinding(ConformsTo = WsiProfiles.BasicProfile1_1)]
[System.ComponentModel.ToolboxItem(false)]
// To allow this Web Service to be called from script, using ASP.NET AJAX, uncomment the following line. 
// [System.Web.Script.Services.ScriptService]
public class WebService1 : System.Web.Services.WebService
{
    [WebMethod]
    public int editarPersona(String ci, String nom, String ape, String ciudad)
    {
        try
        {
            using (MySqlConnection connec = new MySqlConnection("Server=localhost;Database=juanbd;User=root;Password=123456;"))
            {
                connec.Open();
                using (MySqlCommand con = new MySqlCommand())
                {
                    con.Connection = connec;
                    con.CommandText = "UPDATE `persona` SET `nombre`=@nom,`apellido`=@ape,`ciudad`=@ciudad WHERE carnet`=@ci";
                    con.Parameters.AddWithValue("@nom", nom);
                    con.Parameters.AddWithValue("@ape", ape);
                    con.Parameters.AddWithValue("@ciudad", ciudad);
                    con.Parameters.AddWithValue("@ci", ci);
                    con.ExecuteNonQuery();
                }
            }
            return 1;
        }
        catch (MySqlException ex)
        {
            string errorMessage = "Error no se puedo modificar la Persona: " + ex.Message;
            Console.WriteLine(errorMessage);
            return -1;
        }
    }

    [WebMethod]
    public int agregarPersona(String ci, String nom, String ape, String ciudad)
    {
        try
        {
            using (MySqlConnection connec = new MySqlConnection("Server=localhost;Database=juanbd;User=root;Password=123456;"))
            {
                connec.Open();
                using (MySqlCommand con = new MySqlCommand())
                {
                    con.Connection = connec;
                    con.CommandText = "INSERT INTO usuarios VALUES (@ci, @nom, @apellido, @ciudad)";
                    con.Parameters.AddWithValue("@ci", ci);
                    con.Parameters.AddWithValue("@nom", nom);
                    con.Parameters.AddWithValue("@apellido", ape);
                    con.Parameters.AddWithValue("@ciudad", ciudad);
                    con.ExecuteNonQuery();
                }
            }
            return 1;
        }
        catch (MySqlException ex)
        {
            string errorMessage = "Error al agregar a la Persona: " + ex.Message;
            Console.WriteLine(errorMessage);
            return -1;
        }
    }

    [WebMethod]
    public int eliminarPersona(String ci)
    {
        try
        {
            using (MySqlConnection connec = new MySqlConnection("Server=localhost;Database=juanbd;User=root;Password=123456;"))
            {
                connec.Open();
                using (MySqlCommand con = new MySqlCommand())
                {
                    con.Connection = connec;
                    con.CommandText = "DELETE persona WHERE carnet=@ci";
                    con.Parameters.AddWithValue("@ci", ci);
                    con.ExecuteNonQuery();
                }
            }
            return 1;
        }
        catch (MySqlException ex)
        {
            string errorMessage = "Error al eliminar Persona " + ex.Message;
            Console.WriteLine(errorMessage);
            return -1;
        }
    }
}
