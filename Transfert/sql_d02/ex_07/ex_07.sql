SELECT title AS 'Movie title'
FROM movies
WHERE title REGEXP '^[O-T]'
ORDER BY title
;

