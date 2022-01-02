<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\DocsParserService;
use App\Services\PdfParserService;
use App\Models\UploadDocument;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Exception;

class UploadDocumentController extends Controller
{
    public function index()
    {
        return view('documents.index');
    }

    // example to read content of pdf and docx file
    public function store(Request $request)
    {
        // example of multiple file upload
        $documentFiles[] = $request->documentFiles;

        $request->validate([
            'documentFiles.*' => 'required|mimes:pdf,doc,docx|max:10000',
        ]);

        // use of pdf parser to read content from pdf and docx content custom class
        $pdfParser = app(PdfParserService::class);
        $docParser = app(DocsParserService::class);

        try {
            foreach ($documentFiles as $documentFile) {
                if ($documentFile->getClientOriginalExtension() === "pdf") {
                    $content = $pdfParser->parse($documentFile->path());
                } elseif ($documentFile->getClientOriginalExtension() === "doc" ||
                    $documentFile->getClientOriginalExtension() === "docx") {
                    $content = $docParser->parse($documentFile->path());
                }

                $ext = '.' . $documentFile->getClientOriginalExtension();
                $fileName = str_replace($ext, '-'.date('d-m-Y-H-i-s') . $ext, $documentFile->getClientOriginalName());
                // change this to store file in any directory
                $s3FilePath = 'documents/' . Auth::user()->id . '/'. $fileName;

                // Storage::disk('s3')->put(
                //     $s3FilePath,
                //     file_get_contents($documentFile->getRealPath()),
                // );

                $document = new UploadDocument;
                $document->orig_filename = $fileName;
                $document->filepath = $s3FilePath;
                $document->mime_type = $documentFile->getMimeType();
                $document->filesize = $documentFile->getSize();
                $document->content = $content;

                $document->save();
            }
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }

        return redirect()->back()->with('success', 'Files added successfully');
    }
}


/**
 * steps -
 * Install PDF parser using composer - composer require smalot/pdfparser
 * Create Services folder in app dir
 * Create PDFService and DocxServiceFile as given in Services - Folder
 * Register PDF parser in register() method of AppServiceProvider
 * or USE ANTIWORD
 * Need to install antiword
 * on mac - brew install antiword
 * on Linux - apt install antiword
 * https://stackoverflow.com/questions/5540886/extract-text-from-doc-and-docx
* */