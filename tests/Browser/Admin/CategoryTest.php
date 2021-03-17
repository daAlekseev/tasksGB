<?php

namespace Tests\Browser\Admin;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CategoryTest extends DuskTestCase
{
    //use RefreshDatabase;

    public function testBasicExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/category/create')
                ->type('title', 'О спорте')
                ->type('slug', 'sport')
                ->press('Создать')
                ->assertSee('Такое значение поля ЧПУ уже существует.');
        });

        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/category/create')
                ->type('title', 'О спорте')
                ->type('slug', 'sports')
                ->press('Создать')
                ->assertPathIs("/news/categories/sports");
        });
    }
}
