create table employees
(
    id           int(10) auto_increment
        primary key,
    employeeName varchar(255)                                       null,
    role         int(3)                                             not null,
    status       int(2)       default 1                             null,
    imagePath    varchar(255) default '../../assets/pp/avatar2.png' not null,
    leaveQuota   int(2)       default 3                             not null,
    constraint employees_ibfk_1
        foreign key (role) references roles (id),
    constraint employees_ibfk_2
        foreign key (status) references employee_status (id)
);

create index role
    on employees (role);

create index status
    on employees (status);

INSERT INTO iotp.employees (id, employeeName, role, status, imagePath, leaveQuota) VALUES (1, 'Micilyn H', 1, 1, '../../assets/pp/micin.png', 5);
INSERT INTO iotp.employees (id, employeeName, role, status, imagePath, leaveQuota) VALUES (2, 'Maria Thanos', 8, 2, '../../assets/pp/thanos.png', 4);
INSERT INTO iotp.employees (id, employeeName, role, status, imagePath, leaveQuota) VALUES (3, 'Monosodium G.', 9, 2, '../../assets/pp/monosodium.png', 4);
INSERT INTO iotp.employees (id, employeeName, role, status, imagePath, leaveQuota) VALUES (4, 'Fario Mredelli', 4, 1, '../../assets/pp/fario-mredella.png', 5);
INSERT INTO iotp.employees (id, employeeName, role, status, imagePath, leaveQuota) VALUES (5, 'Shantut H', 10, 1, '../../assets/pp/spy.png', 5);
INSERT INTO iotp.employees (id, employeeName, role, status, imagePath, leaveQuota) VALUES (6, 'Olgierd', 5, 2, '../../assets/pp/olgierd.png', 3);
INSERT INTO iotp.employees (id, employeeName, role, status, imagePath, leaveQuota) VALUES (7, 'Iris von Everec', 11, 2, '../../assets/pp/iris.png', 3);
INSERT INTO iotp.employees (id, employeeName, role, status, imagePath, leaveQuota) VALUES (8, 'Evelyn Parker', 12, 1, '../../assets/pp/generic-female-1.png', 5);
INSERT INTO iotp.employees (id, employeeName, role, status, imagePath, leaveQuota) VALUES (9, 'Jackie Welles', 14, 1, '../../assets/pp/welles.png', 5);
INSERT INTO iotp.employees (id, employeeName, role, status, imagePath, leaveQuota) VALUES (10, 'Raghuram P.', 18, 1, '../../assets/pp/ray.png', 5);
INSERT INTO iotp.employees (id, employeeName, role, status, imagePath, leaveQuota) VALUES (11, 'Nakaru C.', 19, 1, '../../assets/pp/generic-male-5.png', 5);
