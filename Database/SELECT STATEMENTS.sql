/* MONTHLY REPORT FOR HOUSEKEEPING*/



/* Type count */





/* Item Request Count */
select tick_request as 'ITEM REQUEST', count(*) as COUNT from ticket 
WHERE ticket_type_ID = 2
group by tick_request 
order by count
desc limit 3




/* Assistance Request Count */