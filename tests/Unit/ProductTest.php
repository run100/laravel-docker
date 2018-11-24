<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Product;

class ProductTest extends \PHPUnit\Framework\TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function testAProductHasAName()
    {
        $product = new Product('Iphone');

        $this->assertEquals('Iphone', $product->name());
    }
}
