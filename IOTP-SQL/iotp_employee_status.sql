create table employee_status
(
    id          int(2)      not null
        primary key,
    description varchar(50) null
);

INSERT INTO iotp.employee_status (id, description) VALUES (1, 'Active');
INSERT INTO iotp.employee_status (id, description) VALUES (2, 'On Leave');
INSERT INTO iotp.employee_status (id, description) VALUES (3, 'Suspended');
