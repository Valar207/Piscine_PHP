SELECT REVERSE(SUBSTR(distrib.phone_number, 2)) AS enohpelet
FROM distrib
WHERE distrib.phone_number LIKE '05%';