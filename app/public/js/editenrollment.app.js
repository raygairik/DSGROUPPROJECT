var editenrollment = new Vue({
  el: '#editenrollment',
  data: {
    recordenrollments: {}
  },
  methods: {
    handleEdit() {
      fetch('api/records/enrollmentedit.php',{
      method: 'POST',
      body: JSON.stringify(this.recordenrollments),
      headers: {
        "Content-Type": "application/json; charset=utf-8"
      }
    })
    .then( response => response.json() )
    .then( json => {EnrollmentApp.recordenrollments = json})
    this.handleReset();

    },

    handleReset() {
    this.recordenrollments = {
      //enrollmentID: '',
      certificationID: '',
      memberID: '',
      certificationIsActive: '',
      certificationStartDate: '',
      certificationEndDate: ''

    }
  }

}, // end methods
created() {
  this.handleReset();
}
});
