SELECT LEFT(summary,92) AS 'Summaries'
FROM movies
WHERE MOD(id,2)=1 AND id BETWEEN 42 AND 84;

