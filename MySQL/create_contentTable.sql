create table contents (
	id				int			not null	primary key		auto_increment ,
	user_id			int			not null ,
	title			varchar(30)	,
	body			text ,
	content_date	date		not null ,
	update_date		date 		not null ,
	delete_flg		boolean 	not null 	default false ,
	kind			int			not null ,
	foreign key		(user_id)	references	users(id)
) engine=InnoDB;