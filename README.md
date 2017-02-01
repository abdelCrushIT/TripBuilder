# TripBuilder
## Setup 
1. git clone 
2. in configs.yaml maps yourWorkDirectory/TripBuilder/public to TripBuilder
3. in your hosts file maps 192.168.10.10 TripBuilder (you can change 192.168.10.10 by your IP address)
4. vagrant up
5. vagrant ssh
6. composer install
7. if you change the api address from tripbuilderapi to 'something else' , you have to update the constant 'APIDOMAINE' in the class App\Repositories\CurlRepository to target the new api address. 
