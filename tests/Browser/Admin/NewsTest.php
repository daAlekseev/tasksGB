<?php

namespace Tests\Browser\Admin;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\News;

class NewsTest extends DuskTestCase
{
    //use RefreshDatabase;

    public function testBasicExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/news/create')
                ->type('title', '21')
                ->type('text', '')
                ->press('Создать')
                ->assertSee('Поле Текст не заполнено');
        });

        $this->browse(function (Browser $browser) {
            $news =  News::query()
                ->orderBy('id', 'desc')
                ->limit(1)
                ->first();
            $id = $news->id + 1;
            $browser->visit('/admin/news/create')
                ->type('title', '123')
                ->type('text', '123')
                ->press('Создать')
                ->assertPathIs("/news/item/{$id}");
       });
    }
}
