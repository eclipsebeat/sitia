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
		$this->call('SeksiTableSeeder');
		$this->call('RakTableSeeder');
		$this->call('BoxTableSeeder');
		$this->call('DepartemenTableSeeder');
		$this->call('KanwilTableSeeder');
		$this->call('KantorTableSeeder');
		$this->call('RolesTableSeeder');
		$this->call('ArsipTableSeeder');
		$this->call('PinjamTableSeeder');
	}

}

class UserTableSeeder extends Seeder {

	public function run()  
    {  
		{

		DB::table('users')->delete();

		$users = new User;
        $users->nip = '000000000000000';
        $users->username = 'admin';
        $users->nmdepan = 'admin';
        $users->nmbelakang = 'admin';
        $users->password = '$2y$10$XOOz4RxEazfZk8WELZQKGOfa1Xuq48KslhOnHOAQ6tJ7miVZRx1.i';
		$users->role = 1;
        $users->save();

        $users = new User;
        $users->nip = '111111111111111111';
        $users->username = 'staff';
        $users->nmdepan = 'staff';
        $users->nmbelakang = 'staff';
        $users->password = '$2y$10$XOOz4RxEazfZk8WELZQKGOfa1Xuq48KslhOnHOAQ6tJ7miVZRx1.i';
		$users->role = 2;
        $users->save();

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
		    'jenis' => $faker->word,
			'retensi' => 5
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

class SeksiTableSeeder extends Seeder {

	public function run()  
    {  
    	$faker = Faker\Factory::create();
        
        for ($i = 0; $i < 10; $i++)
		{
		  Seksi::create(array(
		    'Seksi' => $faker->word,
			'gudang_id' => $faker->numberBetween($min = 1, $max = 10)
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
		    'rak' => $faker->word,
			'seksi_id' => $faker->numberBetween($min = 1, $max = 10)
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
		    'box' => $faker->word,
			'rak_id' => $faker->numberBetween($min=1, $max=10)
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
		  	'files' => 'batas_akhir_tahun.pdf',
		    'jenis_arsip_id' => $faker->numberBetween($min = 1, $max = 10),
			'gudang_id' => $faker->numberBetween($min = 1, $max = 10),
			'rak_id' => $faker->numberBetween($min = 1, $max = 10),
			'box_id' => $faker->numberBetween($min = 1, $max = 10),
			'seksi_id' => $faker->numberBetween($min = 1, $max = 10),
			'user_id' => '2'
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

class PinjamSeeder extends Seeder {
	public function run()
	{
		$faker = Faker\Factory::create();
        
        for ($i = 0; $i < 10; $i++)
		{
		  Pinjam::create(array(
		  	
		    'arsip_id' => $faker->numberBetween($min = 1, $max = 10),
			'user_id' => $faker->numberBetween($min = 1, $max = 2),
			'status' => $faker->numberBetween($min = 1, $max = 2),
			'time_pinjam' => $faker->dateTimeThisYear,
			'time_kembali' => $faker->dateTimeThisYear
		  ));
		}
	}
}

class RolesTableSeeder extends Seeder {

	public function run()  
    {  		
		DB::table('roles')->delete();

        $adminRole = new Role;
        $adminRole->name = 'Admin';
        $adminRole->save();

        $standRole = new Role;
        $standRole->name = 'Staff';
        $standRole->save();

        $user = User::where('username','=','admin')->first();
        $user->attachRole( $adminRole );

        $user = User::where('username','=','staff')->first();
        $user->attachRole( $standRole );
		
    }
}