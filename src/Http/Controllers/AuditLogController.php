<?php

namespace Eddytim\Auditlog\Http\Controllers;

use App\Http\Controllers\Controller;
use Eddytim\Auditlog\Models\AuditLog;

class AuditLogController extends Controller {

    public function insertLog(){
        return AuditLog::store([
            'event_status' => 'FAILED',
            'event_type' => 'Edit',
            'user_id' => 1,
            'description' => 'Editing new user',
            'table_name' => null,
            'row_id' => null
        ]);
    }

    public function fetchLogs(){
        return AuditLog::getAuditLogs(0);
    }
}
