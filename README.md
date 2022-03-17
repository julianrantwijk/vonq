Vonq example project.

Please be aware, this code is for demonstration purposes only. 
The project is unfinished, but will allow me to explain (domain driven) design principles
and prove my ability to build complex systems.

This architecture is quite abstract, but allows advanced configuration meant for scaling.

- Currently, I've added Doctrine repositories, but other storage mechanisms are possible.
- Because of the abstractions, the classes are simple, small and testable.
- The CQRS pattern splits the read and write operations. While read operations are 
most likely synced, write operations could be async.
- 95% framework-agnostic. Concrete implementations are configured using the DI container.
With little effort, the business logic could be migrated to Slim / Laravel.


