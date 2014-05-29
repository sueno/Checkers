<?php
interface DaoInterface {
    public function /* void */  connect();
	public function /* int */   insert(/* PostBean */ $post);
	public function /* Array<BeansInterface[]>[] */ select(/* PostBean */ $post, /*String*/ $elem, /*String*/ $conditions);
	public function /* bool */  update(/* PostBean */ $post);
}
?>