<?php
/**
 * Created by PhpStorm.
 * User: Hydrogen
 * Date: 6/22/2018
 * Time: 2:40 AM
 */

class ApiTest extends TestCase
{
    public function testApplication()
    {
        $response = $this->call('GET', '/');

        $this->assertEquals(200, $response->status());
    }
}