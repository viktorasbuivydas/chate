<?php

namespace App\Enums;

use ArchTech\Enums\Values;

enum UserStats: string
{
    use Values;

    case Credits = 'credits';
    case Reputation = 'reputation';
    case Messages = 'messages';
    case ForumMessages = 'forum_messages';
    case ForumThreads = 'forum_threads';
    case ForumReplies = 'forum_replies';
    case ForumReputation = 'forum_reputation';
    case TutorialReputation = 'tutorial_reputation';
    case TutorialMessages = 'tutorial_messages';
    case Tutorials = 'tutorials';
    case Files = 'files';
    case FileReputation = 'file_reputation';
}
