<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('UserTableSeeder');
		$this->call('JenisArsipTableSeeder');
		$this->call('GudangTableSeeder');
		$this->call('RakTableSeeder');
		$this->call('SeksiTableSeeder');
		$this->call('BoxTableSeeder');
		$this->call('DepartemenTableSeeder');
		$this->call('KanwilTableSeeder');
		$this->call('ArsipTableSeeder');
		$this->call('KantorTableSeeder');
	}

}

class UserTableSeeder extends Seeder {

	public function run()  
    {  
        $faker = Faker\Factory::create();

        for ($i = 0; $i < 10; $i++)
		{
		  User::create(array(
		    'nip' => $faker->randomDigit,
		    'username' => $faker->userName,
		    'nmdepan' => $faker->firstName,
		    'nmbelakang' => $faker->lastName,
		    'password' => 'password'
		  ));
		}
    }
}


class JenisArsipTableSeeder extends Seeder {

	public function run()  
    {  
    	$faker = Faker\Factory::create();
        
        for ($i = 0; $i < 10; $i++)
		{
		  JenisArsip::create(array(
		    'jenis' => $faker->word
		  ));
		}
    }
}

class GudangTableSeeder extends Seeder {

	public function run()  
    {  
    	$faker = Faker\Factory::create();
        
        for ($i = 0; $i < 10; $i++)
		{
		  Gudang::create(array(
		    'gudang' => $faker->word
		  ));
		}
    }
}

class RakTableSeeder extends Seeder {

	public function run()  
    {  
    	$faker = Faker\Factory::create();
        
        for ($i = 0; $i < 10; $i++)
		{
		  Rak::create(array(
		    'rak' => $faker->word
		  ));
		}
    }
}

class SeksiTableSeeder extends Seeder {

	public function run()  
    {  
    	$faker = Faker\Factory::create();
        
        for ($i = 0; $i < 10; $i++)
		{
		  Seksi::create(array(
		    'Seksi' => $faker->word
		  ));
		}
    }
}

class BoxTableSeeder extends Seeder {

	public function run()  
    {  
    	$faker = Faker\Factory::create();
        
        for ($i = 0; $i < 10; $i++)
		{
		  Box::create(array(
		    'box' => $faker->word
		  ));
		}
    }
}

class DepartemenTableSeeder extends Seeder {

	public function run()  
    {  
    	$faker = Faker\Factory::create();
        
        for ($i = 0; $i < 10; $i++)
		{
		  Departemen::create(array(
		    'departemen' => $faker->word
		  ));
		}
    }
}

class KanwilTableSeeder extends Seeder {

	public function run()  
    {  
    	$faker = Faker\Factory::create();
        
        for ($i = 0; $i < 10; $i++)
		{
		  Kanwil::create(array(
		  	'departemen_id' => $faker->numberBetween($min = 1, $max = 10),
		    'kanwil' => $faker->word
		  ));
		}
    }
}

class ArsipTableSeeder extends Seeder {

	public function run()  
    {  
    	$faker = Faker\Factory::create();
        
        for ($i = 0; $i < 10; $i++)
		{
		  Arsip::create(array(
		  	'arsip' => $faker->words($nb = 5),
		    'jenis_arsip_id' => $faker->numberBetween($min = 1, $max = 10),
			'gudang_id' => $faker->numberBetween($min = 1, $max = 10),
			'rak_id' => $faker->numberBetween($min = 1, $max = 10),
			'box_id' => $faker->numberBetween($min = 1, $max = 10),
			'seksi_id' => $faker->numberBetween($min = 1, $max = 10),
			'user_id' => $faker->numberBetween($min = 1, $max = 10),
		  ));
		}
    }
}

class KantorTableSeeder extends Seeder {

	public function run()  
    {  
    	$faker = Faker\Factory::create();
        
        for ($i = 0; $i < 10; $i++)
		{
		  Kantor::create(array(
		  	'kanwil_id' => $faker->numberBetween($min = 1, $max = 10),
		  	'kantor' => $faker->words,
			'alamat' => $faker->words,
			'telpon' => $faker->words,
			'fax' => $faker->words,
			'email' => $faker->email,
		));
		}
    }
}