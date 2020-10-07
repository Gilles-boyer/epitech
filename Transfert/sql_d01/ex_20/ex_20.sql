SELECT COUNT(title) AS 'Number of movies', prod_year as 'Year of production'
FROM movies
WHERE prod_year
GROUP BY prod_year DESC;