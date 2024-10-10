# Builder Pattern

This pattern helps applications build complex objects step by step including variations.

## References
[Refactoring Guru](https://refactoring.guru/design-patterns/builder)

### Usages

The example provided is of building a house. In an abstract way, all houses have, floors, walls, windows, doors etc. So, initially it may seem obvious to create a base `House` class and then a multitude of `concretions` to cover off the different types of house we want to build. Whilst this could be valid if you have a small or fixed set of possible house types, it's not great when trying to probide flexibility on the fly. This is why the builder method shines.

In this application, I've used the Builder method to implement Building creation - specifically a Condo and a Towerblock. I've used a `Foreman` class as a `Director` since a Foreman should know how to build each different building type. Since the 'per floor' process is typically the same (you can't install windows without having built the walls etc) I've encapsulated this 'knowledge' into the Foreman's `->build()` method. There's some other business logic in here too - you can only create 1 roof, to the `->buildRoof()` method is only called once (and it's after all the floors/walls have been built). Then the specifics for each 'element' (wall,floor,roof etc) is provided by the `Builder` classes themselves. However, in order to prevent having to have different subclasses for each building type variant (tower block with 8 floors, tower block with 5 floors), we can accept these specifics at runtime.

## Try it yourself

Send a GET request to `{base_url}/api/builder` to see the creational steps.