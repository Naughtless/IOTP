create table departments
(
    id             int(3)       not null
        primary key,
    departmentName varchar(255) not null,
    workStart      time         null,
    workEnd        time         null
);

INSERT INTO iotp.departments (id, departmentName, workStart, workEnd) VALUES (1, 'Operations', '08:30:00', '17:00:00');
INSERT INTO iotp.departments (id, departmentName, workStart, workEnd) VALUES (2, 'Business', '07:30:00', '17:00:00');
INSERT INTO iotp.departments (id, departmentName, workStart, workEnd) VALUES (3, 'Human Resource', '09:30:00', '17:00:00');
INSERT INTO iotp.departments (id, departmentName, workStart, workEnd) VALUES (4, 'Marketing & Sales', '06:30:00', '19:00:00');
INSERT INTO iotp.departments (id, departmentName, workStart, workEnd) VALUES (5, 'Research & Development', '09:00:00', '20:00:00');
