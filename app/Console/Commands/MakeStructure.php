<?php

namespace App\Console\Commands;

use Illuminate\Support\Str;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Artisan;

class MakeStructure extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:section {name=name} {--ob} {--seed} {--request} {--resource}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $model = $this->argument('name');
        if ($this->confirm('sure you want to continue with name ' . $model , true)) {
            $folderNmae = strtolower(Str::plural(class_basename($model)));
            
            // create model with mogration 
                Artisan::call('make:model',['name' => 'Models/'.$model,'-m' => true]);
            // // #create model with mogration 

            // // create Controller 
                Artisan::call('make:controller', ['name' => 'Admin/'.$model.'Controller']);
                File::copy('app/Http/Controllers/Admin/CopyController.php',base_path('app/Http/Controllers/Admin/'.$model.'Controller.php'));
                file_put_contents('app/Http/Controllers/Admin/'.$model.'Controller.php', preg_replace("/Copy/", $model, file_get_contents('app/Http/Controllers/Admin/'.$model.'Controller.php')));
                file_put_contents('app/Http/Controllers/Admin/'.$model.'Controller.php', preg_replace("/copys/", $folderNmae, file_get_contents('app/Http/Controllers/Admin/'.$model.'Controller.php')));
            // // #create Controller 

            // // create folder and blade file 
                File::makeDirectory('resources/views/admin/'.$folderNmae);
                File::copy('resources/views/admin/layout/partial/copy.blade.php',base_path('resources/views/admin/'.$folderNmae.'/index.blade.php'));
            // // #create folder and blade file 

            // // create Repository 
                File::copy('app/Repositories/Eloquent/CopyRepository.php',base_path('app/Repositories/Eloquent/'.$model.'Repository.php'));
                file_put_contents('app/Repositories/Eloquent/'.$model.'Repository.php', preg_replace("/CopyRepository/", $model.'Repository', file_get_contents('app/Repositories/Eloquent/'.$model.'Repository.php')));
                file_put_contents('app/Repositories/Eloquent/'.$model.'Repository.php', preg_replace("/ICopy/", 'I'.$model , file_get_contents('app/Repositories/Eloquent/'.$model.'Repository.php')));
                file_put_contents('app/Repositories/Eloquent/'.$model.'Repository.php', preg_replace("/Copy/", $model , file_get_contents('app/Repositories/Eloquent/'.$model.'Repository.php')));
            // // #create Repository 
            
            // // create interface 
                File::copy('app/Repositories/Interfaces/ICopy.php',base_path('app/Repositories/Interfaces/I'.$model.'.php'));
                file_put_contents('app/Repositories/Interfaces/I'.$model.'.php', preg_replace("/ICopy/", 'I'.$model , file_get_contents('app/Repositories/Interfaces/I'.$model.'.php')));
            // // #create interface 

            // connect interface and repository
                file_put_contents(
                    'app/Providers/RepositoryServiceProvider.php'
                    , preg_replace(
                        "/#connect_here/"
                        ,'$this->app->bind(I'.$model.'::class  , '.$model.'Repository::class   );
        #connect_here' , 
                        file_get_contents('app/Providers/RepositoryServiceProvider.php')
                    )
                );

                file_put_contents(
                    'app/Providers/RepositoryServiceProvider.php'
                    , preg_replace(
                        "/#clases_Definition_here/"
                        ,'use App\Repositories\Interfaces\I'.$model.';
use App\Repositories\Eloquent\\'.$model.'Repository;
#clases_Definition_here' , 
                        file_get_contents('app/Providers/RepositoryServiceProvider.php')
                    )
                );
            // #connect interface and repository

            // create web routes  
                file_put_contents('routes/web.php',
                 preg_replace(
                     "/#new_routes_here/",
                     "
        /*------------ start Of ".$folderNmae." ----------*/
            Route::get('".$folderNmae."', [
                'uses'      => '".$model."Controller@index',
                'as'        => '".$folderNmae.".index',
                'title'     => '".$model."',
                'icon'      => '<i class=\"la la-search\"></i>',
                'type'      => 'parent',
                'sub_route' => false,
                'child'     => [ '".$folderNmae.".store', '".$folderNmae.".update', '".$folderNmae.".delete']
            ]);

            # ".$folderNmae." store
            Route::post('".$folderNmae."/store', [
                'uses'  => '".$model."Controller@store',
                'as'    => '".$folderNmae.".store',
                'title' => ' اضافة ".$model."'
            ]);

            # ".$folderNmae." update
            Route::put('".$folderNmae."/{id}', [
                'uses'  => '".$model."Controller@update',
                'as'    => '".$folderNmae.".update',
                'title' => 'تحديث ".$model."'
            ]);

            # ".$folderNmae." delete
            Route::delete('".$folderNmae."/{id}', [
                'uses'  => '".$model."Controller@destroy',
                'as'    => '".$folderNmae.".delete',
                'title' => 'حذف ".$model."'
            ]);
        /*------------ end Of ".$folderNmae." ----------*/

        #new_routes_here
                     " , 
                     file_get_contents('routes/web.php')
                ));

                Artisan::call('route:clear');
            // #create web wroutes 

            // create observer (optional) 
                if ($this->option('ob')) {
                    Artisan::call('make:observer', ['name' => $model.'Observer']);
                }
            // #create observer (optional) 

            // create seeder (optional) 
                if ($this->option('seed')) {
                    Artisan::call('make:seeder', ['name' => $model.'TableSeeder']);
                }
            // #create seeder (optional) 
            
            // create request (optional) 
                if ($this->option('request')) {
                    Artisan::call('make:request', ['name' => 'Admin/' . Str::plural($model) .'/Store']);
                }
            // #create request (optional) 
            
            // create request (optional) 
                if ($this->option('resource')) {
                    Artisan::call('make:resource', ['name' => 'Api/' . $model .'Resource']);
                }
            // #create request (optional) 

            // call back  
            $this->info('New Repo , Interface , Controller , Model , DataBase Migrate , optional [seeder , form request , observer] ,Blade Folder And Blade File  created ! ');
            // #call back
       
        }
    }
}
