<?php 

class ModelUserJoinEvent extends BaseModel
{
    protected $table = 'user_join_event';

    public function isUserJoinedEvent($user_id, $event_id)
    {
        return !is_null($this->findOne([
            'user_id' => $user_id,
            'event_id' => $event_id
        ]));
    }
}