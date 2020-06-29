<?php

use EZFW\App;
use EZFW\Http\Plugin;

use Mockery\Mock;

beforeEach(function () {
    $this->app = App::boot();
});

it('should allow plugin to be registered', function () {
    /** @var Mock $mock */
    $mock = Mockery::mock('overload:' . Plugin::class);
    $mock->shouldReceive('boot')
        ->once()
        ->with($this->app);
    $this->app->use(get_class($mock));
});
