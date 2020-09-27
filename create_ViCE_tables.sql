DROP TABLE tbl_manf;
GO

CREATE TABLE tbl_manf 
(
  manf_id int PRIMARY KEY,
  manf_name nvarchar(60),
  manf_yr_founded int,
  manf_founder nvarchar(120),
  manf_profile nvarchar(800),
  manf_logo varbinary(max)
  );
  GO

DROP TABLE tbl_model;
GO

CREATE TABLE tbl_model 
(
  model_id int NOT NULL PRIMARY KEY,
  model_name nvarchar(60),
  model_type nvarchar(60),					/* computer, disk drive, cassette drive, printer, hard drive */
  model_released date,
  model_available date,
  model_lastsold date,
  model_ram int,
  model_ram_denom nvarchar(10),
  model_cpu nvarchar(20),
  model_cpu_speed int,
  model_os nvarchar(60),
  model_display nvarchar(60),
  model_bus nvarchar(60),
  model_ports nvarchar(60),
  model_num_sold int,
  model_expansion nvarchar(60),
  model_price_intro int);
  GO

DROP TABLE tbl_profile;
GO

CREATE TABLE tbl_profile (
	profile_id int NOT NULL PRIMARY KEY,
	profile_lastname nvarchar(60),
	profile_firstname nvarchar(60),
	profile_emailaddress nvarchar(60),
	profile_password nvarchar(60),			/* this needs to be better secured */
	profile_interests nvarchar(500),
	profile_city nvarchar(60),
	profile_state nvarchar(60),
	profile_country nvarchar(2));
GO

DROP TABLE tbl_countries;
GO

CREATE TABLE tbl_countries (
	countries_id varchar(2),				/* two-letter standard country */
	countries_name varchar(40));
GO

DROP TABLE tbl_usergroup;
GO

CREATE TABLE tbl_usergroup (
	usergroup_id int NOT NULL PRIMARY KEY,
	usergroup_name nvarchar(100),
	usergroup_email nvarchar(60),			/* contact email address */
	usergroup_desc nvarchar(200),
	usergroup_contact nvarchar(60),			/* name */
	usergroup_URL nvarchar(100),			/* website */
	usergroup_city nvarchar(60),
	usergroup_state nvarchar(60),
	usergroup_country nvarchar(2));
GO

DROP TABLE tbl_customdesign;
GO

CREATE TABLE tbl_customdesign (
	customdesign_id int NOT NULL PRIMARY KEY,
	customdesign_userid int,					/* user that submitted custom design */
	customdesign_plandocument varbinary(max),	/* document */
	customdesign_doctype nvarchar(60),			/* PDF, docx, txt */

