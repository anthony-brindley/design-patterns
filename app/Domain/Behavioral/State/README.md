# State Pattern

Lets an object alter its behavior when its internal state changes. It appears as if the object changed its class

## References

[Refactoring Guru](https://refactoring.guru/design-patterns/state)

### Usages

We would use the State pattern when we want to allow an object to change it's behaviour dependent on it's current state. A good example would be 'locking' or 'unlocking' a class - when locked we would be unable to edit or update any values, whereas when unlocked we can do both of those functions.

Each possible 'state' should be defined as a class, which would contain it's own behaviour, and all states provide a common method (defined via interface and/or abstract base class) that gets called when its time to transition the object to a different state. 


## Example

I've created a working example of a 'Payment' transaction. When we process a payment our transaction goes through a number of 'states':

- PENDING: A payment object is created
- ATTEMPTED: We are attempting to make a payment. This may require integration with an external service for instance
- COMPLETED: Payment was successfully completed
- FAILED: Payment failed for some reason

You can see by looking through the code that I've created that all the logic for the entire payment process is encapsulated logically and offers a lot of flexibility to the application. I've created a `Payment` object which represents a transaction or user behaviour. 

> I've provided an 'initial' state property since we want all Payments in this application to start from the same initial state, but it's trivial to accept an alternate initial state witin the constructor if your object can have a variable initial state. 

We then have a main `->handle()` method which acts as the 'trigger' to start the payment handling process. The process in this example is essentially automated - i.e it's contained within a do/while loop that will keep looping whilst we are provided a `$nextState` object. The business logic and handling of each state is contained within concrete `State` classes - each of which represents a step in the process. The beauty of this approach is that each state is able to conditionally determine the next step of the process based on it's own logic. So - as demonstrated in the `Attempted` class - we can run some logic and then select an appropriate next step, which is then returned to the Payment object and we proceed to the next iteratioo of the loop. When we've finished all processing, we simply need to return a null next step value and it breaks the loop. 

There are a couple of helper methods which should be mentioned:

1. `->transitionTo()`: This method helps ensure that transitions between States is done in a uniform manner which in this instance allows us to add a note about the transition.
1. `->logEvent()`: This is a little helper method added simply to allow us to track the process and be able to return it to the user to shed light on what's happened as part of their request

## Test it yourself

You can use this pattern by sending a simple GET request to `{base_url}/api/state`.