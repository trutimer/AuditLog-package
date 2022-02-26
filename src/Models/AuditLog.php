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

    public static function store(array $attributes = array(), $send_alert = false, $message = null): JsonResponse
    {
        try {
            throw_if($send_alert && $message == null);

            $log = AuditLog::create($attributes);
            if ($send_alert){
                Mail::to(config('audit.send_email_to'))->send(new AlertOtherUsersMail($message));
            }
            return response()->json(['status' => 'success','data' => $log]);
        } catch (\Throwable $e) {
            return response()->json(['status' => 'error', 'message' => 'Message field is required if you want to send alert'], 401);
        }
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
