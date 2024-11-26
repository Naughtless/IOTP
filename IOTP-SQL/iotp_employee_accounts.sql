create table employee_accounts
(
    username   varchar(20)  not null
        primary key,
    password   varchar(255) not null,
    employeeID int(10)      not null,
    constraint employee_accounts_ibfk_1
        foreign key (employeeID) references employees (id)
);

create index employeeID
    on employee_accounts (employeeID);

INSERT INTO iotp.employee_accounts (username, password, employeeID) VALUES ('fredella', '$2y$10$npYzmHn21Y.EYuu9z9x7IOjWUb3JeRn/eyQg0lhQ2xjHb91ZeJFmO', 2);
