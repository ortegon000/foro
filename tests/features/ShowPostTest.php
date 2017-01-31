<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ShowPostTest extends FeatureTestCase
{
    function test_a_user_can_see_the_post_details()
    {
        // Having
        $user = $this->defaultUser([
            'name' => 'Eduardo Ortega',
        ]);

        $post = $this->createPost([
            'title' => 'Este es el titulo del post',
            'content' => 'Este es el contenido del post',
            'user_id' => $user->id
        ]);

        //When
        $this->visit($post->url)
            ->seeInElement('h1', $post->title)
            ->see($post->content)
            ->see('Eduardo Ortega');
    }

    function test_old_urls_are_redirected()
    {
        // Having
        $post = $this->createPost([
            'title' => 'Old Title'
        ]);

        $url = $post->url;

        $post->update(['title' => 'New Tilte']);

        $this->visit($url)
            ->seePageIs($post->url);
    }
}
