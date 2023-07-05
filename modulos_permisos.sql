insert into public.modulos (id, nombre, icono)
values  (1, 'Casos', 'fas fa-address-book'),
        (2, 'Recursos', 'fas fa-file-download'),
        (3, 'Panel', 'fas fas fa-poll'),
        (4, 'Ev. IDPS', 'fas fa-clipboard-check'),
        (5, 'Ev. Socioemocional', 'fas fa-clipboard-check'),
        (6, 'Encuestas Libres', 'fas fa-clipboard-check'),
        (7, 'Acciones', 'fas fa-star'),
        (8, 'Entrevistas', 'fas fa-comments'),
        (9, 'Nómina Estudiantes', 'fas fa-users'),
        (10, 'Nómina Funcionarios', 'fas fa-users'),
        (11, 'Accidentes Escolares', 'fas fa-ambulance'),
        (12, 'Planificaciones', 'fas fa-book');

insert into public.roles (id, nombre, color, descripcion)
values  (1, 'ROLE_USER', 'bg-turquesa', 'Encargado(a) del Sistema'),
        (2, 'ROLE_INSPECTOR', 'bg-verde', 'Inspector(a)'),
        (3, 'ROLE_PROFESOR', 'bg-mejoremos', 'Profesor(a)'),
        (4, 'ROLE_FUNCIONARIO', 'bg-lima', 'Funcionario(a)');

insert into public.modulos_roles (modulos_id, roles_id)
values  (1, 3),
        (1, 1),
        (2, 1),
        (3, 1),
        (4, 1),
        (5, 1),
        (6, 1),
        (7, 1),
        (8, 1),
        (9, 1),
        (10, 1),
        (8, 2),
        (11, 2),
        (2, 3),
        (12, 1);
