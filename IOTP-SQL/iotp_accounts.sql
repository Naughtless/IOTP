create table accounts
(
    username   varchar(20)  not null
        primary key,
    password   varchar(255) not null,
    employeeID int(10)      not null,
    constraint accounts_ibfk_1
        foreign key (employeeID) references employees (id)
);

create index employeeID
    on accounts (employeeID);

INSERT INTO iotp.accounts (username, password, employeeID) VALUES ('admin', '$2y$10$4YccDZT86QspAtRoig3EEuwqMN8ngxHjMvVuuTMIJlcm27Rm9wqsm', 1);
