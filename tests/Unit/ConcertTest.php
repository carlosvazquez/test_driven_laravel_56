<?php

namespace Tests\Unit;

use Carbon\Carbon;
use Tests\TestCase;
use App\Models\Concert;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ConcerTest extends TestCase
{
  use RefreshDatabase;

  /** @test */
  public function can_get_formatted_date()
  {
     // Create concerts with known date
     $concert = factory(Concert::class)->make([
       'date' => Carbon::parse('2016-12-01 8:00pm')
     ]);

     // Verify the date is formated as expected 
     $this->assertEquals('December 1, 2016', $concert->formatted_date);
  }
  /** @test */
  public function can_get_formatted_start_time()
  {
     // Create concerts with known date
     $concert = factory(Concert::class)->make([
      'date' => Carbon::parse('2016-12-01 17:00:00')
    ]);
    $this->assertEquals('5:00pm', $concert->formatted_start_time);
  }
  /** @test */
  public function can_get_ticket_price_in_dollars()
  {
     // Create concerts with known date
     $concert = factory(Concert::class)->make([
      'ticket_price' => 32000
    ]);
    $this->assertEquals('320.00', $concert->ticket_price_in_dollars);
  }
  /** @test */
  public function user_cannot_view_unpublished_concert_listing()
  {
    $concert = factory(Concert::class)->states('unpublished')->create();

    $response = $this->get('/concerts/'.$concert->id);
    $response->assertStatus(404);
  }
  /** @test */
  public function concerts_with_published_date_are_listing()
  {
    $publishedConcertA = factory(Concert::class)->states('published')->create();
    $publishedConcertB = factory(Concert::class)->states('published')->create();
    $unpublishedConcertC = factory(Concert::class)->states('unpublished')->create();
   
    $publisedConcerts = Concert::published()->get();

    $this->assertTrue($publisedConcerts->contains($publishedConcertA));
    $this->assertTrue($publisedConcerts->contains($publishedConcertB));
    $this->assertFalse($publisedConcerts->contains($unpublishedConcertC));
  }
}

