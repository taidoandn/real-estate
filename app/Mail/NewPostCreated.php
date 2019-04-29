<?php

namespace App\Mail;

use Carbon\Carbon;
use App\Models\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewPostCreated extends Mailable
{
    use Queueable, SerializesModels;

    protected $post;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $start       = Carbon::parse($this->post->start_date);
        $end         = Carbon::parse($this->post->end_date);
        $diff_date   = $start->diffInDays($end);
        $price       = $this->post->type->price * $diff_date;
        $vat         = $price * 10 /100;
        $total_price = $price + $vat;
        return $this->from('admin@example.com')->markdown('emails.posts.post-created')
                ->subject('Xác nhận đăng bài viết')
                ->with([
                    'post'        => $this->post,
                    'diff_date'   => $diff_date,
                    'vat'         => $vat,
                    'price'       => $price,
                    'total_price' => $total_price,
                ]);
    }
}
