SELECT COUNT(subscription.id_sub) AS `nb_abo`, ROUND(AVG(subscription.price), -1) AS `moy_abo`,
(SUM(subscription.duration_sub) % 42) AS `ft`
FROM `subscription`;