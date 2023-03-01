
-- Obtenemos todas las bases de datos
SELECT BD, valor  FROM C376930_appoderado.conexion;

-- Recorrmos todas las bases de datos y consultamos si existe usuario en latabla usuarios
SELECT 1111 rbd, EXISTS (Select rut from C376930_appoderado_1111.usuarios WHERE rut = '163175460') as existe UNION
SELECT 5266 rbd, EXISTS (Select rut from C376930_appoderado_5266.usuarios WHERE rut = '163175460') as existe UNION
SELECT 1370 rbd, EXISTS (Select rut from C376930_appoderado_1370.usuarios WHERE rut = '163175460') as existe UNION
SELECT 1377 rbd, EXISTS (Select rut from C376930_appoderado_1377.usuarios WHERE rut = '163175460') as existe UNION
SELECT 6780 rbd, EXISTS (Select rut from C376930_appoderado_6780.usuarios WHERE rut = '163175460') as existe UNION
SELECT 6767 rbd, EXISTS (Select rut from C376930_appoderado_6767.usuarios WHERE rut = '163175460') as existe

-- Recorrmos todas las bases de datos y actualizamos campo id_rol, añadiendo todos los roles al usuario
UPDATE C376930_appoderado_1111.usuarios SET id_rol='1,2,3,5,6,9,11,12,14,15,16,17,19,20,21,22,23,24,25,26,27,28,29,30' WHERE rut= '185180263';
UPDATE C376930_appoderado_5266.usuarios SET id_rol='1,2,3,5,6,9,11,12,14,15,16,17,19,20,21,22,23,24,25,26,27,28,29,30' WHERE rut= '185180263';
UPDATE C376930_appoderado_1370.usuarios SET id_rol='1,2,3,5,6,9,11,12,14,15,16,17,19,20,21,22,23,24,25,26,27,28,29,30' WHERE rut= '185180263';
UPDATE C376930_appoderado_1377.usuarios SET id_rol='1,2,3,5,6,9,11,12,14,15,16,17,19,20,21,22,23,24,25,26,27,28,29,30' WHERE rut= '185180263';
UPDATE C376930_appoderado_6780.usuarios SET id_rol='1,2,3,5,6,9,11,12,14,15,16,17,19,20,21,22,23,24,25,26,27,28,29,30' WHERE rut= '185180263';
UPDATE C376930_appoderado_6767.usuarios SET id_rol='1,2,3,5,6,9,11,12,14,15,16,17,19,20,21,22,23,24,25,26,27,28,29,30' WHERE rut= '185180263';

-- Recorrmos todas las bases de datos e insertamos el usuario con datos correspondientes y todos los roles necesarios
INSERT INTO C376930_appoderado_6753.usuarios (nombre, apellidos, sexo, rut, mail, telefono, usuario, password, id_rol, cargo, planta, contrata, honorario, sep, pie, fecha_nacimiento, pass_laravel, change_pass, fecha_nac, conected, sup_admin, num_reg) VALUES('felipe ignacio', 'carrasco lecerf', 2, '185180263', 'felipe.carrasco@cloud.uautonoma.cl', '956609385', '185180263', 'hanamichi10', '1,2,3,5,6,9,11,12,14,15,16,17,19,20,21,22,23,24,25,26,27,28,29,30', '', 0, 0, 0, 0, 0, '1994-03-15', '$2y$11$CJnhxTFhg5tNZ6BBp71F1emXfbbZaKICkSVV96J.5ZrG5OW.zwy6O', 1, '0000-00-00', 1, 0, '');
INSERT INTO C376930_appoderado_20153.usuarios (nombre, apellidos, sexo, rut, mail, telefono, usuario, password, id_rol, cargo, planta, contrata, honorario, sep, pie, fecha_nacimiento, pass_laravel, change_pass, fecha_nac, conected, ultima_lectura, sup_admin, num_reg) VALUES('felipe ignacio', 'carrasco lecerf', 2, '185180263', 'felipe.carrasco@cloud.uautonoma.cl', '956609385', '185180263', 'hanamichi10', '1,2,3,5,6,9,11,12,14,15,16,17,19,20,21,22,23,24,25,26,27,28,29,30', '', 0, 0, 0, 0, 0, '1994-03-15', '$2y$11$CJnhxTFhg5tNZ6BBp71F1emXfbbZaKICkSVV96J.5ZrG5OW.zwy6O', 1, '0000-00-00', 1, '2023-01-09 19:57:50', 0, '');
INSERT INTO C376930_appoderado_1693.usuarios (nombre, apellidos, sexo, rut, mail, telefono, usuario, password, id_rol, cargo, planta, contrata, honorario, sep, pie, fecha_nacimiento, pass_laravel, change_pass, fecha_nac, conected, ultima_lectura, sup_admin, num_reg) VALUES('felipe ignacio', 'carrasco lecerf', 2, '185180263', 'felipe.carrasco@cloud.uautonoma.cl', '956609385', '185180263', 'hanamichi10', '1,2,3,5,6,9,11,12,14,15,16,17,19,20,21,22,23,24,25,26,27,28,29,30', '', 0, 0, 0, 0, 0, '1994-03-15', '$2y$11$CJnhxTFhg5tNZ6BBp71F1emXfbbZaKICkSVV96J.5ZrG5OW.zwy6O', 1, '0000-00-00', 1, '2023-01-09 19:57:50', 0, '');
INSERT INTO C376930_appoderado_4191.usuarios (nombre, apellidos, sexo, rut, mail, telefono, usuario, password, id_rol, cargo, planta, contrata, honorario, sep, pie, fecha_nacimiento, pass_laravel, change_pass, fecha_nac, conected, ultima_lectura, sup_admin, num_reg) VALUES('felipe ignacio', 'carrasco lecerf', 2, '185180263', 'felipe.carrasco@cloud.uautonoma.cl', '956609385', '185180263', 'hanamichi10', '1,2,3,5,6,9,11,12,14,15,16,17,19,20,21,22,23,24,25,26,27,28,29,30', '', 0, 0, 0, 0, 0, '1994-03-15', '$2y$11$CJnhxTFhg5tNZ6BBp71F1emXfbbZaKICkSVV96J.5ZrG5OW.zwy6O', 1, '0000-00-00', 1, '2023-01-09 19:57:50', 0, '');
INSERT INTO C376930_appoderado_4171.usuarios (nombre, apellidos, sexo, rut, mail, telefono, usuario, password, id_rol, cargo, planta, contrata, honorario, sep, pie, fecha_nacimiento, pass_laravel, change_pass, fecha_nac, conected, ultima_lectura, sup_admin, num_reg) VALUES('felipe ignacio', 'carrasco lecerf', 2, '185180263', 'felipe.carrasco@cloud.uautonoma.cl', '956609385', '185180263', 'hanamichi10', '1,2,3,5,6,9,11,12,14,15,16,17,19,20,21,22,23,24,25,26,27,28,29,30', '', 0, 0, 0, 0, 0, '1994-03-15', '$2y$11$CJnhxTFhg5tNZ6BBp71F1emXfbbZaKICkSVV96J.5ZrG5OW.zwy6O', 1, '0000-00-00', 1, '2023-01-09 19:57:50', 0, '');

-- Los datos mostrados son solo de ejemplos, agregar datos segun corresponda.