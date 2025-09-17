<?php

namespace App\Console\Commands;

use App\Mail\BroadcastMail;
use App\Models\Subscriber;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class BroadcastToSubscribers extends Command
{
    protected $signature = 'newsletter:broadcast {subject} {--file=} {--text=}';

    protected $description = 'Send a broadcast email to all newsletter subscribers';

    public function handle(): int
    {
        $subject = (string) $this->argument('subject');
        $file = (string) $this->option('file');
        $text = (string) $this->option('text');

        if (!$text && $file) {
            if (!is_file($file)) {
                $this->error('File not found: '.$file);
                return self::FAILURE;
            }
            $text = trim((string) file_get_contents($file));
        }

        if (!$text) {
            $this->error('Provide content via --text="..." or --file=path');
            return self::FAILURE;
        }

        $count = 0;
        Subscriber::chunk(200, function ($batch) use (&$count, $subject, $text) {
            foreach ($batch as $subscriber) {
                Mail::to($subscriber->email)->queue(new BroadcastMail($subject, $text));
                $count++;
            }
        });

        $this->info("Queued broadcast to {$count} subscribers.");
        return self::SUCCESS;
    }
}


