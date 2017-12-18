import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.Statement;
import java.text.DateFormat;
import java.text.SimpleDateFormat;
import java.util.Date;


/**
 *
 * @author Mathew
 */
public class Escalation  {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        String driver = "com.mysql.jdbc.Driver";
        String connectionUrl = "jdbc:mysql://localhost:3306/ems3";
        String userid = "root";
        String pass = "";

        try {
            Class.forName(driver);
        } catch (ClassNotFoundException e) {
            e.printStackTrace();
        }
        Connection connection = null;
        Statement statement = null;
        ResultSet resultSet = null;

        try {
            connection = DriverManager.getConnection(connectionUrl, userid, pass);
            statement = connection.createStatement();
            while (true) {
                String sql = "SELECT ticket.id, ticket_type.type_name, ticket.tick_startDate, DATE_ADD(ticket.tick_startDate, INTERVAL ticket.tick_timelimit MINUTE) AS escalate FROM ticket LEFT JOIN "
                        +"ticket_type ON ticket.ticket_type_id = ticket_type.id "
                        +"WHERE ticket.tick_status = 'Pending'";


                resultSet = statement.executeQuery(sql);
                while (resultSet.next()) {
                    int id = resultSet.getInt("id");
                    DateFormat dateFormat = new SimpleDateFormat("yyyy/MM/dd HH:mm:ss");
                    Date now = new Date();
                    Date create = resultSet.getTimestamp("escalate");
                    if (now.after(create)) {
                        statement = connection.createStatement();
                        PreparedStatement pst;
                        String escql = "UPDATE ticket SET tick_status = 'Escalate' WHERE id = ?";
                        pst = connection.prepareStatement(escql);
                        pst.setInt(1, id);

                        pst.execute();
                        System.out.println(id + " is above time alloted");
                    }//2016/11/16 12:08:43

                }
                Thread.sleep(5 * 1000);
            }
        } catch (Exception e) {
            e.printStackTrace();
        }
    }

}