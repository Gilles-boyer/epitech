SELECT COUNT(id) AS 'Number of members',
ROUND(AVG (TIMESTAMPDIFF(YEAR,birthdate,CURDATE())),-0) AS 'Average age'
FROM profiles;
       