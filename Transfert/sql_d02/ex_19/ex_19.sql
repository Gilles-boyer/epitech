LOAD DATA LOCAL INFILE 'jobs.csv'
INTO TABLE jobs
FIELDS TERMINATED BY ';'
LINES TERMINATED BY '\n'
IGNORE 1 LINES
(name, salary, executive);