# Factory Method

The factory creational design pattern basically allows the application to create objects related to a super-class whilst accomodating different concretions. Think of a `Vehicle` super-class and different types of vehicle as concretions.

Using the factory method, we are also able to perform logic before or after the creation of the concretion. 

I know this definition is fairly vague - see Usage

## Reference

[Refactoring Guru](https://refactoring.guru/design-patterns/factory-method)

## Usage

1. Define `Creator` classes that extend the base `VehicleCreator` class and implement it's abstract method which should be the one that generates the actual concrete object. In this example, the creator classes would instantiate different vehicle objects when we call the `->createVehicle()` method. We can be confident that any returned object is typesafe irrelevant of which specific Creator class we've used. 
1. By using a Creator class that extends a common super-class, we can also handle more complex operations that require more steps too. We would do this by adding a method to the base `Creator` class that handles this - which makes this available to all it's concretions. In the example I've created, I've simulated 'registering' a vehicle by providing a colour to our Creator class's more complex method `->createAndRegisterVehicle()`. This acts as a wrapper to ensure that all vehicle creation that involves this more complex process is done the same way. In this case, I've just ensured that each vehicle class returns a string of it's type (Truck::class returns 'truck') - so we can see that the different creators are utilizing the correct Vehicle types. The 'registration' is composition of a string outlining what colour and type the object created is and returning that so we can see it. 

## Test it yourself

Send a GET request to `{base_url}/api/factory`. 