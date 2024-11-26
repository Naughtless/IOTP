create table attendance
(
    count      int auto_increment
        primary key,
    timecode   datetime not null,
    employeeID int(10)  not null,
    constraint attendance_ibfk_1
        foreign key (employeeID) references employees (id)
);

create index employeeID
    on attendance (employeeID);

INSERT INTO iotp.attendance (count, timecode, employeeID) VALUES (8, '2022-06-01 08:15:32.0', 2);
INSERT INTO iotp.attendance (count, timecode, employeeID) VALUES (9, '2022-06-01 08:31:53.0', 3);
INSERT INTO iotp.attendance (count, timecode, employeeID) VALUES (10, '2022-06-01 07:29:32.0', 4);
INSERT INTO iotp.attendance (count, timecode, employeeID) VALUES (11, '2022-06-01 07:19:28.0', 5);
INSERT INTO iotp.attendance (count, timecode, employeeID) VALUES (12, '2022-06-01 10:42:28.0', 6);
INSERT INTO iotp.attendance (count, timecode, employeeID) VALUES (13, '2022-06-01 13:02:31.0', 7);
INSERT INTO iotp.attendance (count, timecode, employeeID) VALUES (14, '2022-06-01 06:29:54.0', 8);
INSERT INTO iotp.attendance (count, timecode, employeeID) VALUES (15, '2022-06-01 08:11:29.0', 9);
INSERT INTO iotp.attendance (count, timecode, employeeID) VALUES (16, '2022-06-01 12:44:54.0', 10);
INSERT INTO iotp.attendance (count, timecode, employeeID) VALUES (17, '2022-06-01 08:21:34.0', 11);
INSERT INTO iotp.attendance (count, timecode, employeeID) VALUES (18, '2022-06-02 08:15:00.0', 2);
INSERT INTO iotp.attendance (count, timecode, employeeID) VALUES (19, '2022-06-02 08:29:00.0', 3);
INSERT INTO iotp.attendance (count, timecode, employeeID) VALUES (20, '2022-06-02 07:29:30.0', 4);
INSERT INTO iotp.attendance (count, timecode, employeeID) VALUES (21, '2022-06-02 07:25:49.0', 5);
INSERT INTO iotp.attendance (count, timecode, employeeID) VALUES (22, '2022-06-02 09:28:00.0', 6);
INSERT INTO iotp.attendance (count, timecode, employeeID) VALUES (23, '2022-06-02 09:10:30.0', 7);
INSERT INTO iotp.attendance (count, timecode, employeeID) VALUES (24, '2022-06-02 07:30:00.0', 8);
INSERT INTO iotp.attendance (count, timecode, employeeID) VALUES (25, '2022-06-02 09:40:00.0', 9);
INSERT INTO iotp.attendance (count, timecode, employeeID) VALUES (26, '2022-06-02 08:00:30.0', 10);
INSERT INTO iotp.attendance (count, timecode, employeeID) VALUES (27, '2022-06-02 07:20:30.0', 11);
INSERT INTO iotp.attendance (count, timecode, employeeID) VALUES (30, '2022-06-25 14:06:30.0', 2);
INSERT INTO iotp.attendance (count, timecode, employeeID) VALUES (31, '2022-06-25 14:07:27.0', 3);
