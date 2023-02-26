<?php

namespace App\Enums;

use ArchTech\Enums\Values;

enum TopicTypes: string
{
    use Values;

    case Index = 'index';
    case App = 'app';
    case Forum = 'forum';
    case Tutorials = 'tutorial';
    case Files = 'files';
    case Chat = 'chat';
}
