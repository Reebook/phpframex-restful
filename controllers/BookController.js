class BookController {

    static index() {
      fetch('/server/book',
       { headers: {'Accept': 'application/json'}})
        .then((response) => response.json())
        .then((data) => {
          return view('/views/Books/list.html',
           {'title':'Book List',
            'books':data},'content')();}
       )
    }
  
    static show(params) {
      fetch('/server/book/'+params.id,
        { headers: {'Accept': 'application/json'}})
        .then((response) => response.json())
        .then((data) => {
          return view('/views/Books/details.html',
            {'title':'Book Details',
             'books':data,'show':true},'content')();}
       )
    }
  
    static create() {
      var prof  = {'titleName':'','copyright':'',
      'edition':'','language':'','publisher':'','pages':'','author':''};
      return view('/views/Books/details.html',
            {'title':'book Create',
            'books':prof,'create':true},'content')();
    }
  
    static store() {
      var title = Input.get('titleName');
      var copyright = Input.get('copyright');
      var edition = Input.get('edition');
      var language = Input.get('language');
      var publisher = Input.get('publisher');
      var pages = Input.get('pages');
      var author = Input.get('author');
      var prof = {'titleName':title,'copyright':copyright,
      'edition':edition,'language':language,'publisher':publisher,'pages':pages,'author':author};
      fetch('/server/book',
        { headers: {'Content-Type': 'application/json'},
          method: 'POST',
          body: JSON.stringify(prof)})
        .then((data) => {
           router.navigate('/books');
        }
      )
    }
  
    static edit(params) {
      fetch('/server/book/'+params.id,
        { headers: {'Accept': 'application/json'}})
        .then((response) => response.json())
        .then((data) => {
          return view('/views/Books/details.html',
            {'title':'Book Edit',
             'books':data,'edit':true},'content')();}
       )
    }
  
    static update(params) {
      var title = Input.get('titleName');
      var copyright = Input.get('copyright');
      var edition = Input.get('edition');
      var language = Input.get('language');
      var publisher = Input.get('publisher');
      var pages = Input.get('pages');
      var author = Input.get('author');
      var prof = {'titleName':title,'copyright':copyright,
      'edition':edition,'language':language,'publisher':publisher,'pages':pages,'author':author};
      fetch('/server/book/'+params.id,
        { headers: {'Content-Type': 'application/json'},
          method: 'PUT',
          body: JSON.stringify(prof)})
        .then((data) => {
           router.navigate('/books');
         }
       )
    }
  
    static destroy(params) {
      fetch('/server/book/'+params.id,
        { method: 'DELETE'})
        .then((data) => {
           router.navigate('/books');
         }
       )
    }
  }