<?php

namespace App\Console\Commands;

use App\Models\Post;
use Illuminate\Console\Command;

class CheckExpired extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:expired';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check and update post status';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $expired_posts = Post::whereStatus('published')->whereDate('end_date','<',date('Y-m-d'))->get();
        if (count($expired_posts) > 0) {
            foreach ($expired_posts as $post) {
                $post->update(['status' => 'expired']);
            }
            $this->info("Updated !!");
        }
    }
}
