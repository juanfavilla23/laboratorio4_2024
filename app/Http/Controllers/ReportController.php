<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Course;
use App\Models\Commission;
use App\Models\Professor;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\StudentsExport;
use App\Exports\CoursesExport;
use App\Exports\CommissionsExport;
use App\Exports\ProfessorsExport;

class ReportController extends Controller
{
    public function studentsEnrolled()
    {
        $students = Student::with(['courses', 'commissions'])->get();
        return view('reports.students_enrolled', compact('students'));
    }

    public function coursesBySubject()
    {
        $courses = Course::with('subject')->get()->groupBy('subject.name');
        return view('reports.courses_by_subject', compact('courses'));
    }

    public function commissionsAndSchedules()
    {
        $commissions = Commission::with(['course', 'professor'])->get();
        return view('reports.commissions_and_schedules', compact('commissions'));
    }

    public function professorsAttendance()
    {
        $professors = Professor::with('commissions')->get();
        return view('reports.professors_attendance', compact('professors'));
    }

    public function exportToPDF($reportType)
    {
        $data = $this->getReportData($reportType);
        $pdf = Pdf::loadView('reports.' . $reportType, $data);
        return $pdf->download($reportType . '.pdf');
    }

 /*   public function exportToExcel($reportType)
{
    switch ($reportType) {
        case 'students_enrolled':
            return Excel::download(new StudentsExport, 'students_enrolled.xlsx');
        case 'courses_by_subject':
            return Excel::download(new CoursesExport, 'courses_by_subject.xlsx');
        case 'commissions_and_schedules':
            return Excel::download(new CommissionsExport, 'commissions_and_schedules.xlsx');
        case 'professors_attendance':
            return Excel::download(new ProfessorsExport, 'professors_attendance.xlsx');
        default:
            return redirect()->back()->with('error', 'Tipo de reporte no válido.');
    }
}

*/
    private function getReportData($reportType)
    {
        switch ($reportType) {
            case 'students_enrolled':
                return ['students' => Student::with(['courses', 'commissions'])->get()];
            case 'courses_by_subject':
                return ['courses' => Course::with('subject')->get()->groupBy('subject.name')];
            case 'commissions_and_schedules':
                return ['commissions' => Commission::with(['course', 'professor'])->get()];
            case 'professors_attendance':
                return ['professors' => Professor::with('commissions')->get()];
            default:
                return [];
        }
    }
}
