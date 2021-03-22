<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Illuminate\Support\Facades\File;
use App\Models\News;

class NewsTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testGetAllNews()
    {
        $news = new News();
        $this->assertIsObject($news);
        $this->assertIsArray($news->getAllNews());
    }
}
