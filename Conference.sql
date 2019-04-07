
create table if not exists attendee
  (attendee_ID    numeric(3,0) not null,
   name           varchar(20),
   type           varchar(15),
   primary key(attendee_ID)
  );

create table if not exists hotel_room
  (room_number numeric(4, 0),
   number_of_beds numeric(1, 0),
   primary key(room_number)
  );

create table if not exists company
  (company_name varchar(25) not null,
   sponsorship_rank varchar(15),
   emails_sent numeric(2, 0),
   primary key(company_name)
  );

create table if not exists job_ad
  (job_title varchar(50) not null,
   location varchar(50),
   salary numeric(8, 0),
   ad_company varchar(25) not null,
   primary key(job_title),
   foreign key(ad_company) references company(company_name)
  );

create table if not exists session
  (speaker_name varchar(25) not null,
   day numeric(1, 0),
   start_time varchar(5),
   end_time varchar(5),
   room_location varchar(12),
   primary key(speaker_name)
  );

create table if not exists organising_committee
  (member_name varchar(25) not null,
   primary key(member_name)
  );

create table if not exists sub_committee
  (sub_committee_name varchar(25) not null,
   chair_member varchar(25),
   primary key(sub_committee_name)
  );

create table if not exists room_rel
  (a_id numeric(3,0),
   room_numb numeric(4,0),
   primary key(a_id,room_numb),
   foreign key(a_id) references attendee(attendee_ID),
   foreign key(room_numb) references hotel_room(room_number)
  );

create table if not exists company_rel
  (company_attendee_id numeric(3,0),
   company_name varchar(25),
   primary key(company_attendee_id, company_name),
   foreign key(company_attendee_id) references attendee(attendee_ID),
   foreign key(company_name) references company(company_name)
  );

create table if not exists session_rel
  (sess_speaker_name varchar(25),
   speaker_id numeric(3,0),
   primary key(sess_speaker_name, speaker_id),
   foreign key(sess_speaker_name) references session(speaker_name),
   foreign key(speaker_id) references attendee(attendee_ID)
  );

create table if not exists organiser_rel
  (name varchar(25) not null,
   sub_commit varchar(25) not null,
   primary key(name, sub_commit),
   foreign key(name) references organising_committee(member_name),
   foreign key(sub_commit) references sub_committee(sub_committee_name)
  );


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
