<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Tag;

class TagCount extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tag:count {id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get the number of posts with {id} tag';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $id = $this->argument('id');
        $tag = Tag::findOrFail($id);
        $count = $tag->post()->get()->count();
        $this->line($count);
    }
}
