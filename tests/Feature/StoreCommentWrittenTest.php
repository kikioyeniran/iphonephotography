<?php

namespace Tests\Feature;

use App\Events\CommentWritten;
use App\Listeners\StoreCommentWritten;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;

class StoreCommentWrittenTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_comment_written_listener()
    {
        Event::fake();
        Event::assertListening(
            CommentWritten::class,
            StoreCommentWritten::class
        );
    }
}
