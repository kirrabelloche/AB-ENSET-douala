<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        DB::table('role_user')->truncate();

        $admin =  User::create([
            'name' => 'admin',
            'email' => 'kirraridibo@gmail.com',
            
            'password' => Hash::make('123123')

            ]);
           $autor_post = User::create([
                'name' => 'autor_post',
                'email' => ' ',
               
                'password' => Hash::make('123123')
    
                ]);

                $profeseurs = User::create([
                    'name' => 'Profeseurs',
                    'email' => 'profeseurs@gmail.com',
                  
                    'password' => Hash::make('123123')
        
                    ]);
                   $chef_departement =  User::create([
                        'name' => 'chef_departement',
                        'email' => 'chef_dep@gmail.com',
                        
                        'password' => Hash::make('123123')
            
                        ]);
                       $utilisateur =  User::create([
                            'name' => 'utilisateur',
                            'email' => 'utilisateur@gmail.com',
                            
                            'password' => Hash::make('123123')
                
                            ]);
                            $adminRole = Role::where('name', 'admin')->first();
                            $autor_postRole = Role::where('name', 'autor_post')->first();
                            $profeseursRole = Role::where('name', 'Profeseurs')->first();
                            $chef_departementRole = Role::where('name', 'chef_departement')->first();
                            $utilisateurRole = Role::where('name', 'utilisateur')->first();

                            $admin->roles()->attach($adminRole);
                            $autor_post->roles()->attach($autor_postRole);
                            $profeseurs->roles()->attach($profeseursRole);
                            $chef_departement->roles()->attach($chef_departementRole);
                            $utilisateur->roles()->attach($utilisateurRole);

        }
}
