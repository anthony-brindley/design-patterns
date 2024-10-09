# Visitor Pattern

lets you separate algorithms from the objects on which they operate

## References

[Refactoring Guru](https://refactoring.guru/design-patterns/visitor)

### Usages

Use this pattern if you have a series of classes that you need to add common(ish) functionaity to but to which adding methods relating to that functionality wouldn't make sense OR could cause issues down the line. The example provided on Refactoring guru is that of having a few related classes that represent graph/map elements, and adding a 'visitor' class that contains references to the relevant method calls on each class that allow the user to obtain the information needed to complete the functionality (XML exporting).

It's key that naming conventions are observed in order to reduce cognitive load. The Concrete visitor class (and it's interface) should contain all the methods named like `visit{Object}` - so a `Square` class would have `visitSquare`. 

The only change needed to be implemented on the target classes is a general `accept` method, which can also be used by other Visitor classes should there be need to attach other functionality in the future.

