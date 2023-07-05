SELECT database_name, rbd
FROM (
  SELECT 'C376930_appoderado_543' AS database_name, rbd
  FROM C376930_appoderado_543.usuario
  UNION ALL
  SELECT 'C376930_appoderado_526' AS database_name, rbd
  FROM C376930_appoderado_526.usuario
  UNION ALL
  SELECT 'C376930_appoderado_535' AS database_name, rbd
  FROM C376930_appoderado_535.usuario
) AS subquery
WHERE rut = '143477029';