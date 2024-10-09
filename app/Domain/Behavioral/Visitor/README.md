# Visitor Pattern

lets you separate algorithms from the objects on which they operate

## References

[Refactoring Guru](https://refactoring.guru/design-patterns/visitor)

### Usages

Use this pattern if you have a series of classes that you need to add common(ish) functionaity to but to which adding methods relating to that functionality wouldn't make sense OR could cause issues down the line. The example provided on Refactoring guru is that of having a few related classes that represent graph/map elements, and adding a 'visitor' class that contains references to the relevant method calls on each class that allow the user to obtain the information needed to complete the functionality (XML exporting).

It's key that naming conventions are observed in order to reduce cognitive load. The Concrete visitor class (and it's interface) should contain all the methods named like `visit{Object}` - so a `Square` class would have `visitSquare`. 

The only change needed to be implemented on the target classes is a general `accept` method, which can also be used by other Visitor classes should there be need to attach other functionality in the future.


### Specifics / Discussion

Imagine we have a company made up of departments in turn made up of employees. Each of these is a separate 'domain' - they have different functionality, possibly different architectures, method signatures etc. So, if we wanted to produce a company report that encompassed information that needed to be gleaned from each of these domains, we could approach this in a couple of different ways:

1. Add Reporting-based functionality to each of the domains and associated objects/processes contained within them. Some could argue that on the face of it this makes sense because you can tailor the functionality to each situation and then return exactly what's needed. However, we could argue that this would contradict the focus/responsibility of the domain which would typically be more focussed on delivering contextual functionality rather than providing reporting functions. 
1. Contain the new functionality outside of the domain but keep it encapsulated and flexible AND at the same time, open up the domains to a simple, reusable method of accessing individual methods should requirements change in the future. This is what the visitor pattern provides. 

### How to implement

#### 1. Visitor Class & Interface

Given that we have a specific 'context' around this functionality, we should be able to create a single class that encapsulates the logic around interacting with all the 'subject' classes. This is the Visitor class which will eventually contain the methods required to interact with each object. We should define a `Visitor` interface too which we will populate as we go.

Since this `Visitor` example is around reporting functionality, lets create a `ReportingVisitor` class that implements this new interface.

#### 2. Existing Domain Objects

We would need to make a change to any domain objects that would be involved in implementing this functionality. However, this change is a relatively simple one because it's conceptually the same across all objects and doesn't require any alteration to existing code (see open/closed principle). We need to add an `->accept()` method to Objects that our visitor class should be able to interact with. We can enforce this via an interface such as `IsVisitable`. This new method should accept an object of the Visitor interface.

Inside this method, we should call the method on the Visitor that relates to the object we are adding the method to. So, say it's a `Department` object, we would introduce a `->visitDepartment()` method on the Visitor class (and update the interface accordingly). This new method should accept an instance of the `Department`. 

> Conceptually, we are adding a 'hook' into an object that we can pass a visitor instance into. Then, we pass an instance of the hooked object into the corresponding method on the Visitor class. We are then able to encapsulate this logic away from the hooked object itself. 

#### 3. Handling

Once all relevant objects are `hooked`, we are able to use the Visitor class to help us provide the required reporting functionality. Within each of the Object specific methods, we are able to add any handling logic that we need without any fear that this logic would affect the hooked classes themselves. 

## API Testing

I've added an API route so you can test the functionality and play about with it. Simply send a get request to `{base_url}/api/visitor`.