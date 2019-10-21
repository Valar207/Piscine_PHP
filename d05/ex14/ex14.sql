SELECT cinema.floor_number as 'floor', SUM(cinema.nb_seats) as 'seats'
FROM cinema
GROUP BY floor
ORDER BY seats DESC;