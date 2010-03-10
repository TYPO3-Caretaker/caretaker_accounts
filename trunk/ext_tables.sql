#
# Table structure for table 'tx_caretakeraccounts_types'
#
CREATE TABLE tx_caretakeraccounts_types (
	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,
	tstamp int(11) DEFAULT '0' NOT NULL,
	crdate int(11) DEFAULT '0' NOT NULL,
	cruser_id int(11) DEFAULT '0' NOT NULL,
	deleted tinyint(4) DEFAULT '0' NOT NULL,
	hidden tinyint(4) DEFAULT '0' NOT NULL,
	name tinytext,
	url_pattern tinytext,
	type_icon text,
	
	PRIMARY KEY (uid),
	KEY parent (pid)
);



#
# Table structure for table 'tx_caretakeraccounts_accounts'
#
CREATE TABLE tx_caretakeraccounts_accounts (
	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,
	tstamp int(11) DEFAULT '0' NOT NULL,
	crdate int(11) DEFAULT '0' NOT NULL,
	cruser_id int(11) DEFAULT '0' NOT NULL,
	deleted tinyint(4) DEFAULT '0' NOT NULL,
	hidden tinyint(4) DEFAULT '0' NOT NULL,
	uid_node tinytext,
	node_table tinytext,
	username tinytext,
	password tinytext,
	url tinytext,
	hostname tinytext,
	type text,
	
	PRIMARY KEY (uid),
	KEY parent (pid)
);



#
# Table structure for table 'tx_caretaker_instance'
#
CREATE TABLE tx_caretaker_instance (
	tx_caretakeraccounts_accounts int(11) DEFAULT '0' NOT NULL
);



#
# Table structure for table 'tx_caretaker_instancegroup'
#
CREATE TABLE tx_caretaker_instancegroup (
	tx_caretakeraccounts_accounts int(11) DEFAULT '0' NOT NULL
);