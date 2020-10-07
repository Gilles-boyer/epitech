SELECT title
FROM movies p
LEFT JOIN genres j
ON p.genre_id = j.id
WHERE j.name = "action" OR j.name = "romance";
