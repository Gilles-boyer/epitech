SELECT title as 'Title of the longest movie'
FROM movies
ORDER BY min_duration desc
LIMIT 1;