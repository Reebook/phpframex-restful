class PublisherController {

    static index() {
      fetch('/server/publisher',
       { headers: {'Accept': 'application/json'}})
        .then((response) => response.json())
        .then((data) => {
          return view('/views/Publisher/list.html',
           {'title':'Publisher List',
            'publishers':data},'content')();}
       )
    }
  
    static show(params) {
      fetch('/server/publisher/'+params.id,
        { headers: {'Accept': 'application/json'}})
        .then((response) => response.json())
        .then((data) => {
          return view('/views/Publisher/details.html',
            {'title':'Publisher Details',
             'publishers':data,'show':true},'content')();}
       )
    }
  
    static create() {
      var prof = {'name':'','degree':'',
            'email':'','phone':''};
      return view('/views/Publisher/details.html',
            {'title':'Publisher Create',
            'publishers':prof,'create':true},'content')();
    }
  
    static store() {
      var nam = Input.get('name');
      var degree = Input.get('degree');
      var email = Input.get('email');
      var phone = Input.get('phone');
      var prof = {'name':nam,'degree':degree,
              'email':email,'phone':phone};
      fetch('/server/publisher',
        { headers: {'Content-Type': 'application/json'},
          method: 'POST',
          body: JSON.stringify(prof)})
        .then((data) => {
           router.navigate('/publishers');
        }
      )
    }
  
    static edit(params) {
      fetch('/server/publisher/'+params.id,
        { headers: {'Accept': 'application/json'}})
        .then((response) => response.json())
        .then((data) => {
          return view('/views/Publisher/details.html',
            {'title':'Publisher Edit',
             'publishers':data,'edit':true},'content')();}
       )
    }
  
    static update(params) {
      var nam = Input.get('name');
      var degree = Input.get('degree');
      var email = Input.get('email');
      var phone = Input.get('phone');
      var prof = {'name':nam,'degree':degree,
                'email':email,'phone':phone};
      fetch('/server/publisher/'+params.id,
        { headers: {'Content-Type': 'application/json'},
          method: 'PUT',
          body: JSON.stringify(prof)})
        .then((data) => {
           router.navigate('/publishers');
         }
       )
    }
  
    static destroy(params) {
      fetch('/server/publisher/'+params.id,
        { method: 'DELETE'})
        .then((data) => {
           router.navigate('/publishers');
         }
       )
    }
  }