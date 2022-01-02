<?php

namespace App\Services;

use Exception;

class DocsParserService
{
    private $filename;

    public function __construct()
    {
        // $this->filename = $filePath;
    }

    /**
     *
     */
    private function readDoc()
    {
        // TO READ contents from doc file e need to install antiword
        /**
            * on mac - brew install antiword
            * on Linux - apt install antiword
         */
        try {
            exec('antiword -f ' . $this->filename, $output);
            return implode(" ", $output);
        } catch (Exception $e) {
            return "";
        }
    }

    /**
     *
     */
    private function readDocx()
    {
        $striped_content = '';
        $content = '';

        try {
            $zip = new \ZipArchive();
            $isOpened = $zip->open($this->filename, $zip::RDONLY);

            if (!$isOpened || is_numeric($isOpened)) {
                return false;
            }

            for ($i = 0; $i < $zip->count(); $i++) {
                if ($zip->getNameIndex($i) != "word/document.xml") {
                    continue;
                }

                $content .= $zip->getFromIndex($i);
            }

            $zip->close();

            $content = str_replace('</w:r></w:p></w:tc><w:tc>', " ", $content);
            $content = str_replace('</w:r></w:p>', "\r\n", $content);
            $striped_content = strip_tags($content);
        } catch (Exception $e) {
            return $e;
        }

        return $striped_content;
    }

    public function parse($filePath)
    {
        $this->filename = $filePath;

        if (isset($this->filename) && !file_exists($this->filename)) {
            return "File Not exists";
        }

        $fileArray = pathinfo($this->filename);
        $file_ext = $fileArray['extension'];
        if ($file_ext == "doc" || $file_ext == "docx") {
            if ($file_ext == "doc") {
                return $this->readDoc();
            } else {
                return $this->readDocx();
            }
        } else {
            return "Invalid File Type";
        }
    }
}
