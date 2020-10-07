SELECT COUNT(id) AS 'Sum prod_year',
prod_year
FROM movies
WHERE prod_year
GROUP BY prod_year;