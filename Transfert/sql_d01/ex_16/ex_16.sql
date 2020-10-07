SELECT MONTHNAME(birthdate)
AS 'month of birth'
FROM profiles p
LEFT JOIN member m
ON p.id = m.profile_id
WHERE m.id  between 42 and 84;