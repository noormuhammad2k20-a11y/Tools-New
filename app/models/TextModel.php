<?php
class TextModel extends ToolModel {
    public function getWordStats($text) {
        $wordCount = str_word_count($text);
        $charCount = mb_strlen($text, 'UTF-8');
        $charNoSpacesCount = mb_strlen(str_replace(' ', '', $text), 'UTF-8');
        $sentenceCount = preg_match_all('/[^\s](\b[^.!?]*[.!?])/', $text, $matches) ?: 0;
        if ($sentenceCount == 0 && $charCount > 0) $sentenceCount = 1; 
        
        return [
            'words' => $wordCount,
            'chars' => $charCount,
            'chars_no_spaces' => $charNoSpacesCount,
            'sentences' => $sentenceCount
        ];
    }
}
