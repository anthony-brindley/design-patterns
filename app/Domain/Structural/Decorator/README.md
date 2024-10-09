# Decorator Pattern

Pattern that allows you to attach behaviours and functionality to objects by wrapping around them. Useful in instances where you would consider extending a class but for some reason can't (base class is part of a library or extending would cause issues elsewhere).

This comes down to the inheritance vs composition issue - if we have a class we want to extend with this new functionality, we have to create a subclass. What if there's functionality we want to add to this class from another parent? We can only inhereit from a single parent and so are restricted. A decorator uses composition to 'wrap' the underlying class and provide extra functionality from 'wherever' via composition. 

## References

[Refactoring Guru](https://refactoring.guru/design-patterns/decorator)

### Usages