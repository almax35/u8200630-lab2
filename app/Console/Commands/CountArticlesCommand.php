<?php

namespace App\Console\Commands;
use App\Models\Tag;
use Illuminate\Console\Command;

class CountArticlesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     *
     */
    protected $signature = 'tag:count {id}'; 

    public function handle()
    {
        $tagId = $this->argument('id'); // получение аргумента {id} из команды

        $tag = Tag::find($tagId); // поиск тега по идентификатору

        if (!$tag) {
            throw new \InvalidArgumentException("Tag with ID {$tagId} not found.");
        }

        $articleCount = $tag->articles()->count(); // получение количества статей, привязанных к тегу

        $this->info("Number of articles attached to tag with ID {$tagId}: {$articleCount}");
    }
}