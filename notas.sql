// notas acumulativas faltantes diferenciado
INSERT INTO nota_controles (id_alumno, id_evaluacion, nota, id_evaluacion_acumulativa) (SELECT a.id_alumno, e.id_evaluacion, '-' nota, ec.id 
FROM evaluacion e
JOIN evaluacion_acumulativa ec ON ec.id_evaluacion = e.id_evaluacion
JOIN grupo_diferenciado a ON e.id_curso = a.id_curso  AND a.id_asignatura = e.id_asignatura
JOIN alumnos alus ON a.id_alumno = alus.id_alumno
JOIN asignaturas asig ON asig.id_asignatura = e.id_asignatura
LEFT JOIN nota_controles nc ON e.id_evaluacion = nc.id_evaluacion AND a.id_alumno = nc.id_alumno
WHERE e.sumativa = 1 AND asig.diferenciado = 1 AND nc.id_alumno IS NULL AND alus.estado = 1);

// notas acumulativas comun
INSERT INTO nota_controles (id_alumno, id_evaluacion, nota, id_evaluacion_acumulativa) (SELECT a.id_alumno, e.id_evaluacion, '-' nota, ec.id 
FROM evaluacion e
JOIN evaluacion_acumulativa ec ON ec.id_evaluacion = e.id_evaluacion
JOIN alumnos a ON a.id_curso = e.id_curso
JOIN asignaturas asig ON asig.id_asignatura = e.id_asignatura
LEFT JOIN nota_controles nc ON e.id_evaluacion = nc.id_evaluacion AND a.id_alumno = nc.id_alumno
WHERE e.sumativa = 1 AND nc.id_alumno IS NULL AND a.estado = 1);