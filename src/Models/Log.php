<?php

namespace MWazovzky\DatabaseLogger\Models;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    const LOG_LEVELS = [
        'DEBUG' => 7,      // Debug: debug-level messages
        'INFO' => 6,       // Informational: informational messages
        'NOTICE' => 5,     // Notice: normal but significant condition
        'WARNING' => 4,    // Warning: warning conditions
        'ERROR' => 3,      // Error: error conditions
        'CRITICAL' => 2,   // Critical: critical conditions
        'ALERT' => 1,      // Alert: action must be taken immediately
        'EMERGENCY' => 0,  // Emergency: system is unusable
    ];

    protected $fillable = [
        'level',
        'channel',
        'message',
        'context',
        'batch_id',
        'batch_type',
    ];

    /**
     * Get all of the owning batch models.
     */
    public function batch()
    {
        return $this->morphTo();
    }

    public function setContextAttribute($value)
    {
    	$this->attributes['context'] = json_encode($value, JSON_UNESCAPED_UNICODE);
    }

    public function getContextAttribute($value)
    {
    	return json_decode($value, JSON_UNESCAPED_UNICODE);
    }
}
