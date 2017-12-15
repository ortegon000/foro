<?php

class ExampleTest extends FeatureTestCase
{
    function test_basic_example()
    {
        $user = factory(\App\User::class)->create([
            'name' => 'Eduardo Ortega',
            'email' => 'ortegon000@hotmail.com'
        ]);

        $this->actingAs($user, 'api');
        $this->visit('/api/user')
             ->see('Eduardo Ortega')
             ->see('ortegon000@hotmail.com');
    }
    
}
