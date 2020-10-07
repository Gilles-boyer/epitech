SELECT COUNT(title) as "Number of movies that starts with eX"
FROM movies
WHERE title 
LIKE binary 'eX%';
