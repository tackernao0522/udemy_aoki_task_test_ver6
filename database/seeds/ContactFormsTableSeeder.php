<?php

use App\Models\ContactForm;
use Illuminate\Database\Seeder;

class ContactFormsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(ContactForm::class, 200)->create();
    }
}
