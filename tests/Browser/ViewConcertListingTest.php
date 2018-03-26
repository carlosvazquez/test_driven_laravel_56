<?php

namespace Tests\Browser;

use App\Models\Concert;
use Carbon\Carbon;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ViewConcertListingTest extends DuskTestCase
{
    use DatabaseMigrations;

    /** @test */
    public function user_can_view_a_published_concert_listing()
    {
        // Settings for run test
        // Create a concert - mockup
        // $concert = factory(Concert::class)->create();
        $concert = Concert::create([
            'title' => 'The Red Chord',
            'subtitle' => 'with Animosity and Lethargy',
            'date' => Carbon::parse('2016-12-01 8:00pm'),
            'ticket_price' => 3250,
            'venue' => 'The Mosh Pit',
            'venue_address' => '123 Example Lane',
            'city' => 'Laraville',
            'state' => 'ON',
            'zip' => '17916',
            'additional_information' => 'For tickets, ca5ll (555) 555-555.',
            'published_at' => Carbon::parse('-1 week'),
          ]);

          $this->browse(function (Browser $browser) use ($concert) {
            $browser->visit('/concerts/'.$concert->id)
                    ->assertSee('The Red Chord')
                    ->assertSee('with Animosity and Lethargy')
                    ->assertSee('December 1, 2016')
                    ->assertSee('8:00pm')
                    ->assertSee('32.50')
                    ->assertSee('The Mosh Pit')
                    ->assertSee('123 Example Lane')
                    ->assertSee('Laraville, ON 17916')
                    ->assertSee('For tickets, ca5ll (555) 555-555.');
        });
    }
}
