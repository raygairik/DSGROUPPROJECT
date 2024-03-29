var EditmemberApp = new Vue({
  el: '#EditmemberApp',
  data: {
    recordMember: {}
  },
  methods: {
    handleEdit() {
      fetch('api/records/memberEdit.php',{
      method: 'POST',
      body: JSON.stringify(this.recordmember),
      headers: {
        "Content-Type": "application/json; charset=utf-8"
      }
    })
    .then( response => response.json() )
    .then( json => {MemberRecordsApp.recordMember = json});
    this.handleReset();
    },

    handleReset() {
    this.recordMember = {
      firstName: '',
      lastName: '',
      dob: '',
      Gender: '',
      Email: '',
      address: '',
      City: '',
      State: '',
      ZIPCode: '',
      workPhoneNumber: '',
      mobilePhoneNumber: '',
      departmentPosition: '',
      Radio: '',
      Station: '',
      isActive: ''
    }
  }
},
created() {
  this.handleReset();
}
});
