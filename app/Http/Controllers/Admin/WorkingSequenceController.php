<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MultiWI;
use App\Models\WorkingSequence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\WorkingSequenceExport;

class WorkingSequenceController extends Controller
{
    public function index() {
        $workingSequences = WorkingSequence::with('multiWi')->get();
        $multiwis = MultiWI::all(); 
        
    return view('pages.working_sequences.index', compact('workingSequences','multiwis' ));
    }    
    
    public function create() {
        $multiwis = MultiWI::all();

        return view('pages.working_sequences.create', [
            "multiwis" => $multiwis,
        ]);
    }

    public function masterwi(Request $request)
    {
        $validated = $request->validate([
            "working_sequence_code" => "required",
            "person_required" => "nullable|integer",
            "multiwi_id" => "required",
            "process_code" => "required",
            "process_name" => "required",
            "work_center_code" => "required",
            "work_center_name" => "required",
        ]);

        WorkingSequence::create([
            "working_sequence_code" => $request->input('working_sequence_code'),
            "person_required" => $request->input('person_required'),
            "multiwi_id" => $request->input('multiwi_id'),
            "process_code" => $request->input('process_code'),
            "process_name" => $request->input('process_name'),
            "work_center_code" => $request->input('work_center_code'),
            "work_center_name" => $request->input('work_center_name'),
        ]);

        return redirect('/working_sequences');
    }

    public function edit($id)
    {
        $sequence = WorkingSequence::findOrFail($id);
        $multiwis = MultiWI::all();

        return view('pages.working_sequences.edit', compact('sequence', 'multiwis'));
    }


    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            "working_sequence_code" => "required",
            "person_required" => "nullable|integer",
            "multiwi_id" => "required",
            "process_code" => "required",
            "process_name" => "required",
            "work_center_code" => "required",
            "work_center_name" => "required",
        ]);

        WorkingSequence::where('id', $id)->update([
            "working_sequence_code" => $request->input('working_sequence_code'),
            "person_required" => $request->input('person_required'),
            "multiwi_id" => $request->input('multiwi_id'),
            "process_code" => $request->input('process_code'),
            "process_name" => $request->input('process_name'),
            "work_center_code" => $request->input('work_center_code'),
            "work_center_name" => $request->input('work_center_name'),
        ]);

        return redirect('/working_sequences')->with('success', 'Working Sequence updated successfully!');
    }


    public function delete($id)
    {
        $sequence = WorkingSequence::where('id', $id);
        $sequence->delete();

        return redirect('/working_sequences');
    }

    public function exportExcel()
    {
        return Excel::download(new WorkingSequenceExport, 'working_sequences.xlsx');
    }

    public function exportPdf()
    {
        $workingSequences = WorkingSequence::all();
        $pdf = Pdf::loadView('pages.working_sequences.pdf', compact('workingSequences'));
        return $pdf->download('pages.working_sequences.pdf');
    }

}