<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Notifications\BazarListSummaryNotification;
use Illuminate\Console\Command;

class SendBazarListSummary extends Command
{
    protected $signature = 'bazarlist:send-summary';
    protected $description = 'Send daily/weekly bazar list summary notifications to users';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $users = User::with('bazarLists.items.product')->get();

        foreach ($users as $user) {
            foreach ($user->bazarLists as $bazarList) {
                if ($bazarList->items->count() > 0) {
                    $user->notify(new BazarListSummaryNotification($bazarList->items));
                }
            }
        }

        $this->info('Bazar list summary notifications have been sent successfully.');
    }
}
