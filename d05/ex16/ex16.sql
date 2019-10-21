SELECT COUNT(*) AS films
FROM member
WHERE (member.date_last_film BETWEEN '2006-10-30' AND '2007-07-27')
OR (MONTH(member.date_last_film) = 12 AND DAY(member.date_last_film) = 24);