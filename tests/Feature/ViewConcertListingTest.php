<?php

namespace Tests\Feature;

use App\Models\Concert;
use Carbon\Carbon;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ViewConcertListingTest extends TestCase
{
  use RefreshDatabase;
	
	/** @test */
	public function user_can_view_a_concert_listing()
	  {
      // Settings for run test
      // Create a concert - mockup
      $concert = factory(Concert::class)->create();

      // Run de code
      // View de concert listing
      $this->assertDatabaseHas('concerts', [
        'id' => $concert->id,
        'title' => $concert->title,
        'subtitle' => $concert->subtitle,
        'date' => $concert->date,
        'ticket_price' => $concert->ticket_price,
        'venue' => $concert->venue,
        'venue_address' => $concert->venue_address,
        'city' => $concert->city,
        'state' => $concert->state,
        'zip' => $concert->zip,
        'additional_information' => $concert->additional_information
      ]);
  }
}
