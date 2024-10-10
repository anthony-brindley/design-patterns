# Strategy Pattern

Lets you define a family of algorithms, put each of them into a separate class, and make their objects interchangeable

## References

[Refactoring Guru](https://refactoring.guru/design-patterns/strategy)

### Usages

I've seen this pattern used mostly in regards to Payment Methods. Essentially a 'payment' is made the same way in terms of process (see State pattern), but the implementation details can vary between different methods. Typically, we would define a 'default' payment strategy on the container, and then resolve that into some kind of `PaymentHandler` class that facilitates the actual payment. If we have provided the user a chance to change strategy, we then update the `PaymentHandler` with the chosen strategy at runtime and continue to interact with the class in the same way. 

There are some key points that make this pattern work:

- All strategies must conform to a common interface the ensures they are interchangeable (obviously the purpose of an interface :)
- We must interact with a `Handler` class of some description that has a 'selected' strategy. This handler class will call the common 'executable' method on whichever strategy is currently selected and pass any data to the strategy.
- This `Handler` class has no actual knowledge of the specifics of the Strategies it handles other than the common 'executable' method signature. This allows for entirely different and totally unrelated implementation details to be encapsulated in the strategy classes themselves. 

This allows for flexibility and easy extension (adding extra Strategies) at a later date. 

## Testing it yourself

I've added a working example of route-planning (based off the example in Refactoring Guru). You can see from the code that:

- We have a `Navigator` class which acts as our `Handler` class. I have set a default strategy to be passed in on class instantiation.
- We can use the `Navigator` class straight away by calling the `->navigate()` method which is our 'executable' method. 
- This will then call the `->buildRoute()` method on the strategy that's set as the property in the `Handler` class and return it's output
- We can switch strategies by calling the `->setStrategy()` method on the `Navigator` class
- And we then interact with it the same way (by calling the `->navigate()` method) and our alternative strategy is used and it's output returned.

You can send a simple GET request to `{base_url}/api/strategy` and test this for yourself.