create table roles
(
    id         int(3) auto_increment
        primary key,
    roleName   varchar(255) not null,
    department int(3)       null,
    constraint roles_ibfk_1
        foreign key (department) references departments (id)
);

create index department
    on roles (department);

INSERT INTO iotp.roles (id, roleName, department) VALUES (1, 'Super Admin', null);
INSERT INTO iotp.roles (id, roleName, department) VALUES (2, 'CEO', 1);
INSERT INTO iotp.roles (id, roleName, department) VALUES (3, 'COO', 1);
INSERT INTO iotp.roles (id, roleName, department) VALUES (4, 'CBO', 2);
INSERT INTO iotp.roles (id, roleName, department) VALUES (5, 'CHRO', 3);
INSERT INTO iotp.roles (id, roleName, department) VALUES (6, 'CMO', 4);
INSERT INTO iotp.roles (id, roleName, department) VALUES (7, 'CRO', 5);
INSERT INTO iotp.roles (id, roleName, department) VALUES (8, 'Operations Manager', 1);
INSERT INTO iotp.roles (id, roleName, department) VALUES (9, 'Operations Staff', 1);
INSERT INTO iotp.roles (id, roleName, department) VALUES (10, 'Business Analyst', 2);
INSERT INTO iotp.roles (id, roleName, department) VALUES (11, 'HR Manager', 3);
INSERT INTO iotp.roles (id, roleName, department) VALUES (12, 'Marketing Manager', 4);
INSERT INTO iotp.roles (id, roleName, department) VALUES (13, 'Telemarketer', 4);
INSERT INTO iotp.roles (id, roleName, department) VALUES (14, 'Salesperson', 4);
INSERT INTO iotp.roles (id, roleName, department) VALUES (15, 'UI/UX Designer', 5);
INSERT INTO iotp.roles (id, roleName, department) VALUES (16, 'Frontend Programmer', 5);
INSERT INTO iotp.roles (id, roleName, department) VALUES (17, 'Backend Programmer', 5);
INSERT INTO iotp.roles (id, roleName, department) VALUES (18, 'Head of Software', 5);
INSERT INTO iotp.roles (id, roleName, department) VALUES (19, 'Head of Website', 5);
