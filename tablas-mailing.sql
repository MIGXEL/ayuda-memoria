CREATE TABLE `mailings` (
  `id_mailing` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`id_mailing`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `mailing_usuario` (
  `id_mailing_usuario` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_usuario` bigint(20) NOT NULL,
  `id_mailing` bigint(20) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_mailing_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
