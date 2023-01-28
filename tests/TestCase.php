<?php

namespace Tests;

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    use DatabaseTransactions;
    public $user;
    public $product;


    public function setUp():void
    {
        parent::setUp();
        $this->user=$this->createUser();
        $this->product=$this->createProduct();
    }

    function createProduct()
    {
        return Product::factory()->create();
    }
    function createUser()
    {
        return User::factory()->create();
    }

}
