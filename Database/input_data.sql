insert into attendee values (1, 'Max Gillham', 'student');
insert into attendee values (2, 'Jack Jill', 'student');
insert into attendee values (3, 'Joe Nose', 'student');
insert into attendee values (4, 'Jack Smells', 'student');
insert into attendee values (5, 'Elon Musk', 'sponsor');
insert into attendee values (6, 'Bill Gates', 'sponsor');
insert into attendee values (7, 'Goerge Hotz', 'sponsor');
insert into attendee values (8, 'Lieutenant Dan', 'sponsor');
insert into attendee values (9, 'Orange Grey', 'sponsor');
insert into attendee values (10, 'Geo Hot', 'sponsor');
insert into attendee values(11, 'Special Speaker', 'professional');
insert into attendee values(12, 'Jimmy', 'professional');

insert into hotel_room values (10,1);
insert into hotel_room values (122, 3);
insert into hotel_room values (149, 2);
insert into hotel_room values (411, 3);

insert into room_rel values (1, 10);
insert into room_rel values (2, 122);
insert into room_rel values (3, 122);

insert into company values ('Comma ai', 'Gold', 2);
insert into company values ('Space X', 'Silver', 1);
insert into company values ('Microsoft', 'Platinum', 4);

insert into company_rel values(7, 'Comma ai');
insert into company_rel values(5, 'Space X');
insert into company_rel values(6, 'Microsoft');
insert into company_rel values(8, 'Comma ai');
insert into company_rel values(9, 'Comma ai');
insert into company_rel values(10, 'Comma ai');

insert into job_ad values('Software Devoloper', 'Vancouver BC', 130000, 'Microsoft');
insert into job_ad values('Machine Learning Engineer', 'Toronto ON', 150000, 'Comma ai');
insert into job_ad values('Data Scientist', 'Toronto ON', 100000, 'Space X');

insert into session values('Special Speaker', 1, '11AM', '2PM', 'East Room');
insert into session values('Jimmy', 1, '12PM', '3PM', 'West Room');

insert into session_rel values('Special Speaker', 11);
insert into session_rel values('Jimmy', 12);

insert into organising_committee values('Jenifer');
insert into organising_committee values('Timothy');
insert into organising_committee values('Greg');
insert into organising_committee values('Jeffery');

insert into sub_committee values('Dance Team', 'Greg');
insert into sub_committee values('Power Squad', 'Jenifer');

insert into organiser_rel values('Jenifer', 'Power Squad');
insert into organiser_rel values('Timothy', 'Dance Team');
insert into organiser_rel values('Greg', 'Power Squad');
insert into organiser_rel values('Greg', 'Dance Team');
insert into organiser_rel values('Jeffery', 'Dance Team');
