<?php

class Client extends \Eloquent {

	protected $table = 'clients';
	protected $fillable = [];
	public var $unused="";

	/**
	 * Return the related projects for a given client
	 */
	public function projects() {
        return $this->hasMany('Project', 'client_id');
    }
}