var EditmemberApp = new Vue({
  el: '#EditmemberApp',
  data: {
    recordmember: {}
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
    .then( json => {MemberRecordsApp.recordmember = json})
    this.handleReset();

    },

    handleReset() {
    this.recordmember = {
      //certificationID: '',
      // certifyingAgency: '',
      // certificationName: '',
      // expirationPeriod: ''
      firstName: '',
      lastName: '',
      dob: '',
      Gender: '',
      Email: '',
      Address: '',
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

}, // end methods
created() {
  this.handleReset();
}
});
