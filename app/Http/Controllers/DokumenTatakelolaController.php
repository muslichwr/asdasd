<?php

namespace App\Http\Controllers;

use App\Models\DokumenTatakelola;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class DokumenTatakelolaController extends Controller
{
    public function upload(Request $request, $aplikasi)
    {
        // Validate the uploaded file
        $request->validate([
            'file' => 'required|mimes:pdf,doc,docx|max:2048',
        ]);

        // Store the uploaded file
        $file = $request->file('file');
        $filename = $file->getClientOriginalName();
        $path = $file->store('dokumen_tatakelola');

        // Create a new document record in the database
        $document = new DokumenTatakelola();
        $document->aplikasi_id = $aplikasi;
        $document->filename = $filename;
        $document->filepath = $path;
        $document->save();

        return redirect()->route('data.detailaplikasi.edit');

    }

    public function delete($id)
    {
        // Find the document record
        $document = DokumenTatakelola::findOrFail($id);

        // Delete the file from storage
        Storage::delete($document->filepath);

        // Delete the document record from the database
        $document->delete();

        return redirect()->back()->with('success', 'Document deleted successfully.');
    }

    public function download($id)
    {
        // Find the document record
        $document = DokumenTatakelola::findOrFail($id);

        // Download the file
        return Storage::download($document->filepath, $document->filename);
    }
}
