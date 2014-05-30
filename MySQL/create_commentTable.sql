create table contents (
	id				int			not null	primary key		auto_increment ,
	content_id		int			not null ,
	poster			int 		not null ,
	body			text ,
	comment_date	date		not null ,
	delete_flg		boolean 	not null 	default false ,
	foreign key		(content_id)			references	contains(id) ,
	foreign key		(poster)				references	users(id)
) engine=InnoDB;