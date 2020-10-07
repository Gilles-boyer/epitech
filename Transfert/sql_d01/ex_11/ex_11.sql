SELECT count(title) as 'Number of movies ending with "tion"'
FROM movies
WHERE lower(title)
LIKE '%tion';

