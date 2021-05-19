// Author Routes
router.on('/', 
   () => AuthorController.index());
router.on('/authors', 
   () => AuthorController.index());
router.on('/authors/show/:id',
   ({ data }) => AuthorController.show(data));
router.on('/authors/edit/:id', 
   ({ data }) => AuthorController.edit(data));
router.on('/authors/store',
   () => AuthorController.store());
router.on('/authors/update/:id', 
   ({ data }) => AuthorController.update(data));
router.on('/authors/create',
   () => AuthorController.create());
router.on('/authors/delete/:id',
   ({ data }) => AuthorController.destroy(data));

// Book Routes
router.on('/books', 
() => BookController.index());
router.on('/books/show/:id',
({ data }) => BookController.show(data));
router.on('/books/edit/:id', 
({ data }) => BookController.edit(data));
router.on('/books/store',
() => BookController.store());
router.on('/books/update/:id', 
({ data }) => BookController.update(data));
router.on('/books/create',
() => BookController.create());
router.on('/books/delete/:id',
({ data }) => BookController.destroy(data));

// Book Routes
router.on('/publishers', 
() => PublisherController.index());
router.on('/publishers/show/:id',
({ data }) => PublisherController.show(data));
router.on('/publishers/edit/:id', 
({ data }) => PublisherController.edit(data));
router.on('/publishers/store',
() => PublisherController.store());
router.on('/publishers/update/:id', 
({ data }) => PublisherController.update(data));
router.on('/publishers/create',
() => PublisherController.create());
router.on('/publishers/delete/:id',
({ data }) => PublisherController.destroy(data));

   //Professor Routes
router.on('/professor', 
   () => ProfessorController.index());
router.on('/professor/show/:id',
   ({ data }) => ProfessorController.show(data));
router.on('/professor/edit/:id', 
   ({ data }) => ProfessorController.edit(data));
router.on('/professor/store',
   () => ProfessorController.store());
router.on('/professor/update/:id', 
   ({ data }) => ProfessorController.update(data));
router.on('/professor/create',
   () => ProfessorController.create());
router.on('/professor/delete/:id',
   ({ data }) => ProfessorController.destroy(data));

router.resolve();