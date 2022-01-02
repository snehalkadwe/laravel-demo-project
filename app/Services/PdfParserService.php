<?php

namespace App\Services;

use Smalot\PdfParser\Parser;

class PdfParserService
{

    /**
     * Variable to hold the parser object
     */
    protected $parser;

    /**
     * Constructor for the service class
     */
    public function __construct()
    {
        $this->parser = new Parser();
    }

    /**
     * parse the pdf and return extracted text
     *
     * @param String $filePath
     * @return String
     */
    public function parse($filePath)
    {
        $pdf = $this->parser->parseFile($filePath);

        return $pdf->getText();
    }
}