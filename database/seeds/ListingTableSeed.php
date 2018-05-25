<?php

use Illuminate\Database\Seeder;

class ListingTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('id_ID');
 
        foreach (range(1, 100) as $loop) {
            DB::table('listings')->insert([
                'listing_slug'       => str_slug($faker->text(100)),
                'listing_title'      => $faker->text(100),
                'listing_tagline'      => $faker->text(100),
                'city'      => $faker->city,
                'full_address'      => $faker->address,
                'phone'      => '0808080808',
                'website'      => $faker->domainName,
                'listing_description'    => $faker->paragraph,
                'accept_booking'      => 'y',
                'accept_payment'      => 'y',
                'good_for'      => $faker->text,
                'price_range'      => $faker->text(20),
                'price_from'      => $faker->numberBetween(1,6),
                'price_to'      => $faker->numberBetween(1,6),
                'image_feature'      => $faker->text,
                'allow_gallery'      => 'y',
                'listing_status'      => 'pending',
                
            ]);
        }
    }
}
