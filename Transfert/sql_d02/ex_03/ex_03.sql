SELECT floor as 'Floor number',
SUM(seats) as 'Total number of seats',
COUNT(room_number) as 'Total number of room'
FROM rooms
GROUP BY floor
ORDER BY SUM(seats);