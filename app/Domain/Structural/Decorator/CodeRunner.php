<?php

namespace App\Domain\Structural\Decorator;

use App\Domain\Structural\Decorator\Inputs\TextInput;

class CodeRunner
{
    public function runCode(): array
    {
        $dangerousComment = <<<HERE
Hello! Nice blog post!
Please visit my <a href='http://www.iwillhackyou.com'>homepage</a>.
<script src="http://www.iwillhackyou.com/script.js">
    performXSSAttack();
</script>
HERE;

// BASE
        $naiveInput = new TextInput();

        $formatted1 = $naiveInput->formatText($dangerousComment);


// PLAIN TEXT FILTER
        $filteredInput = new PlainTextFilter($naiveInput);

        $formatted2 = $filteredInput->formatText($dangerousComment);

// MARKDOWN
$dangerousForumPost = <<<HERE
# Welcome

This is my first post on this **gorgeous** forum.

<script src="http://www.iwillhackyou.com/script.js">
  performXSSAttack();
</script>
HERE;
        $text = new TextInput();
        $markdown = new MarkdownFormat($text);
        $filteredInput = new DangerousHTMLTagsFilter($markdown);

        $formatted3 = $filteredInput->formatText($dangerousForumPost);

        return [
            'naive' => $formatted1,
            'filtered' => $formatted2,
            'markdown' => $formatted3
        ];
    }
}
