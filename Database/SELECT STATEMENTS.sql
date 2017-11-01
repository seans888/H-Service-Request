/* MONTHLY REPORT FOR HOUSEKEEPING*/

/* Type count */
Select type_name 'Type of Request Received', count(ticket.ticket_type_id)
as count from ticket_type left join ticket on(ticket_type.id=ticket.ticket_type_id)
where ticket_type_id IN(3,4) AND tick_startDate BETWEEN DATE_ADD(NOW(), INTERVAL -1 MONTH)
AND NOW() group by ticket_type.id ORDER BY COUNT DESC


/* Item Request Count */
select tick_request as 'ITEM REQUEST', count(*)
as COUNT from ticket WHERE ticket_type_ID = 3
AND tick_startDate BETWEEN DATE_ADD(NOW(), INTERVAL -1 MONTH)
AND NOW() group by tick_request order by count desc limit 3


/* Assistance Request Count */


/* Counts of all ticket */


/* Outstanding Employee */


/* Ticket count in location */
Select room_location as 'Location' , count(room.room_no)
as count from room join ticket on (room.room_no = ticket.room_room_no)
where ticket_type_id in ('3','4')
AND tick_startDate BETWEEN DATE_ADD(NOW(), INTERVAL -1 MONTH)


/* Rooms that requested more than one in housekeeping department */
