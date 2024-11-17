<?php

namespace App\Http\Controllers\Api;

use App\Exports\ReportExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReportRequest;
use App\Services\ReportService;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    private $service;

    public function __construct(ReportService $service)
    {
        $this->service = $service;
    }

    public function index(ReportRequest $request)
    {

        $report = $this->service->get();

        return Response(['success' => 'true', 'message' => 'success' ,'data' => $report]);
    }

    public function export(ReportRequest $request)
    {
        return Excel::download(new ReportExport, 'report.xlsx');
    }
}
