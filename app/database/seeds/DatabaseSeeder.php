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
		    'nip' => '000000000000000',
		    'username' => 'admin',
		    'nmdepan' => 'admin',
		    'nmbelakang' => 'admin',
		    'password' => '$2y$10$XOOz4RxEazfZk8WELZQKGOfa1Xuq48KslhOnHOAQ6tJ7miVZRx1.i'
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
		  Jenis_Arsip::create(array(
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
		Departemen::create(array(
		    'departemen' => 'Kementerian Keuangan',
		    'logo' => 'logo.png'
		));
    }
}

class KanwilTableSeeder extends Seeder {

	public function run()  
    {  
    	
		Kanwil::create(array(
		  'departemen_id' => '1',
		  'kanwil' => 'Kanwil DJP Provinsi Sumatera Barat'
		));
    }
}

class ArsipTableSeeder extends Seeder {

	public function run()  
    {  
    	$faker = Faker\Factory::create();
        
        for ($i = 0; $i < 10; $i++)
		{
		  Arsip::create(array(
		  	'arsip' => $faker->word($nb = 5),
		  	'files' => $faker->word($nb = 5),
		    'jenis_arsip_id' => $faker->numberBetween($min = 1, $max = 10),
			'gudang_id' => $faker->numberBetween($min = 1, $max = 10),
			'rak_id' => $faker->numberBetween($min = 1, $max = 10),
			'box_id' => $faker->numberBetween($min = 1, $max = 10),
			'seksi_id' => $faker->numberBetween($min = 1, $max = 10),
			'user_id' => $faker->numberBetween($min = 1, $max = 10)
		  ));
		}
    }
}

class KantorTableSeeder extends Seeder {

	public function run()  
    {  		
		  Kantor::create(array(
		  	'departemen_id' => '1',
		  	'kanwil_id' => '1',
		  	'kantor' => 'KPP Payakumbuh',
			'alamat' => 'JL. Sudirman, No. 184-A',
			'telpon' => '(0752) 92281',
			'fax' => '(0752) 92281',
			'email' => 'payakumbuh@pajak.go.id'
		));
		
    }
}