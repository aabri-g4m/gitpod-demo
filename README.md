# Your project name

This project is based on https://spiral.dev/docs.
This is where you pick up and share the knowledge about what you do.

## Running

``` 
# install dependencies
composer install 

# download spiral server binary 
./vendor/bin/spiral get-binary

# make sure spiral is set up 
php app.php configure

# run server 
./spiral serve -v -d
```
Use bloom rpc https://github.com/bloomrpc/bloomrpc to make calls to gRPC endpoints directly. 
See `.rr.yaml` to figure out which proto file to use and which port is the server running on. 
You will get an error - this is the time to change your service implementation in `Application\Grpc`

# Writing tests
Each service should have a corresponding test file.
Relevant test stubs are created with rudimentary assertions (return type).
Tests should be enriched as the development goes, with sensible level of detail, service methods are not different
than controller methods (in temrs of http framework).
Not everything can and should be tested through those unit tests other tests should be added too.

Thoughts on testing approach:
 - Use mocks (and Mockery or an alternative) to provide collaborators to the service
 - Do NOT mock gRPC message objects these are Value Object and can be just instantiated
