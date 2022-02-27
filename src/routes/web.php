<?php

use Eddytim\Auditlog\Http\Controllers\AuditLogController;

Route::get('insert-log', [AuditLogController::class, 'insertLog']);
Route::get('fetch-logs', [AuditLogController::class, 'fetchLogs']);
