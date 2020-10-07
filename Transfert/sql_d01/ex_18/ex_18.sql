SELECT CONCAT(UCASE(LEFT(lastname, 1)),SUBSTRING(lastname, 2),'-', UCASE(MID(firstname, 1,1)),SUBSTRING(firstname, 2)) 
AS 'Full name'
FROM profiles
ORDER BY birthdate DESC;
