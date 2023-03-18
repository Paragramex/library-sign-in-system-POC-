<?php
/*
Class for reading and writing array data in json format
Author: Sarfraz Ahmed (sarfraznawaz2005@gmail.com)
*/
class JsonTexter
{
    protected $file = null;

    public function __construct($file)
    {
        $this->file = $file;
    }

    // write array data to file by appending to previous contents
    public function write(array $contents, $allowDuplicate = true)
    {
        $result = false;

        if (!$allowDuplicate) {
            $isDuplicate = $this->search($contents);

            if (!$isDuplicate) {
                $result = file_put_contents(
                    $this->file,
                    json_encode($contents) . PHP_EOL,
                    FILE_APPEND | LOCK_EX
                );
            }
        } else {
            $result = file_put_contents(
                $this->file,
                json_encode($contents) . PHP_EOL,
                FILE_APPEND | LOCK_EX
            );
        }

        return $result;
    }

    // write new file, useful for writing array data once in one call
    public function writeTruncated(array $contents)
    {
        return file_put_contents(
            $this->file,
            json_encode($contents) . PHP_EOL,
            LOCK_EX
        );
    }

    // returns plain contents of written file
    public function readPlain($skipEmptyLines = false)
    {
        $contents = "";

        if ($skipEmptyLines) {
            $lines = file($this->file, FILE_SKIP_EMPTY_LINES);
        } else {
            $lines = file($this->file);
        }

        foreach ($lines as $line_num => $line) {
            $contents .=
                "Line #<b>{$line_num}</b> : " .
                htmlspecialchars($line) .
                "<br />\n";
        }

        return $contents;
    }

    // returns written json data as array
    public function readAsArray($skipEmptyLines = false)
    {
        $array = [];

        if ($skipEmptyLines) {
            $lines = file($this->file, FILE_SKIP_EMPTY_LINES);
        } else {
            $lines = file($this->file);
        }

        foreach ($lines as $line_num => $line) {
            $array[] = json_decode($line, true);
        }

        return $array;
    }

    // returns written data as plain human readable table format
    public function readAsPlainTable()
    {
        return $this->toTable($this->readAsArray());
    }

    // returns written data as html table
    public function readAsHTMLTable()
    {
        return $this->array2Html($this->readAsArray());
    }

    // search in given file for specified array
    public function search(array $array)
    {
        $data = $this->readAsArray();

        if ($data) {
            foreach ($data as $subArray) {
                if ($array === $subArray) {
                    return true;
                }
            }
        }

        return false;
    }

    // converts array to human readable plain table
    protected function toTable($data)
    {
        $keys = array_keys(end($data));
        $size = array_map("strlen", $keys);

        foreach (array_map("array_values", $data) as $e) {
            $size = array_map("max", $size, array_map("strlen", $e));
        }

        foreach ($size as $n) {
            $form[] = "%-{$n}s";
            $line[] = str_repeat("-", $n);
        }

        $form = "| " . implode(" | ", $form) . " |\n";
        $line = "+-" . implode("-+-", $line) . "-+\n";
        $rows = [vsprintf($form, $keys)];

        foreach ($data as $e) {
            $rows[] = vsprintf($form, $e);
        }

        echo "<pre>\n";
        echo $line . implode($line, $rows) . $line;
        echo "</pre>\n";
    }

    // converts array to html table
    protected function array2Html($array, $table = true)
    {
        $out = "";
        $tableHeader = "";

        foreach ($array as $key => $value) {
            if (is_array($value)) {
                if (!isset($tableHeader)) {
                    $tableHeader =
                        "<th>" .
                        implode("</th><th>", array_keys($value)) .
                        "</th>";
                }
                array_keys($value);
                $out .= "<tr>";
                $out .= $this->array2Html($value, false);
                $out .= "</tr>";
            } else {
                $out .= "<td>$value</td>";
            }
        }

        if ($table) {
            return '<table width="100%" align="center" border="1" cellpadding="4" cellspacing="0">' .
                $tableHeader .
                $out .
                "</table>";
        } else {
            return $out;
        }
    }
}
