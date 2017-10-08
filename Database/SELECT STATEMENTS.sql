/* Ticket Type Count */
/* For Engineering */
Select type_name, count(ticket.ticket_type_id) as count
    from ticket_type
           join ticket
            on (ticket_type.id = ticket_type.ticket_type_id)
                where department_id = 1
   
/* For Housekeeping */

                
/* Room Location Count */
/* For Housekeeping */    
/* For Engineering */

/* Request Time Count */
/* For Housekeeping */    
/* For Engineering */

/* Common Request Count */
/* For Housekeeping */

