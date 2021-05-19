class AuthorController {

    static index() {      
      fetch('/server/author',
       { headers: {'Accept': 'application/json'}})
        .then((response) => response.json())
        .then((data) => {
          return view('/views/author/list.html',
           {'title':'Author List',
            'authors':data},'content')();}
       )
    }
  
    static show(params) {
      fetch('/server/author/'+params.id,
        { headers: {'Accept': 'application/json'}})
        .then((response) => response.json())
        .then((data) => {
          return view('/views/author/details.html',
            {'title':'Author Details',
             'authors':data,'show':true},'content')();}
       )
    }
  
    static create() {
      var prof = {'name':'','nationality':'',
            'birth':'','fields':''};
      return view('/views/author/details.html',
            {'title':'Author Create',
            'authors':prof,'create':true},'content')();
    }
  
    static store() {
      var nam = Input.get('name');
      var degree = Input.get('nationality');
      var email = Input.get('birth');
      var phone = Input.get('fields');
      var prof = {'name':nam,'nationality':degree,
              'birth':email,'fields':phone};
      fetch('/server/author',
        { headers: {'Content-Type': 'application/json'},
          method: 'POST',
          body: JSON.stringify(prof)})
        .then((data) => {
           router.navigate('/authors');
        }
      )
    }
  
    static edit(params) {
      fetch('/server/author/'+params.id,
        { headers: {'Accept': 'application/json'}})
        .then((response) => response.json())
        .then((data) => {
          return view('/views/author/details.html',
            {'title':'Author Edit',
             'authors':data,'edit':true},'content')();}
       )
    }
  
    static update(params) {
      var name = Input.get('name');
      var nationality = Input.get('nationality');
      var birth = Input.get('birth');
      var fields = Input.get('fields');
      var author = {'name':name,'nationality':nationality,
                'birth':birth,'fields':fields};
      fetch('/server/author/'+params.id,
        { headers: {'Content-Type': 'application/json'},
          method: 'PUT',
          body: JSON.stringify(author)})
        .then((data) => {
           router.navigate('/authors');
         }
       )
    }
  
    static destroy(params) {
      fetch('/server/author/'+params.id,
        { method: 'DELETE'})
        .then((data) => {
           router.navigate('/authors');
         }
       )
    }
  }