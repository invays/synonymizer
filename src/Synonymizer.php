<?php
namespace Invays\Synonymizer;

class Synonymizer
{
    public $start;
    public $end;
    public $delimiter;
    public $text;

    public function __construct()
    {
        $this->start = $this->setStart();
        $this->end = $this->setEnd();
        $this->delimiter = $this->setDelimiter();
    }

    private function setStart(): string
    {
        return (!$this->start) ? '[' : $this->start;
    }

    private function setEnd(): string
    {
        return (!$this->end) ? ']' : $this->end;
    }

    private function setDelimiter(): string
    {
        return (!$this->delimiter) ? '|' : $this->delimiter;
    }


    public function synonimaizer(): string
    {
        if (!$this->text) {
            return 'Empty text for synonimaizer';
        }

        preg_match_all($this->makeRegExp(), $this->text, $matches);

        $result = preg_replace($this->makeRegExp(), '%s', $this->text);

        return vsprintf($result, array_map(function ($match) {
            $variantsString = str_replace([$this->start, $this->end], ['', ''], $match);
            $variantsArray = explode($this->delimiter, $variantsString);
            return $variantsArray[array_rand($variantsArray)];
        }, $matches[0]));
    }

    public function fix_synonimaizer(int $id = 0): string
    {
        if (!$this->text) {
            return 'Empty text for synonimaizer';
        }

        preg_match_all($this->makeRegExp(), $this->text, $matches);

        $result = preg_replace($this->makeRegExp(), '%s', $this->text);

        return vsprintf($result, array_map(function ($match) use ($id) {
            $variantsString = str_replace([$this->start, $this->end], ['', ''], $match);
            $variantsArray = explode($this->delimiter, $variantsString);
            $index = $id % count($variantsArray);
            return $variantsArray[$index];
        }, $matches[0]));
    }

    private function makeRegExp(): string
    {
        return "/" . preg_quote($this->start, '/') . "[^\]]*" . preg_quote($this->end, '/') . "/";
    }

}