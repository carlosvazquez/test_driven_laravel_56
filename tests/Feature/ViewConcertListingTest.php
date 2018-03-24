<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ViewConcertListingTest extends TestCase
{
	
	/** @test */
	public function user_can_view_a_concert_listing()
	  {
    		// Settings for run test
		    // Create a concert - mockup
		    $concert = Concert::create([
		      'title' => 'The Red Chord',
		      'subtitle' => 'with Animosity and Lethargy',
		      'date' => Carbon::parse('December 13, 2016 8:00pm'),
          'ticket_price' => 3250,
          'venue' => 'The Mosh Pit',
          'address' => '123 Example Lane',
          'city' => 'Laraville',
          'state' => 'ON',
          'zip' => '17916',
          'additional_information' => 'For tickets, call (555) 555-5555.'
		]);
		
    		// Run de code
        // View de concert listing
        $this->visit('/concerts/'.$concert->id);
	
		    // What we expect - asserts
        // See the concert details
        $this->see('The Red Chord');
        $this->see('with Animosity and Lethargy');
        $this->see('December 13, 2016');
        $this->see('8:00pm');
        $this->see('32.50');
        $this->see('The Mosh Pit');
        $this->see('123 Example Lane');
        $this->see('Laraville, ON, 17916');
        $this->see('For tickets, call (555) 555-5555.');
  }
}
