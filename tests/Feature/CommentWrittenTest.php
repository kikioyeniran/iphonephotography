<?php

namespace Tests\Feature;

use App\Events\CommentWritten;
use App\Models\Comment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;

class CommentWrittenTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_comment_written()
    {
        Event::fake();

        $comment = Comment::factory()->create();

        event(new CommentWritten($comment));

        Event::assertDispatched(CommentWritten::class);
    }
}
