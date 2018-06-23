<?php
/**
 * Created by PhpStorm.
 * User: Hydrogen
 * Date: 6/22/2018
 * Time: 6:32 PM
 * Source: https://medium.com/@stephenjudesuccess/testing-lumen-api-with-phpunit-tests-555835724b96
 */
class UserTest extends TestCase {
    /*
     * /user [GET]
     */
    public function testShouldReturnAllUsers() {



        // Show all the users
        $this->get("user", []);
        $this->seeStatusCode(200);
        $this->seeJsonStructure([
            'data' =>
            [
                '*' =>
                [
                    'id',
                    'name',
                    'email',
                    'phone',
                    'created_at',
                    'links' =>
                    [
                        '*'=>
                        [
                            'rel',
                            'uri',
                        ]
                    ]

                ]
            ],
            'meta' =>
            [
                'pagination' =>
                [
                    'total',
                    'count',
                    'per_page',
                    'current_page',
                    'total_pages',
                    'links' =>
                    [
                        'next'
                    ]

                ]
            ]
        ]);
    }
}