<?php

namespace Eddytim\Auditlog\Models;

use Eddytim\Auditlog\Mail\AlertOtherUsersMail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Mail;

class AuditLog extends Model
{
    use HasFactory;

    public static function store(array $attributes = array(), $message = null)
    {
        $log = AuditLog::create($attributes);
        if ($message != null){
            Mail::to(config('audit.send_email_to'))->send(new AlertOtherUsersMail($message));
        }
        return $log;
    }

    public static function getAuditLogs(){
        return AuditLog::query()->latest()->limit(50)->get();
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
