<?php

use App\Http\Controllers\UserController;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\View;

class UserControllerTest extends TestCase
{
    /**
     * Test UserController@index
     *
     * @group UserController
     * @group UserController0
     */
    public function testIndex()
    {
        // arrange
        $expected = new Collection([
            ['name' => 'oomusou', 'email' => 'oomusou@gmail.com'],
            ['name' => 'sam',     'email' => 'sam@gmail.com'],
            ['name' => 'sunny',   'email' => 'sunny@gmail.com'],
        ]);

        $target = new UserController();

        $closure = function () use ($expected) {
            $this->getAll = function () use ($expected){
                return $expected;
            };
        };
        $closure = $closure->bindTo($target, $target);
        $closure();

        // act
        /** @var View $view */
        $view = $target->index();
        $actual = $view->users;

        // assert
        $this->assertEquals($expected, $actual);
    }
}
