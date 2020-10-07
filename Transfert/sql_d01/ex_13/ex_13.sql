SELECT room_number AS "Room numbers" , name AS "Room names"
FROM  rooms
WHERE seats > 0 AND floor in (0,2,3,4,5);