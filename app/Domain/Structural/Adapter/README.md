# Adapter Pattern

Designed to help objects with incompatible interfaces to collaborate

## References

[Refactoring Guru](https://refactoring.guru/design-patterns/adapter)

### Usages

This example uses the square peg/round hole example. A square peg shouldn't fit into a round hole unless it's adapted. We enforce this in the example by using a `RoundPeg` interface which requires a `getRadius` method - which by definition is only applicable to round objects. Clearly a square object wouldn't have a `radius` BUT, you could 'spoof' a radius if you understand that a radius is the distance between the center and outside of a circle. Given that we have a square object, we could use the width of our square and divide it by 2 and it should be rougly equivalent to a radius. 

So, given that we understand this, we pass the `square` object INTO the SquarePeg adapter. We provide the necessary `getRadius` method that ensures the adapter adheres to the relevant `RountPeg` interface but the logic we use to calculate the return value is relevant to our square peg. 

In this way, our adapter 'pretends' to be of the 'correct' type but is basically acting as a facade that we can use to map the necessary methods to our target object. 