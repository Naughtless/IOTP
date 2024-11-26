create table requests
(
    id          int(10) auto_increment
        primary key,
    employee    int(10)                       not null,
    date        date        default curdate() not null,
    requestType varchar(50)                   not null,
    duration    int         default 0         not null,
    reason      text                          null,
    status      varchar(50) default 'Pending' not null,
    constraint requests_ibfk_1
        foreign key (employee) references employees (id)
);

create index employee
    on requests (employee);

INSERT INTO iotp.requests (id, employee, date, requestType, duration, reason, status) VALUES (1, 2, '2022-06-22', 'Leave', 48, 'I am sick! I need a sick leave!', 'Declined');
INSERT INTO iotp.requests (id, employee, date, requestType, duration, reason, status) VALUES (2, 3, '2022-06-22', 'Late', 1, 'Predicted heavy traffic. I will probably be late tomorrow.', 'Accepted');
INSERT INTO iotp.requests (id, employee, date, requestType, duration, reason, status) VALUES (3, 4, '2022-06-22', 'Leave', 72, 'I was sick man. Nuff said', 'Accepted');
INSERT INTO iotp.requests (id, employee, date, requestType, duration, reason, status) VALUES (4, 5, '2022-06-22', 'Leave', 96, 'I dont feel like working man, lemme go!', 'Declined');
INSERT INTO iotp.requests (id, employee, date, requestType, duration, reason, status) VALUES (5, 6, '2022-06-22', 'Late', 1, 'Heavy traffic man, you know', 'Cancelled');
INSERT INTO iotp.requests (id, employee, date, requestType, duration, reason, status) VALUES (6, 2, '2022-06-26', 'Leave', 96, 'Maternity leave!', 'Accepted');
INSERT INTO iotp.requests (id, employee, date, requestType, duration, reason, status) VALUES (7, 6, '2022-06-26', 'Leave', 240, 'Honeymoon!', 'Accepted');
INSERT INTO iotp.requests (id, employee, date, requestType, duration, reason, status) VALUES (8, 7, '2022-06-26', 'Leave', 240, 'Honeymoon!', 'Accepted');
INSERT INTO iotp.requests (id, employee, date, requestType, duration, reason, status) VALUES (9, 9, '2022-06-26', 'Leave', 24, 'I just feel like it! Got a problem?!', 'Pending');
INSERT INTO iotp.requests (id, employee, date, requestType, duration, reason, status) VALUES (10, 2, '2022-06-26', 'Late', 3, 'Chronic back pain!', 'Pending');
INSERT INTO iotp.requests (id, employee, date, requestType, duration, reason, status) VALUES (11, 5, '2022-06-26', 'Late', 1, 'Sorry, washing my armpit hair took longer than expected...', 'Pending');
