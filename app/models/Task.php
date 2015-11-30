<?php

class Task extends \Eloquent {
	protected $fillable = [];

    /**
     * Relationship to project is specified here
     */
    public function project(){
        return $this->belongsTo('Project', 'project_id');
    }
}

