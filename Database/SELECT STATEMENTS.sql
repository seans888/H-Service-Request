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
select tick_request as 'ASSISTANCE REQUEST', count(*)
as COUNT from ticket WHERE ticket_type_ID = 4
AND tick_startDate BETWEEN DATE_ADD(NOW(), INTERVAL -1 MONTH)
AND NOW() group by tick_request order by count desc limit 3


/* Counts of all ticket */
Select 'Total', sum(count) from (Select type_name 'Type of Request Received',
count(ticket.ticket_type_id) as count from ticket_type
left join ticket on (ticket_type.id=ticket.ticket_type_id)
where ticket_type_id IN(3, 4) AND tick_startDate
BETWEEN DATE_ADD(NOW(), INTERVAL -1 MONTH)
AND NOW() group by ticket_type.id ORDER BY COUNT DESC)x


/* Outstanding Employee */
Select username, count(user.id)
as count from user left join ticket on (user.id = ticket.assigned_to)
where ticket_type_id in ('3','4') AND tick_startDate
BETWEEN DATE_ADD(NOW(), INTERVAL -1 MONTH)
AND NOW() group by user.id order by count desc limit 3


/* Ticket count in location */
Select room_location as 'Location' , count(room.room_no)
as count from room left join ticket on (room.room_no = ticket.room_room_no)
where ticket_type_id in ('3','4')
AND tick_startDate BETWEEN DATE_ADD(NOW(), INTERVAL -1 MONTH)
AND NOW()  group by room.room_location order by count desc


/* Rooms that requested more than one in housekeeping department */
select room_room_no as 'Room', count(*)
as COUNT from ticket where ticket_type_id in (3,4)
AND tick_startDate BETWEEN DATE_ADD(NOW(), INTERVAL -1 MONTH)
AND NOW() group by room_room_no having count(*) > 1 order by COUNT desc



/* MONTHLY REPORT FOR ENGINEERING */

/* Type count */
Select type_name 'Type of Request Received',
count(ticket.ticket_type_id) as count from ticket_type
left join ticket on(ticket_type.id=ticket.ticket_type_id)
where ticket_type_id IN(1, 2) AND tick_startDate
BETWEEN DATE_ADD(NOW(), INTERVAL -1 MONTH)
AND NOW() group by ticket_type.id ORDER BY COUNT DESC


/* Electrical Repair Request */
select tick_request as 'ELECTRICAL REPAIR REQUEST',
count(*) as COUNT from ticket WHERE ticket_type_ID = 1
AND tick_startDate BETWEEN DATE_ADD(NOW(), INTERVAL -1 MONTH)
AND NOW() group by tick_request order by count desc limit 3


/* NON-Electrical Repair Request */
select tick_request as 'NON-ELECTRICAL REPAIR REQUEST',
count(*) as COUNT from ticket WHERE ticket_type_ID = 2
AND tick_startDate BETWEEN DATE_ADD(NOW(), INTERVAL -1 MONTH)
AND NOW() group by tick_request order by count desc limit 3


/* Counts of all ticket */
Select 'Total', sum(count) from (Select type_name 'Type of Request Received',
count(ticket.ticket_type_id) as count from ticket_type
left join ticket on (ticket_type.id=ticket.ticket_type_id)
where ticket_type_id IN(1, 2) AND tick_startDate
BETWEEN DATE_ADD(NOW(), INTERVAL -1 MONTH)
AND NOW() group by ticket_type.id ORDER BY COUNT DESC)x


/* Outstanding Employee */
Select username, count(user.id) as count from user
left join ticket on (user.id = ticket.assigned_to)
where ticket_type_id in ('1','2') AND tick_startDate
BETWEEN DATE_ADD(NOW(), INTERVAL -1 MONTH)
AND NOW() group by user.id order by count desc limit 3


/* Ticket count in location */
Select room_location as 'Location' ,
count(room.room_no) as count from room
left join ticket on (room.room_no = ticket.room_room_no)
where ticket_type_id in ('1','2')
AND tick_startDate BETWEEN DATE_ADD(NOW(), INTERVAL -1 MONTH)
AND NOW()  group by room.room_location order by count desc



/* HOUSEKEEPING WEEKLY REPORT */

/* Type count */
Select type_name 'Type of Request Received',
count(ticket.ticket_type_id) as count from ticket_type
left join ticket on(ticket_type.id=ticket.ticket_type_id)
where ticket_type_id IN(3,4) AND tick_startDate
BETWEEN DATE_ADD(NOW(), INTERVAL -1 WEEK)
AND NOW() group by ticket_type.id ORDER BY COUNT DESC


/* Item Request */
select tick_request as 'ITEM REQUEST', count(*)
as COUNT from ticket WHERE ticket_type_ID = 3
AND tick_startDate BETWEEN DATE_ADD(NOW(), INTERVAL -1 WEEK)
AND NOW() group by tick_request order by count desc limit 3


/* Assistance Request */
select tick_request as 'ITEM REQUEST', count(*)
as COUNT from ticket WHERE ticket_type_ID = 4
AND tick_startDate BETWEEN DATE_ADD(NOW(), INTERVAL -1 WEEK)
AND NOW() group by tick_request order by count desc limit 3



/* ENGINEERING WEEKLY REPORT */

/* Type count */
Select type_name 'Type of Request Received',
count(ticket.ticket_type_id) as count from ticket_type
join ticket on(ticket_type.id=ticket.ticket_type_id)
where ticket_type_id IN(1, 2) AND tick_startDate
BETWEEN DATE_ADD(NOW(), INTERVAL -1 WEEK)
AND NOW() group by ticket_type.id 


/* Electrical repair request */


/* NON-Electrical Repair Request */
