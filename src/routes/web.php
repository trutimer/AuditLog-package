<?php

use Eddytim\Auditlog\Http\Controllers\AuditLogController;

Route::get('insert-log', [AuditLogController::class, 'insertLog']);
