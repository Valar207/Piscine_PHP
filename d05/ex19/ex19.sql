SELECT ABS(DATEDIFF(MIN(member_history.date), MAX(member_history.date))) AS `uptime`
FROM `member_history`;