SELECT rrar.id, rrar.fecha, rrab.anio
FROM libro_pie.RpeRegApoyoRegistro rrar
INNER JOIN libro_pie.RpeRegApoyo rra ON rrar.rpeRegApoyo_id = rra.id
INNER JOIN libro_pie.RpeRegApoyoBase rrab ON rra.rpeRegApoyoBase_id = rrab.id



SELECT rrar.id, CONCAT(LEFT(rrar.fecha, LENGTH(rrar.fecha) - 4), rrab.anio) as fecha_nueva, rrab.anio
FROM libro_pie.RpeRegApoyoRegistro rrar
INNER JOIN libro_pie.RpeRegApoyo rra ON rrar.rpeRegApoyo_id = rra.id
INNER JOIN libro_pie.RpeRegApoyoBase rrab ON rra.rpeRegApoyoBase_id = rrab.id WHERE rrar.fecha LIKE '__/__/____' AND rrar.fecha2 IS NULL;

SELECT rrar.id, CONCAT(CONCAT(rrar.fecha, "/"), rrab.anio) as fecha_nueva, rrab.anio
FROM libro_pie.RpeRegApoyoRegistro rrar
INNER JOIN libro_pie.RpeRegApoyo rra ON rrar.rpeRegApoyo_id = rra.id
INNER JOIN libro_pie.RpeRegApoyoBase rrab ON rra.rpeRegApoyoBase_id = rrab.id WHERE rrar.fecha LIKE '__/__' AND rrar.fecha2 IS NULL;

SELECT rrar.id, CONCAT(LEFT(rrar.fecha, LENGTH(rrar.fecha) - 2), rrab.anio) as fecha_nueva, rrab.anio
FROM libro_pie.RpeRegApoyoRegistro rrar
INNER JOIN libro_pie.RpeRegApoyo rra ON rrar.rpeRegApoyo_id = rra.id
INNER JOIN libro_pie.RpeRegApoyoBase rrab ON rra.rpeRegApoyoBase_id = rrab.id WHERE rrar.fecha LIKE '__/__/__' AND rrar.fecha2 IS NULL;

SELECT rrar.id, CONCAT(LEFT(rrar.fecha, LENGTH(rrar.fecha) - 4), rrab.anio) as fecha_nueva, rrab.anio
FROM libro_pie.RpeRegApoyoRegistro rrar
INNER JOIN libro_pie.RpeRegApoyo rra ON rrar.rpeRegApoyo_id = rra.id
INNER JOIN libro_pie.RpeRegApoyoBase rrab ON rra.rpeRegApoyoBase_id = rrab.id WHERE rrar.fecha LIKE '__-__-____' AND rrar.fecha2 IS NULL;

SELECT rrar.id, CONCAT(CONCAT(rrar.fecha, "-"), rrab.anio) as fecha_nueva, rrab.anio
FROM libro_pie.RpeRegApoyoRegistro rrar
INNER JOIN libro_pie.RpeRegApoyo rra ON rrar.rpeRegApoyo_id = rra.id
INNER JOIN libro_pie.RpeRegApoyoBase rrab ON rra.rpeRegApoyoBase_id = rrab.id WHERE rrar.fecha LIKE '__-__' AND rrar.fecha2 IS NULL;