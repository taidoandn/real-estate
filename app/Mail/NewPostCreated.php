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
        $date_diff   = dateDiff($this->post->start_date,$this->post->end_date);
        $price       = $this->post->type->price * $date_diff;
        $vat         = $price * 10 /100;
        $total_price = $price + $vat;
        return $this->from('admin@example.com')->markdown('emails.posts.post-created')
                ->subject('Xác nhận đăng bài viết')
                ->with([
                    'post'        => $this->post,
                    'diff_date'   => $date_diff,
                    'vat'         => $vat,
                    'price'       => $price,
                    'total_price' => $total_price,
                ]);
    }
}
