/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/JSP_Servlet/Servlet.java to edit this template
 */

import java.io.IOException;
import java.io.PrintWriter;
import jakarta.servlet.ServletException;
import jakarta.servlet.annotation.WebServlet;
import jakarta.servlet.http.HttpServlet;
import jakarta.servlet.http.HttpServletRequest;
import jakarta.servlet.http.HttpServletResponse;

/**
 *
 * @author juanRamos
 */
@WebServlet(urlPatterns = {"/ejerCuatro"})
public class ejerCuatro extends HttpServlet {

    /**
     * Processes requests for both HTTP <code>GET</code> and <code>POST</code>
     * methods.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    protected void processRequest(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        response.setContentType("text/html;charset=UTF-8");
        String codcuenta = request.getParameter("codcuenta");
        String carnet = request.getParameter("carnet");
        String monto = request.getParameter("monto");
        try (PrintWriter out = response.getWriter()) {
            /* TODO output your page here. You may use following sample code. */
            out.println("<!DOCTYPE html>");
            out.println("<html>");
            out.println("<head>");
            out.println("<title>Servlet ejerCuatro</title>");            
            out.println("</head>");
            out.println("<body>");
            out.println("<style>body { margin: 0; background-color: #3C5B6F; color: #DFD0B8; height: auto; padding-bottom: 100px;}\n" +
"header { height: 100px;font-size: 40px;text-align: center;\n" +
"}\n" +
"\n" +
"footer {\n" +
"    padding-top: 50px;\n" +
"    text-align: center;\n" +
"    position: fixed; \n" +
"    bottom: 0; \n" +
"    width: 100%; \n" +
"}\n" +
"\n" +
".container {\n" +
"    width: 95%;\n" +
"}\n" +
"\n" +
".cajita\n" +
"{\n" +
"    text-align: center;\n" +
"    background-color: #948979;\n" +
"    padding-top: 20px;\n" +
"    padding-bottom: 20px;\n" +
"    margin-left:250px;\n" +
"    margin-top: 80px;\n" +
"    width: 65%;\n" +
"}</style>");
out.println("<header>\n" +
"    <div class=\"container\">\n" +
"        <h1>Banco JUAN</h1>\n" +
"    </div>\n" +
"</header>");
out.println("<div class=\"cajita\">");
            out.println("<h1>LOS DATOS ENVIADOS:</h1>");
            
            if (codcuenta != null && !carnet.isEmpty() && monto != null) {
                out.println("<p>Su cuenta es " + codcuenta + "</p>");
                out.println("<p> que pertenece a la persona de carnet " + carnet + "</p>");
                out.println("<p> y envia un monto de " + monto + "</p>");
            } else {
                out.println("<p>Sin datos</p>");
            }
            out.println("</div>");
            
            out.println("</body>");
            out.println("</html>");
        }
    }

    // <editor-fold defaultstate="collapsed" desc="HttpServlet methods. Click on the + sign on the left to edit the code.">
    /**
     * Handles the HTTP <code>GET</code> method.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    @Override
    protected void doGet(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        processRequest(request, response);
    }

    /**
     * Handles the HTTP <code>POST</code> method.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    @Override
    protected void doPost(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        processRequest(request, response);
    }

    /**
     * Returns a short description of the servlet.
     *
     * @return a String containing servlet description
     */
    @Override
    public String getServletInfo() {
        return "Short description";
    }// </editor-fold>

}
