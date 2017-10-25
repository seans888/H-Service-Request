/* MONTHLY REPORT FOR HOUSEKEEPING*/



/* Type count */





/* Item Request Count */
select tick_request as 'ITEM REQUEST', count(*) as COUNTS from ticket 
WHERE ticket_type_ID = 3 
group by tick_request 
order by counts 
desc limit 3




/* Assistance Request Count */