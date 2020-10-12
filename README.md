## **Explain my project**  
  
**Project is lumen/laravel for make Api system for manage AND select and searching in Jobs**  
  
**Architecture**  
I used of Design Patterns  **Strategy and Repository**  
  
**Repository** for data maybe in future we want using of mysql or postgres or any database  
  
**Strategy** for management Behavior of app maybe in future we want that will create new Behavior  for my app.  
  
**This two strategy and repository registered in AppServiceProvider  
for Depency Injection BY self laravel lumen  as service provider**  
  
please checking file AppServiceProvider.php  
  

     $this->app->bind(  
       'App\Repositories\RepositoryInterface','App\Repositories\ORM\CsvRepository'  
    );  
      
      $this->app->bind(  
        'App\Strategy\StrategyDataSource','App\Strategy\CsvDataSource'  
    );  

   
## _Testing_  
  
  
**I create 4 test for routes and passed.**  
  
## **Run project**  
  
Project Runs well also with successfully.  
first of all using of :  
  

     composer self-update 
     composer update    

for run project must enter this command in path root project:  
  

     php -S 127.0.0.1:8000 -t public  

 
## **_Clarity_**  
  
**I used of comment for main code and used of psr1 and psr2  
also php code sniffer in project**  
  
## **Algorithm**  
  
**I design a good Algorithm for select best position of csv file that is Available  
in my code.**  
  
## **How to using of url Api?**  
  
First you must going to path **route/web.php**  
  
**routes are** :  
  
**GET : /Api/searchById/{id}** ID LIKE AS 2  
    
**GET :  /Api/searchByCountry/{country}** country LIKE AS ES  
   
**GET :  /Api/searchByCity/{city}** city like as Berlin  
  
**POST  : /Api/searchByBestPosition** for this should send post **key 'skills'**  
  
like as '**PHP,JAVASCRIPT,HTML,CSS**' Seperate By **comma**
