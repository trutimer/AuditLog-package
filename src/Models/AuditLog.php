<?php

namespace Eddytim\Auditlog\Models;

use Eddytim\Auditlog\Jobs\SendAlertMailJob;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuditLog extends Model
{
    use HasFactory;

    public static function store(array $attributes = array(), $message = null)
    {
        $log = AuditLog::create($attributes);
        if ($message != null){
            SendAlertMailJob::dispatch($message);
        }
        return $log;
    }

    public static function getAuditLogs($offset){
        return AuditLog::query()->latest()->skip($offset)->take(config('audit.audit_logs_limit'))->get();
    }

    public function user(){
        return $this->belongsTo(config('audit.user_model'), config('audit.foreign_key'), config('audit.owner_key'));
    }

    protected $fillable = [
        'event_status',
        'event_type',
        'user_id',
        'description',
        'table_name',
        'row_id',
    ];
}
