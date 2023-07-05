<?php
function libro_matricula($db, $id){
    $datos_curso = qsql($db, "SELECT n.nombre as nivel, g.nombre as grado, l.nombre as letra FROM cursos c, nivel n, grado g, letra l WHERE c.nivel=n.id_nivel and c.grado=g.id_grado and c.letra=l.id_letra AND id_curso = '{$id}'");

    $whereCurso = '';
    if($id != 0){
        $whereCurso = ' AND c.id_curso = '.$id;
    }

    $vive_con = array(
        '1' => 'Padre',
        '2' => 'Madre',
        '3' => 'Abuelo/a',
        '4' => 'Hermano/a',
        '5' => 'Padre/Madre',
        '6' => 'Tio/a',
    );
    $posee = array(
        '1' => 'Seguro escolar privado',
        '2' => 'Notebook',
        '3' => 'Celular',
        '4' => 'Alimentación Junaeb',
        '5' => 'Permiso atraso',
        '6' => 'Internet en el hogar',
        '7' => 'Computador tablet',
    );

    $sige = array(
        '1' => 'JUNAEB',
        '2' => 'CHILE SOLIDARIO',
        '3' => 'INDIGENA',
        '4' => 'REPITENTE',
        '5' => 'VULNERABLE',
        '7' => 'EMBARAZADA',
        '23' => 'PADRE/MADRE',
        '11' => 'SEGURIDAD Y OPORTUNIDAD',
        '8' => 'REGISTRO SOCIAL DE HOGARES',
        '12' => 'BARE',
        '13' => 'PRESIDENTE DE LA REP.',
        '14' => 'SUB/ÉTICO F',
        '15' => 'PRORETENCIÓN',
        '22' => 'P.PUENTE',
        '20' => 'COOPELAN',
        '21' => 'FORESTAL MININCO',
    );

    $beneficios = array(
        '1' => 'UNIFORME',
        '2' => 'DENTAL',
        '3' => 'ZAPATOS',
        '4' => 'U.JUNAEB',
        '5' => 'UTILES',
        '6' => 'DERIV.MEDICA',
        '7' => 'MOVILIZACION',
    );

    $problemass = array(
        '1' => 'P.VISUALES',
        '2' => 'P.AUDITIVOS',
        '3' => 'P.CARDIACOS',
        '4' => 'P.COLUMNA',
        '5' => 'P.DENTAL',
    );

    $estudios = array(
        '1'     => 'Educacion Basica',
        '2'     => 'Educacion Media',
        '3'     => 'Sin Estudios',
        '4'     => 'Sin Informacion',
        '5'     => 'Tecnico',
        '6'     => 'Tecnico Profesional',
        '7'     => 'Univ. no tradicional hasta 4 a&ntilde;os',
        '8'     => 'Univ. no tradicional mas de 4 a&ntilde;os',
        '9'     => 'Univ. tradicional hasta 4 a&ntilde;os',
        '10'    => 'Univ. tradicional mas de 4 a&ntilde;os',
        '11'    => 'Educacion Basica incompleta',
        '12'    => 'Educacion Media incompleta',
        '13'    => 'Educacion tecnica incompleta',
        '14'    => 'Educacion Univ. incompleta',
    );

    $estado_civil= array(
        '1' => 'Soltero(a)',
        '2' => 'Casado(a)',
        '3' => 'Viudo(a)',
        '4' => 'Divorciado(a)',
        '5' => 'Separado(a)',
        '6' => 'Conviviente',
    );

    $objPHPExcel = new PHPExcel();
    // Establecer propiedades
    $objPHPExcel->getProperties()
    ->setCreator("Appoderado")
    ->setLastModifiedBy("Cattivo")
    ->setTitle("Documento Excel Produccion")
    ->setSubject("Documento Excel Produccion")
    ->setDescription("Libro matricula")
    ->setKeywords("Excel Office 2007 openxml php")
    ->setCategory("Lista Excel");

    $objPHPExcel->getActiveSheet()
        ->getStyle('A1:ZZ150')
        ->getAlignment()
        ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);

    $sheet = $objPHPExcel->getActiveSheet();
    $sheet->getColumnDimension('A')->setAutoSize(true);//N• Matricula
    $sheet->getColumnDimension('B')->setWidth(10);//Run
    $sheet->getColumnDimension('C')->setAutoSize(true);//Apellidos
    $sheet->getColumnDimension('D')->setAutoSize(true);//Nombres
    $sheet->getColumnDimension('E')->setAutoSize(true);//Genero
    $sheet->getColumnDimension('F')->setAutoSize(true);//F. Nacimiento
    $sheet->getColumnDimension('G')->setAutoSize(true);//Curso
    $sheet->getColumnDimension('H')->setAutoSize(true);//F. Matricula
    $sheet->getColumnDimension('I')->setAutoSize(true);//Direccion
    $sheet->getColumnDimension('J')->setAutoSize(true);//Region
    $sheet->getColumnDimension('K')->setAutoSize(true);//Ciudad
    $sheet->getColumnDimension('L')->setAutoSize(true);//Nacionalidad
    $sheet->getColumnDimension('M')->setAutoSize(true);//Etnia
    $sheet->getColumnDimension('N')->setAutoSize(true);//Vive Con
    $sheet->getColumnDimension('O')->setAutoSize(true);//Nº Hermanos
    $sheet->getColumnDimension('P')->setAutoSize(true);//Es Hijo Funcionario
    $sheet->getColumnDimension('Q')->setAutoSize(true);//Bautizado
    $sheet->getColumnDimension('R')->setAutoSize(true);//Religion
    $sheet->getColumnDimension('S')->setAutoSize(true);//Hermanos en Establecimiento
    $sheet->getColumnDimension('T')->setWidth(30);//Nombre contacto emergencia
    $sheet->getColumnDimension('U')->setWidth(30);//Telefono contacto emergencia
    $sheet->getColumnDimension('V')->setWidth(30);//Datos interes
    $sheet->getColumnDimension('W')->setWidth(30);//Posee
    $sheet->getColumnDimension('X')->setWidth(30);//Sige
    $sheet->getColumnDimension('Y')->setAutoSize(true);//Prioritario
    $sheet->getColumnDimension('Z')->setAutoSize(true);//Preferente
    $sheet->getColumnDimension('AA')->setWidth(10);//PIE
    $sheet->getColumnDimension('AB')->setAutoSize(true);//Anio ingreso PIE
    $sheet->getColumnDimension('AC')->setWidth(30);//Beneficios
    $sheet->getColumnDimension('AD')->setAutoSize(true);//Vacunado covid-19
    $sheet->getColumnDimension('AE')->setAutoSize(true);//Contagiado covid-19
    $sheet->getColumnDimension('AF')->setAutoSize(true);//Vacunado Influenza
    $sheet->getColumnDimension('AG')->setWidth(30);//Problemas
    $sheet->getColumnDimension('AH')->setAutoSize(true);//Sistema de salud
    $sheet->getColumnDimension('AI')->setAutoSize(true);//Carga Sistema de salud
    $sheet->getColumnDimension('AJ')->setAutoSize(true);//Estatura Alumno
    $sheet->getColumnDimension('AK')->setAutoSize(true);//Talla Alumno
    $sheet->getColumnDimension('AL')->setAutoSize(true);//Peso Alumno
    $sheet->getColumnDimension('AM')->setAutoSize(true);//Perimitro Cintura Alumno
    $sheet->getColumnDimension('AN')->setAutoSize(true);//Medicamentos Alumno
    $sheet->getColumnDimension('AO')->setAutoSize(true);//Contraindicaciones medicas Alumno
    $sheet->getColumnDimension('AP')->setAutoSize(true);//Alumno Alergico a
    $sheet->getColumnDimension('AQ')->setAutoSize(true);//Enfermedad Cronica Alumno
    $sheet->getColumnDimension('AR')->setAutoSize(true);//Grupo Sanguineo Alumno
    $sheet->getColumnDimension('AS')->setAutoSize(true);//Consultorio o clinica Alumno
    $sheet->getColumnDimension('AT')->setAutoSize(true);//Observaciones Antecedentes Medicos Alumno
    $sheet->getColumnDimension('AU')->setAutoSize(true);//El alumno almuerza
    $sheet->getColumnDimension('AV')->setAutoSize(true);//Necesita almuerzo
    $sheet->getColumnDimension('AW')->setAutoSize(true);//Ha pertenecido al PIE
    $sheet->getColumnDimension('AX')->setAutoSize(true);//Tipo de N.E.E.
    $sheet->getColumnDimension('AY')->setAutoSize(true);//Posee F.P.S
    $sheet->getColumnDimension('AZ')->setAutoSize(true);//Programa 4 a 7
    $sheet->getColumnDimension('BA')->setAutoSize(true);//Recibe S.U.F
    $sheet->getColumnDimension('BB')->setAutoSize(true);//Diagnostico PIE
    $sheet->getColumnDimension('BC')->setAutoSize(true);//RUT Apoderado
    $sheet->getColumnDimension('BD')->setAutoSize(true);//Nombres Apoderado
    $sheet->getColumnDimension('BE')->setAutoSize(true);//Apellidos Apoderado
    $sheet->getColumnDimension('BF')->setAutoSize(true);//Dirección Apoderado
    $sheet->getColumnDimension('BG')->setAutoSize(true);//Fecha de nacimiento Apoderado
    $sheet->getColumnDimension('BH')->setAutoSize(true);//Nacionalidad Apoderado
    $sheet->getColumnDimension('BI')->setAutoSize(true);//Celular Apoderado
    $sheet->getColumnDimension('BJ')->setAutoSize(true);//Estudios Apoderado
    $sheet->getColumnDimension('BK')->setAutoSize(true);//Profesión Apoderado
    $sheet->getColumnDimension('BL')->setAutoSize(true);//email Apoderado
    $sheet->getColumnDimension('BM')->setAutoSize(true);//Jefa de hogar Apoderado
    $sheet->getColumnDimension('BN')->setAutoSize(true);//Responsabilidad Apoderado
    $sheet->getColumnDimension('BO')->setAutoSize(true);//Sexo Apoderado
    $sheet->getColumnDimension('BP')->setAutoSize(true);//Estado civil Apoderado
    $sheet->getColumnDimension('BQ')->setAutoSize(true);//Religión Apoderado
    $sheet->getColumnDimension('BR')->setAutoSize(true);//Parentesco Apoderado
    $sheet->getColumnDimension('BS')->setAutoSize(true);//Afiliación a sistema de salud Apoderado
    $sheet->getColumnDimension('BT')->setAutoSize(true);//Enfermedad Crónica Apoderado
    $sheet->getColumnDimension('BU')->setAutoSize(true);//RUT Apoderado Suplente
    $sheet->getColumnDimension('BV')->setAutoSize(true);//Nombres Apoderado Suplente
    $sheet->getColumnDimension('BW')->setAutoSize(true);//Apellidos Apoderado Suplente
    $sheet->getColumnDimension('BX')->setAutoSize(true);//Dirección Apoderado Suplente
    $sheet->getColumnDimension('BY')->setAutoSize(true);//Fecha de nacimiento Apoderado Suplente
    $sheet->getColumnDimension('BZ')->setAutoSize(true);//Nacionalidad Apoderado Suplente
    $sheet->getColumnDimension('CA')->setAutoSize(true);//Celular Apoderado Suplente
    $sheet->getColumnDimension('CB')->setAutoSize(true);//Estudios Apoderado Suplente
    $sheet->getColumnDimension('CC')->setAutoSize(true);//Profesión Apoderado Suplente
    $sheet->getColumnDimension('CD')->setAutoSize(true);//email Apoderado Suplente
    $sheet->getColumnDimension('CE')->setAutoSize(true);//Jefa de hogar Apoderado Suplente
    $sheet->getColumnDimension('CF')->setAutoSize(true);//Responsabilidad Apoderado Suplente
    $sheet->getColumnDimension('CG')->setAutoSize(true);//Sexo Apoderado Suplente
    $sheet->getColumnDimension('CH')->setAutoSize(true);//Estado civil Apoderado Suplente
    $sheet->getColumnDimension('CI')->setAutoSize(true);//Religión Apoderado Suplente
    $sheet->getColumnDimension('CJ')->setAutoSize(true);//Parentesco Apoderado Suplente
    $sheet->getColumnDimension('CK')->setAutoSize(true);//Afiliación a sistema de salud Apoderado Suplente
    $sheet->getColumnDimension('CL')->setAutoSize(true);//Enfermedad Crónica Apoderado Suplente
    $sheet->getColumnDimension('CM')->setAutoSize(true);//RUT Madre
    $sheet->getColumnDimension('CN')->setAutoSize(true);//Nombres Madre
    $sheet->getColumnDimension('CO')->setAutoSize(true);//Apellidos Madre
    $sheet->getColumnDimension('CP')->setAutoSize(true);//Dirección Madre
    $sheet->getColumnDimension('CQ')->setAutoSize(true);//Fecha de nacimiento Madre
    $sheet->getColumnDimension('CR')->setAutoSize(true);//Nacionalidad Madre
    $sheet->getColumnDimension('CS')->setAutoSize(true);//Celular Madre
    $sheet->getColumnDimension('CT')->setAutoSize(true);//Estudios Madre
    $sheet->getColumnDimension('CU')->setAutoSize(true);//Profesión Madre
    $sheet->getColumnDimension('CV')->setAutoSize(true);//email Madre
    $sheet->getColumnDimension('CW')->setAutoSize(true);//Jefa de hogar Madre
    $sheet->getColumnDimension('CX')->setAutoSize(true);//Responsabilidad Madre
    $sheet->getColumnDimension('CY')->setAutoSize(true);//Sexo Madre
    $sheet->getColumnDimension('CZ')->setAutoSize(true);//Estado civil Madre
    $sheet->getColumnDimension('DA')->setAutoSize(true);//Religión Madre
    $sheet->getColumnDimension('DB')->setAutoSize(true);//Parentesco Madre
    $sheet->getColumnDimension('DC')->setAutoSize(true);//Afiliación a sistema de salud Madre
    $sheet->getColumnDimension('DD')->setAutoSize(true);//Enfermedad Crónica Madre
    $sheet->getColumnDimension('DE')->setAutoSize(true);//Lugar de trabajo Madre
    $sheet->getColumnDimension('DF')->setAutoSize(true);//Fono trabajo Madre
    $sheet->getColumnDimension('DG')->setAutoSize(true);//RUT Padre
    $sheet->getColumnDimension('DH')->setAutoSize(true);//Nombres Padre
    $sheet->getColumnDimension('DI')->setAutoSize(true);//Apellidos Padre
    $sheet->getColumnDimension('DJ')->setAutoSize(true);//Dirección Padre
    $sheet->getColumnDimension('DK')->setAutoSize(true);//Fecha de nacimiento Padre
    $sheet->getColumnDimension('DL')->setAutoSize(true);//Nacionalidad Padre
    $sheet->getColumnDimension('DM')->setAutoSize(true);//Celular Padre
    $sheet->getColumnDimension('DN')->setAutoSize(true);//Estudios Padre
    $sheet->getColumnDimension('DO')->setAutoSize(true);//Profesión Padre
    $sheet->getColumnDimension('DP')->setAutoSize(true);//email Padre
    $sheet->getColumnDimension('DQ')->setAutoSize(true);//Jefa de hogar Padre
    $sheet->getColumnDimension('DR')->setAutoSize(true);//Responsabilidad Padre
    $sheet->getColumnDimension('DS')->setAutoSize(true);//Sexo Padre
    $sheet->getColumnDimension('DT')->setAutoSize(true);//Estado civil Padre
    $sheet->getColumnDimension('DU')->setAutoSize(true);//Religión Padre
    $sheet->getColumnDimension('DV')->setAutoSize(true);//Parentesco Padre
    $sheet->getColumnDimension('DW')->setAutoSize(true);//Afiliación a sistema de salud Padre
    $sheet->getColumnDimension('DX')->setAutoSize(true);//Enfermedad Crónica Padre
    $sheet->getColumnDimension('DY')->setAutoSize(true);//Lugar de trabajo Padre
    $sheet->getColumnDimension('DZ')->setAutoSize(true);//Fono trabajo Padre


    $sheet->getStyle("A1:DZ1")->getFont()->setBold(true);
    $sheet->getStyle("A1:DZ1")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
    $sheet->getStyle("A1:DZ1")->getFill()->getStartColor()->setARGB('2387d0');
    $sheet->getStyle("A1:DZ1")->getAlignment()->applyFromArray(array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,));
    $sheet->getStyle("A1:DZ1")->getFont()->setBold(true)->setName('Verdana')->setSize(10)->getColor()->setRGB('ffffff');
    $sheet->getStyle("A1:DZ1")->getFont()->setSize(8);

    $rol_asistencia = qsql($db, "SELECT valor as habilitado FROM configuraciones WHERE clave = 'porcentaje_asistencia'");

    $headers = array(
        'N° Matrícula',
        'RUN',
        'Apellidos',
        'Nombres',
        'Género',
        'Fecha Nacimiento',
        'Curso',
        'Fecha Matrícula',
        'Dirección',
        'Region',
        'Ciudad',
        'Nacionalidad',
        'Etnia/Pueblo originario',
        'Vive Con',
        'Nº Hermanos',
        'Es Hijo Funcionario',
        'Bautizado',
        'Religión',
        'Hermanos En Establecimiento',
        'Nombre Contacto Emergencia',
        'Telefono Contacto Emergencia',
        'Datos de interés',
        'Posee',
        'Sige',
        'Prioritario',
        'Preferente',
        'PIE',
        'Añio Ingreso PIE',
        'Beneficios',
        'Vacunado COVID-19',
        'Contagiado COVID-19',
        'Vacunado Influenza',
        'Problemas Fisicos',
        'Sistema de salud Alumno',
        'Carga sistema de salud',
        'Estatura Alumno',
        'Talla Alumno',
        'Peso Alumno',
        'Perimitro Cintura Alumno',
        'Medicamentos Alumno',
        'Contraindicaciones medicas Alumno',
        'Alumno Alergico a ',
        'Enfermedad Cronica Alumno',
        'Grupo Sanguineo Alumno',
        'Consultorio o clinica Alumno',
        'Observaciones Antecedentes Medicos Alumno',
        'El alumno almuerza',
        'Necesita almuerzo',
        'Ha pertenecido al PIE',
        'Tipo de N.E.E.',
        'Posee F.P.S',
        'Programa 4 a 7',
        'Recibe S.U.F',
        'Diagnostico PIE',
        'RUT Apoderado',
        'Nombres Apoderado',
        'Apellidos Apoderado',
        'Dirección Apoderado',
        'Fecha de nacimiento Apoderado',
        'Nacionalidad Apoderado',
        'Celular Apoderado',
        'Estudios Apoderado',
        'Profesión Apoderado',
        'email Apoderado',
        'Jefa de hogar Apoderado',
        'Responsabilidad Apoderado',
        'Sexo Apoderado',
        'Estado civil Apoderado',
        'Religión Apoderado',
        'Parentesco Apoderado',
        'Afiliación a sistema de salud Apoderado',
        'Enfermedad Crónica Apoderado',
        'RUT Apoderado Suplente',
        'Nombres Apoderado Suplente',
        'Apellidos Apoderado Suplente',
        'Dirección Apoderado Suplente',
        'Fecha de nacimiento Apoderado Suplente',
        'Nacionalidad Apoderado Suplente',
        'Celular Apoderado Suplente',
        'Estudios Apoderado Suplente',
        'Profesión Apoderado Suplente',
        'email Apoderado Suplente',
        'Jefa de hogar Apoderado Suplente',
        'Responsabilidad Apoderado Suplente',
        'Sexo Apoderado Suplente',
        'Estado civil Apoderado Suplente',
        'Religión Apoderado Suplente',
        'Parentesco Apoderado Suplente',
        'Afiliación a sistema de salud Apoderado Suplente',
        'Enfermedad Crónica Apoderado Suplente',
        'RUT Madre',
        'Nombres Madre',
        'Apellidos Madre',
        'Dirección Madre',
        'Fecha de nacimiento Madre',
        'Nacionalidad Madre',
        'Celular Madre',
        'Estudios Madre',
        'Profesión Madre',
        'email Madre',
        'Jefa de hogar Madre',
        'Responsabilidad Madre',
        'Sexo Madre',
        'Estado civil Madre',
        'Religión Madre',
        'Parentesco Madre',
        'Afiliación a sistema de salud Madre',
        'Enfermedad Crónica Madre',
        'Lugar de trabajo Madre',
        'Fono trabajo Madre',
        'RUT Padre',
        'Nombres Padre',
        'Apellidos Padre',
        'Dirección Padre',
        'Fecha de nacimiento Padre',
        'Nacionalidad Padre',
        'Celular Padre',
        'Estudios Padre',
        'Profesión Padre',
        'email Padre',
        'Jefa de hogar Padre',
        'Responsabilidad Padre',
        'Sexo Padre',
        'Estado civil Padre',
        'Religión Padre',
        'Parentesco Padre',
        'Afiliación a sistema de salud Padre',
        'Enfermedad Crónica Padre',
        'Lugar de trabajo Padre',
        'Fono trabajo Padre',
    );


    if($_SESSION["RBD"] == 4162){
        $headers[20] = 'Local Escolar';
    }


    if($_SESSION["RBD"] == 4353){
        $headers[] = 'Religion';
    }
    foreach($headers as $i => $h){
        $letter = columnLetter($i +1);
        $sheet->setCellValue($letter.'1', $h);
    }

    $fecha_ini = "2018-01-01";
    $cont=2;
    $current_tipo_ensenanza = 0;
    $columnIndex = 1;

    $orderBy = "app_tipo_ensenanza.id_tipo_ensenanza, n.id_nivel, g.id_grado, l.id_letra, ABS(matricula)";

    if($_SESSION["RBD"] == 12694){
        $orderBy = "app_tipo_ensenanza.id_tipo_ensenanza, ABS(a.matricula), n.id_nivel, g.id_grado, l.id_letra";
    }
    
    if($_SESSION["RBD"] == 4162){
        $orderBy = "app_tipo_ensenanza.id_tipo_ensenanza, ABS(a.matricula)";
        $palazuelo = 'AND c.nivel != 1';
    }
    else if($_SESSION["RBD"] == 12602 || $_SESSION["RBD"] == 17687){
        $orderBy = "app_tipo_ensenanza.id_tipo_ensenanza, ABS(a.matricula)";
        $palazuelo = '';
    }
    else {
        $palazuelo = '';
    }


    $paises = qsql($db, "SELECT id, nombre FROM paises");
    $nacionalidades[0] = 'Chile';
    foreach ($paises as $pais){
        $nacionalidades[$pais->id] = charsetInvers($pais->nombre);
    }
    $query = "SELECT IF(a.estado=0,'Retirado','') situacion,
                        dm.*,
                        dp.*,
                        IF(dp.lugar_de_trabajo IS NULL,'',dp.lugar_de_trabajo) lugar_de_tabajo_padre,
                        dte.*,
                        am.*,
                        af.*,
                        do.*,
                        da.*,
                        afa.*,
                        afe.*,
                        afm.*,
                        afpp.*,
                        a.c_repetidos,
                        a.religion,
                        a.vive_con, a.cont_emergencia, a.tel_emergencia, a.datos_interes, a.matricula, a.asistencia, a.asistencia_total, f.id_datos_apoderado, IF(a.fecha_retiro=0,'',a.fecha_retiro) fecha_retiro, a.observacion_retiro observacion_retiro, a.fecha_matricula, IF(a.etnia IN(0,9),'No', et.nombre) etnia, f.id_datos_sige, IF(f.id_datos_sige_prioritario=6,'SI','NO') prioritario, IF(f.id_datos_sige_prioritario=9,'SI','NO') preferente, a.nacionalidad, IF(a.fecha_matricula='0000-00-00','Antiguo',IF(DATEDIFF(a.fecha_matricula,'{$fecha_ini}') > 0,'Nuevo','Antiguo')) nuevo, a.religion, a.telefono, a.ciudad, a.domicilio, IF(a.sexo=1,'F','M') sexo, a.fecha_nacimiento, a.nombre nombre_alumno, a.apellidos apellido_alumno,a.id_curso, a.colegio_procedencia,
                        a.num_hermanos, a.bautizado, a.hermano_colegio, a.hijo_funcionario, a.posee, 
                        f.year_ingreso_pie, f.id_datos_beneficios,
                        IF(am.id_afp=0,'',af.nombre_afp) nombre_afp,
                        IF(da.id_afp_apoderado=0,'',afa.nombre_afp) nombre_afp_apoderado,
                        IF(dte.id_afp_tut_eco=0,'',afe.nombre_afp) nombre_afp_tut_eco,
                        IF(dm.id_afp_madre=0,'',afm.nombre_afp) nombre_afp_madre,
                        IF(dp.id_afp_padre=0,'',afpp.nombre_afp) nombre_afp_padre,
                        a.rut ,n.nombre as nivel, g.nombre as grado, l.nombre as letra, app_tipo_ensenanza.codigo as cod_ensenanza,app_tipo_ensenanza.nombre as tipo_ensenanza, app_tipo_ensenanza.id_tipo_ensenanza ".($_SESSION["RBD"] == 4162 ? ',c.local': '')." 
                        FROM cursos c, nivel n, grado g, letra l, alumnos a
                        LEFT JOIN ensenanza ON ensenanza.id_curso = a.id_curso
                        LEFT JOIN app_tipo_ensenanza ON app_tipo_ensenanza.id_tipo_ensenanza = ensenanza.id_tipo_ensenanza
                        LEFT JOIN ficha_alumno f ON a.id_alumno = f.id_alumno
                        LEFT JOIN datos_madre dm ON f.id_datos_madre = dm.id_datos_madre
                        LEFT JOIN datos_padre dp ON f.id_datos_padre = dp.id_datos_padre
                        LEFT JOIN datos_tut_eco dte ON f.id_datos_tut_eco = dte.id_datos_tut_eco
                        LEFT JOIN antecedentes_medicos am ON a.id_alumno = am.id_alumno
                        LEFT JOIN etnia et ON et.id = a.etnia
                        LEFT JOIN afp af ON am.id_afp = af.id_afp
                        LEFT JOIN datos_otros do ON f.id_datos_otros = do.id_datos_otros
                        LEFT JOIN datos_apoderado da ON f.id_datos_apoderado = da.id_datos_apoderado
                        LEFT JOIN afp afa ON da.id_afp_apoderado = afa.id_afp
                        LEFT JOIN afp afe ON dte.id_afp_tut_eco = afe.id_afp
                        LEFT JOIN afp afm ON dm.id_afp_madre = afm.id_afp
                        LEFT JOIN afp afpp ON dp.id_afp_padre = afpp.id_afp
                        WHERE a.id_curso=c.id_curso AND c.nivel=n.id_nivel AND c.grado=g.id_grado AND c.letra=l.id_letra $palazuelo $whereCurso ORDER BY $orderBy";


    $qAlumnos = qsql($db, $query);
    //var_dump($qAlumnos[0]);die;
    foreach ($qAlumnos as $key => $value) {

        $cantidad_asistencia = $value->asistencia_total;
        if($rol_asistencia[0]->habilitado == 1){
            $porcentaje_asistencia = porcentajeAsistencia($db, $cantidad_asistencia, 6, $value->id_curso, $value->fecha_matricula);
            $dias_trabajados = $porcentaje_asistencia['dias_trabajados'];
            $porcentaje_asistencia = $porcentaje_asistencia['porcentaje_asistencia'];
        }else{
            $porcentaje_asistencia = $value->asistencia;
        }
        if($porcentaje_asistencia == ''){
            $porcentaje_asistencia = 0;
        }
        $junaeb = in_array("1", array_unique(explode(',', $value->id_datos_sige)))? "Si" : "NO";
        $ch_solidario = in_array("2", array_unique(explode(',', $value->id_datos_sige)))? "Si" : "NO";
        $indigena = in_array("3", array_unique(explode(',', $value->id_datos_sige)))? "Si" : "NO";
        $p_republica = in_array("13", array_unique(explode(',', $value->id_datos_sige)))? "Si" : "NO";
        $pie = in_array("10", array_unique(explode(',', $value->id_datos_sige)))? "Si" : "NO";
        $v_covid = in_array("8", array_unique(explode(',', $value->problemas)))? "Si" : "NO";
        $c_covid = in_array("7", array_unique(explode(',', $value->problemas)))? "Si" : "NO";
        $v_influenza = in_array("6", array_unique(explode(',', $value->problemas)))? "Si" : "NO";

        $alumno_posee       = transformData($posee, $value->posee);
        $alumno_sige        = transformData($sige, $value->id_datos_sige);
        $alumno_beneficios  = transformData($beneficios, $value->id_datos_beneficios);
        $alumno_problemas   = transformData($problemass, $value->problemas);

        $sheet->getStyle("A".$cont.":DZ".$cont)->getFont()->setSize(8);
        $sheet->getStyle('N'.$cont)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);
        $sheet->getStyle('AF'.$cont)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);
        $sheet->getStyle('AG'.$cont)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);
        $sheet->setCellValue('A'.$cont, $value->matricula);
        $sheet->getStyle('A'.$cont)->getAlignment()->applyFromArray(array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_RIGHT));
        $sheet->setCellValue('B'.$cont, $value->rut);
        $sheet->setCellValue('C'.$cont, strtoupper(charsetInvers($value->apellido_alumno)));
        $sheet->setCellValue('D'.$cont, strtoupper(charsetInvers($value->nombre_alumno)));
        $sheet->setCellValue('E'.$cont, $value->sexo);
        $sheet->setCellValue('F'.$cont, date("d-m-Y", strtotime($value->fecha_nacimiento)) );
        $sheet->setCellValue('G'.$cont, $value->grado.' '.$value->letra.' '.$value->nivel);
        $sheet->setCellValue('H'.$cont, date("d-m-Y", strtotime($value->fecha_matricula)) );
        $sheet->setCellValue('I'.$cont, strtoupper(charsetInvers($value->domicilio)));
        $sheet->setCellValue('J'.$cont, strtoupper(charsetInvers($value->region_alumno)));
        $sheet->setCellValue('K'.$cont, strtoupper(charsetInvers($value->ciudad)));
        $sheet->setCellValue('L'.$cont, strtoupper(charsetInvers($nacionalidades[$value->nacionalidad])));
        $sheet->setCellValue('M'.$cont, strtoupper(utf8_encode($value->etnia)));
        $sheet->setCellValue('N'.$cont, strtoupper($value->vive_con == 0 ? '': $vive_con[$value->vive_con]));
        $sheet->setCellValue('O'.$cont, $value->num_hermanos);
        $sheet->setCellValue('P'.$cont, strtoupper($value->hijo_funcionario == '0' ? '': $value->hijo_funcionario));
        $sheet->setCellValue('Q'.$cont, strtoupper($value->bautizado == '0' ? '': $value->bautizado));
        $sheet->setCellValue('R'.$cont, strtoupper(charsetInvers($value->religion == null ? '': $value->religion)));
        $sheet->setCellValue('S'.$cont, strtoupper($value->hermano_colegio == '0' ? '': $value->hermano_colegio));
        $sheet->setCellValue('T'.$cont, strtoupper(charsetInvers($value->cont_emergencia == null ? '': $value->cont_emergencia)));
        $sheet->setCellValue('U'.$cont, strtoupper($value->tel_emergencia == null ? '': $value->tel_emergencia));
        $sheet->setCellValue('V'.$cont, strtoupper(charsetInvers($value->datos_interes == null ? '': $value->datos_interes)));
        $sheet->setCellValue('W'.$cont, strtoupper(charsetInvers($alumno_posee)));
        $sheet->setCellValue('X'.$cont, strtoupper(charsetInvers($alumno_sige)));
        $sheet->setCellValue('Y'.$cont, $value->prioritario);
        $sheet->setCellValue('Z'.$cont, $value->preferente);
        $sheet->setCellValue('AA'.$cont, $pie);
        $sheet->setCellValue('AB'.$cont, $value->year_ingreso_pie);
        $sheet->setCellValue('AC'.$cont, strtoupper(charsetInvers($alumno_beneficios)));
        $sheet->setCellValue('AD'.$cont, $v_covid);
        $sheet->setCellValue('AE'.$cont, $c_covid);
        $sheet->setCellValue('AF'.$cont, $v_influenza);
        $sheet->setCellValue('AG'.$cont, strtoupper(charsetInvers($alumno_problemas)));
        $sheet->setCellValue('AH'.$cont, strtoupper(charsetInvers($value->nombre_afp)));
        $sheet->setCellValue('AI'.$cont, strtoupper(charsetInvers($value->id_carga_salud == 0 ? '' : ($value->id_carga_salud == 1 ? 'Apoderado' : 'Apoderado Suplente'))));
        $sheet->setCellValue('AJ'.$cont, $value->estatura == null ? '': $value->estatura.' cm');
        $sheet->setCellValue('AK'.$cont, $value->talla);
        $sheet->setCellValue('AL'.$cont, $value->peso == null ? '': $value->peso.' Kg');
        $sheet->setCellValue('AM'.$cont, $value->p_cintura == null ? '': $value->p_cintura.' cm');
        $sheet->setCellValue('AN'.$cont, strtoupper(charsetInvers($value->medicamentos)));
        $sheet->setCellValue('AO'.$cont, strtoupper(charsetInvers($value->c_medicas)));
        $sheet->setCellValue('AP'.$cont, strtoupper(charsetInvers($value->alergias)));
        $sheet->setCellValue('AQ'.$cont, strtoupper(charsetInvers($value->e_cronica)));
        $sheet->setCellValue('AR'.$cont, strtoupper(charsetInvers($value->gs_rh)));
        $sheet->setCellValue('AS'.$cont, strtoupper(charsetInvers($value->consultorio_clinica)));
        $sheet->setCellValue('AT'.$cont, strtoupper(charsetInvers($value->observaciones)));
        $sheet->setCellValue('AU'.$cont, strtoupper(charsetInvers($value->almuerza == 0 ? '' : ($value->almuerza == 1 ? 'SI' : 'NO'))));
        $sheet->setCellValue('AV'.$cont, strtoupper(charsetInvers($value->necesita_almuerzo == 0 ? '' : ($value->necesita_almuerzo == 1 ? 'SI' : 'NO'))));
        $sheet->setCellValue('AW'.$cont, strtoupper(charsetInvers($value->pie == 0 ? '' : ($value->pie == 1 ? 'SI' : 'NO'))));
        $sheet->setCellValue('AX'.$cont, strtoupper(charsetInvers($value->pie_tipo == 0 ? '' : ($value->pie_tipo == 1 ? 'Permanente' : 'Transitorio'))));
        $sheet->setCellValue('AY'.$cont, strtoupper(charsetInvers($value->fps == 0 ? '' : ($value->fps == 1 ? 'SI' : 'NO'))));
        $sheet->setCellValue('AZ'.$cont, strtoupper(charsetInvers($value->programa4_7 == 0 ? '' : ($value->programa4_7 == 1 ? 'SI' : 'NO'))));
        $sheet->setCellValue('BA'.$cont, strtoupper(charsetInvers($value->suf == 0 ? '' : ($value->suf == 1 ? 'SI' : 'NO'))));
        $sheet->setCellValue('BB'.$cont, strtoupper(charsetInvers($value->diagnostico_pie)));
        $sheet->setCellValue('BC'.$cont, strtoupper(charsetInvers($value->rut_appoderado)));//RUT Apoderado
        $sheet->setCellValue('BD'.$cont, strtoupper(charsetInvers($value->nombre_apoderado)));//Nombres Apoderado
        $sheet->setCellValue('BE'.$cont, strtoupper(charsetInvers($value->apellidos_apoderado)));//Apellidos Apoderado
        $sheet->setCellValue('BF'.$cont, strtoupper(charsetInvers($value->direccion_apoderado)));//Dirección Apoderado
        $sheet->setCellValue('BG'.$cont, date("d-m-Y", strtotime($value->fecha_nacimiento_apoderado)));//Fecha de nacimiento Apoderado
        $sheet->setCellValue('BH'.$cont, strtoupper(charsetInvers($nacionalidades[$value->nacionalidad_apoderado])));//Nacionalidad Apoderado
        $sheet->setCellValue('BI'.$cont, strtoupper(charsetInvers($value->telefono_apoderado)));//Celular Apoderado
        $sheet->setCellValue('BJ'.$cont, strtoupper(charsetInvers($estudios[$value->estudios_apoderado])));//Estudios Apoderado
        $sheet->setCellValue('BK'.$cont, strtoupper(charsetInvers($value->profesion_apoderado)));//Profesión Apoderado
        $sheet->setCellValue('BL'.$cont, strtoupper(charsetInvers($value->email_apoderado)));//email Apoderado
        $sheet->setCellValue('BM'.$cont, strtoupper(charsetInvers($value->jefe_hogar_apoderado == 0 ? '' : ($value->jefe_hogar_apoderado == 1 ? 'SI' : 'NO'))));//Jefa de hogar Apoderado
        $sheet->setCellValue('BN'.$cont, strtoupper(charsetInvers($value->responsabilidad_apoderado == 0 ? '' : ($value->responsabilidad_apoderado == 1 ? 'Titular' : 'Suplente'))));//Responsabilidad Apoderado
        $sheet->setCellValue('BO'.$cont, strtoupper(charsetInvers($value->sexo_apoderado == 0 ? '' : ($value->sexo_apoderado == 1 ? 'Femenino' : 'Masculino'))));//Sexo Apoderado
        $sheet->setCellValue('BP'.$cont, strtoupper(charsetInvers($estado_civil[$value->estado_civil_apoderado])));//Estado civil Apoderado
        $sheet->setCellValue('BQ'.$cont, strtoupper(charsetInvers($value->religion_apoderado)));//Religión Apoderado
        $sheet->setCellValue('BR'.$cont, strtoupper(charsetInvers($value->parentesco_apoderado)));//Parentesco Apoderado
        $sheet->setCellValue('BS'.$cont, strtoupper(charsetInvers($value->nombre_afp_apoderado)));//Afiliación a sistema de salud Apoderado
        $sheet->setCellValue('BT'.$cont, strtoupper(charsetInvers($value->e_cronica_apoderado)));//Enfermedad Crónica Apoderado
        $sheet->setCellValue('BU'.$cont, strtoupper(charsetInvers($value->rut_tut_eco)));//RUT Apoderado Suplente
        $sheet->setCellValue('BV'.$cont, strtoupper(charsetInvers($value->nombre_tut_eco)));//Nombres Apoderado Suplente
        $sheet->setCellValue('BW'.$cont, strtoupper(charsetInvers($value->apellidos_tut_eco)));//Apellidos Apoderado Suplente
        $sheet->setCellValue('BX'.$cont, strtoupper(charsetInvers($value->direccion_tut_eco)));//Dirección Apoderado Suplente
        $sheet->setCellValue('BY'.$cont, date("d-m-Y", strtotime($value->fecha_nacimiento_tut_eco)));//Fecha de nacimiento Apoderado Suplente
        $sheet->setCellValue('BZ'.$cont, strtoupper(charsetInvers($nacionalidades[$value->nacionalidad_tut_eco])));//Nacionalidad Apoderado Suplente
        $sheet->setCellValue('CA'.$cont, strtoupper(charsetInvers($value->telefono_tut_eco)));//Celular Apoderado Suplente
        $sheet->setCellValue('CB'.$cont, strtoupper(charsetInvers($estudios[$value->estudios_tut_eco])));//Estudios Apoderado Suplente
        $sheet->setCellValue('CC'.$cont, strtoupper(charsetInvers($value->profesion_tut_eco)));//Profesión Apoderado Suplente
        $sheet->setCellValue('CD'.$cont, strtoupper(charsetInvers($value->email_tut_eco)));//email Apoderado Suplente
        $sheet->setCellValue('CE'.$cont, strtoupper(charsetInvers($value->jefe_hogar_tut_eco == 0 ? '' : ($value->jefe_hogar_tut_eco == 1 ? 'SI' : 'NO'))));//Jefa de hogar Apoderado Suplente
        $sheet->setCellValue('CF'.$cont, strtoupper(charsetInvers($value->responsabilidad_tut_eco == 0 ? '' : ($value->responsabilidad_tut_eco == 1 ? 'Titular' : 'Suplente'))));//Responsabilidad Apoderado Suplente
        $sheet->setCellValue('CG'.$cont, strtoupper(charsetInvers($value->sexo_tut_eco == 0 ? '' : ($value->sexo_tut_eco == 1 ? 'Femenino' : 'Masculino'))));//Sexo Apoderado Suplente
        $sheet->setCellValue('CH'.$cont, strtoupper(charsetInvers($estado_civil[$value->estado_civil_tut_eco])));//Estado civil Apoderado Suplente
        $sheet->setCellValue('CI'.$cont, strtoupper(charsetInvers($value->religion_tut_eco)));//Religión Apoderado Suplente
        $sheet->setCellValue('CJ'.$cont, strtoupper(charsetInvers($value->parentesco_tut_eco)));//Parentesco Apoderado Suplente
        $sheet->setCellValue('CK'.$cont, strtoupper(charsetInvers($value->nombre_afp_tut_eco)));//Afiliación a sistema de salud Apoderado Suplente
        $sheet->setCellValue('CL'.$cont, strtoupper(charsetInvers($value->e_cronica_tut_eco)));//Enfermedad Crónica Apoderado Suplente
        $sheet->setCellValue('CM'.$cont, strtoupper(charsetInvers($value->rut_madre)));//RUT Madre
        $sheet->setCellValue('CN'.$cont, strtoupper(charsetInvers($value->nombre_madre)));//Nombres Madre
        $sheet->setCellValue('CO'.$cont, strtoupper(charsetInvers($value->apellidos_madre)));//Apellidos Madre
        $sheet->setCellValue('CP'.$cont, strtoupper(charsetInvers($value->direccion_madre)));//Dirección Madre
        $sheet->setCellValue('CQ'.$cont, date("d-m-Y", strtotime($value->fecha_nacimiento_madre)));//Fecha de nacimiento Madre
        $sheet->setCellValue('CR'.$cont, strtoupper(charsetInvers($nacionalidades[$value->nacionalidad_madre])));//Nacionalidad Madre
        $sheet->setCellValue('CS'.$cont, strtoupper(charsetInvers($value->telefono_madre)));//Celular Madre
        $sheet->setCellValue('CT'.$cont, strtoupper(charsetInvers($estudios[$value->estudios_madre])));//Estudios Madre
        $sheet->setCellValue('CU'.$cont, strtoupper(charsetInvers($value->profesion_madre)));//Profesión Madre
        $sheet->setCellValue('CV'.$cont, strtoupper(charsetInvers($value->email_madre)));//email Madre
        $sheet->setCellValue('CW'.$cont, strtoupper(charsetInvers($value->jefe_hogar_madre == 0 ? '' : ($value->jefe_hogar_madre == 1 ? 'SI' : 'NO'))));//Jefa de hogar Madre
        $sheet->setCellValue('CX'.$cont, strtoupper(charsetInvers($value->responsabilidad_madre == 0 ? '' : ($value->responsabilidad_madre == 1 ? 'Titular' : 'Suplente'))));//Responsabilidad Madre
        $sheet->setCellValue('CY'.$cont, strtoupper(charsetInvers($value->sexo_madre == 0 ? '' : ($value->sexo_madre == 1 ? 'Femenino' : 'Masculino'))));//Sexo Madre
        $sheet->setCellValue('CZ'.$cont, strtoupper(charsetInvers($estado_civil[$value->estado_civil_madre])));//Estado civil Madre
        $sheet->setCellValue('DA'.$cont, strtoupper(charsetInvers($value->religion_madre)));//Religión Madre
        $sheet->setCellValue('DB'.$cont, strtoupper(charsetInvers($value->parentesco_madre)));//Parentesco Madre
        $sheet->setCellValue('DC'.$cont, strtoupper(charsetInvers($value->nombre_afp_madre)));//Afiliación a sistema de salud Madre
        $sheet->setCellValue('DD'.$cont, strtoupper(charsetInvers($value->e_cronica_madre)));//Enfermedad Crónica Madre
        $sheet->setCellValue('DE'.$cont, strtoupper(charsetInvers($value->lugar_de_trabajo)));//Enfermedad Crónica Madre
        $sheet->setCellValue('DF'.$cont, strtoupper(charsetInvers($value->tel_laboral_madre)));//Enfermedad Crónica Madre
        $sheet->setCellValue('DG'.$cont, strtoupper(charsetInvers($value->rut_padre)));//RUT Padre
        $sheet->setCellValue('DH'.$cont, strtoupper(charsetInvers($value->nombre_padre)));//Nombres Padre
        $sheet->setCellValue('DI'.$cont, strtoupper(charsetInvers($value->apellidos_padre)));//Apellidos Padre
        $sheet->setCellValue('DJ'.$cont, strtoupper(charsetInvers($value->direccion_padre)));//Dirección Padre
        $sheet->setCellValue('DK'.$cont, date("d-m-Y", strtotime($value->fecha_nacimiento_padre)));//Fecha de nacimiento Padre
        $sheet->setCellValue('DL'.$cont, strtoupper(charsetInvers($nacionalidades[$value->nacionalidad_padre])));//Nacionalidad Padre
        $sheet->setCellValue('DM'.$cont, strtoupper(charsetInvers($value->telefono_padre)));//Celular Madre
        $sheet->setCellValue('DN'.$cont, strtoupper(charsetInvers($estudios[$value->estudios_padre])));//Estudios Padre
        $sheet->setCellValue('DO'.$cont, strtoupper(charsetInvers($value->profesion_padre)));//Profesión Padre
        $sheet->setCellValue('DP'.$cont, strtoupper(charsetInvers($value->email_padre)));//email Padre
        $sheet->setCellValue('DQ'.$cont, strtoupper(charsetInvers($value->jefe_hogar_padre == 0 ? '' : ($value->jefe_hogar_padre == 1 ? 'SI' : 'NO'))));//Jefa de hogar Padre
        $sheet->setCellValue('DR'.$cont, strtoupper(charsetInvers($value->responsabilidad_padre == 0 ? '' : ($value->responsabilidad_padre == 1 ? 'Titular' : 'Suplente'))));//Responsabilidad Padre
        $sheet->setCellValue('DS'.$cont, strtoupper(charsetInvers($value->sexo_padre == 0 ? '' : ($value->sexo_padre == 1 ? 'Femenino' : 'Masculino'))));//Sexo Padre
        $sheet->setCellValue('DT'.$cont, strtoupper(charsetInvers($estado_civil[$value->estado_civil_padre])));//Estado civil Padre
        $sheet->setCellValue('DU'.$cont, strtoupper(charsetInvers($value->religion_padre)));//Religión Padre
        $sheet->setCellValue('DV'.$cont, strtoupper(charsetInvers($value->parentesco_padre)));//Parentesco Padre
        $sheet->setCellValue('DW'.$cont, strtoupper(charsetInvers($value->nombre_afp_padre)));//Afiliación a sistema de salud Padre
        $sheet->setCellValue('DX'.$cont, strtoupper(charsetInvers($value->e_cronica_padre)));//Enfermedad Crónica Padre
        $sheet->setCellValue('DY'.$cont, strtoupper(charsetInvers($value->lugar_de_tabajo_padre)));//Enfermedad Crónica Padre
        $sheet->setCellValue('DZ'.$cont, strtoupper(charsetInvers($value->tel_laboral_padre)));//Enfermedad Crónica Padre

        $cont++;

    }

    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
//    header('Content-Disposition: attachment;filename="Libro_Matricula_TEST.xlsx"');
    header('Content-Disposition: attachment;filename="Libro_Matricula_'.$datos_curso[0]->grado.$datos_curso[0]->letra."_".$datos_curso[0]->nivel.'.xlsx"');
    header('Cache-Control: max-age=0');
    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
    $objWriter->save('php://output');
    exit;
}

function transformData($array_data, $data)
{
    $array = explode(',',$data);
    $data_alumno = '';
    foreach ($array as $arr) {
        if(isset($array_data[$arr])) {
            $data_alumno .= ' '.$array_data[$arr];
        }
    }
    return $data_alumno;
}