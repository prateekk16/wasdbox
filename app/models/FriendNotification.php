<?php

class FriendNotification extends \Eloquent {
	protected $fillable = [];
	protected $table = 'friend_notifications';

	public function getUser($id){
		return User::where('id','=',$id)->first();
	}
}