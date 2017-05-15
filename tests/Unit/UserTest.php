<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserTest extends TestCase
{
    // use DatabaseMigrations;

    /**
    * Asssert that an user details are returned
    *
    */
    public function testShowsUserDetails()
    {
      $user = factory(\App\User::class)->create();
      $response = $this->get("/api/user/$user->id");

      $response->assertJsonStructure(
        ['id', 'name', 'email', 'image']
      );
    }

    /**
    * Assert user is deleted
    *
    */
    public function testUserCanBeDeleted()
    {
      $user = factory(\App\User::class)->create();
      $response = $this->delete("/api/user/$user->id");
      $result = \App\User::find($user->id);

      $this->assertNull(
        \App\User::find($user->id)
      );
    }

    /**
    *  Assert user can be updated (only name and email by the moment)
    *
    */
    public function testUserCanBeUpdated()
    {
      $user = factory(\App\User::class)->create();
      $response = $this->call('PUT',
                              "/api/user/$user->id",
                              ['name'=> 'My new Name',
                               'email'=> 'mynew@email.com']);

      $this->seeInDatabase('users', ['name'=> 'My new Name',
                                     'email'=> 'mynew@email.com'] );
    }
}
