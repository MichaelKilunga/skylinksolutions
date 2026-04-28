<?php

namespace App\Jobs;

use Illuminate\Foundation\Bus\Dispatchable;

class NotifySubscribersOfNewContent
{
    use Dispatchable;
    public $content;
    public $contentType;

    /**
     * Create a new job instance.
     */
    public function __construct($content, $contentType)
    {
        $this->content = $content;
        $this->contentType = $contentType; // 'news' or 'announcement'
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        \App\Models\Subscriber::where('is_active', true)->chunk(100, function ($subscribers) {
            foreach ($subscribers as $subscriber) {
                try {
                    if ($this->contentType === 'news') {
                        \Illuminate\Support\Facades\Mail::to($subscriber->email)
                            ->send(new \App\Mail\NewsPublishedNotification($this->content, $subscriber));
                    } else {
                        \Illuminate\Support\Facades\Mail::to($subscriber->email)
                            ->send(new \App\Mail\AnnouncementPublishedNotification($this->content, $subscriber));
                    }
                } catch (\Exception $e) {
                    \Illuminate\Support\Facades\Log::error("Failed to send notification to {$subscriber->email}: " . $e->getMessage());
                }
            }
        });
    }
}
