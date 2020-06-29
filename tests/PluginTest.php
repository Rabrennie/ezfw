<?php

use EZFW\App;
use EZFW\Http\Plugin;

beforeEach(function () {
    $this->app = App::boot();
});

it('should allow plugin to be registered', function () {
    $mock = Mockery::mock('overload:' . Plugin::class);
    $mock->shouldReceive('boot')
        ->once()
        ->with($this->app);
    $this->app->use(get_class($mock));
});