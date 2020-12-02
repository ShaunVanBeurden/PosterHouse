<?php

namespace App\Console\Commands;

use App\Models\Newsletter;
use App\Models\User;
use App\Notifications\NewsletterNotification;
use Illuminate\Console\Command;
use Notification;

class SendNewsletters extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'newsletter:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send the news letters';

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
        // TODO: check if there is a newsletter

        $newsletter = Newsletter::orderBy('id', 'DESC')->first();

        Notification::send(User::all()->where('notify', true), new NewsletterNotification($newsletter));

        return $this->info("Newsletters send.");
    }
}
