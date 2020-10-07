SELECT min_duration as 'Duration of the shortest movie'
FROM movies 
WHERE min_duration
ORDER BY min_duration
LIMIT 1;