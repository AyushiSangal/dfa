<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Utilities\Jobs\CheckBitwiseNumber as Job;

class BitwiseTest extends TestCase
{

    /**
     * @test
     */
    public function test_number_divisible_by_divisor()
    {
        $num = 6;
        $divisor = 3;

        $check = Job::run($num, $divisor);
        $this->assertEquals(0, $check);
    }

    /**
     * @test
     */
    public function test_number_not_divisible_by_divisor()
    {
        $num = 10;
        $divisor = 3;

        $check = Job::run($num, $divisor);
        $this->assertNotEquals(0, $check);
    }
}
