/* MONTHLY REPORT FOR HOUSEKEEPING*/



/* Type count */





/* Item Request Count */
select tick_request as 'ITEM REQUEST', count(*) as COUNT from ticket 
WHERE ticket_type_ID = 3 AND 
tick_startDate BETWEEN DATE_ADD(NOW(), INTERVAL -1 MONTH) AND NOW() 
group by tick_request order by count desc limit 3




/* Assistance Request Count */