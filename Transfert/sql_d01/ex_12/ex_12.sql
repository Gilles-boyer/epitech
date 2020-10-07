SELECT count(title) as 'Number of "western" movies'
FROM movies p
LEFT JOIN genres j
ON p.genre_id = j.id
RIGHT JOIN producers a
ON p.producer_id = a.id
WHERE j.name = "western" 
AND a.name = "tartan movies" 
OR a.name = "lionsgate uk";
