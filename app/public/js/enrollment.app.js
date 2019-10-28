var EnrollmentApp = new Vue({
  el: '#EnrollmentApp',
  data: {
    enrollments: [],
    recordenrollments: {}
  },
  methods: {
    fetchEnrollments() {
      fetch('api/records/enrollment.php')
      .then(response => response.json())
      .then(json => { EnrollmentApp.enrollments = json})

    },

    handleSubmit(event) {
          fetch('api/records/enrollmentpost.php', {
            method: 'POST',
            body: JSON.stringify(this.recordenrollments),
            headers: {
              "Content-Type": "application/json; charset=utf-8"
            }
          })
          .then( response => response.json() )
          .then( json => {EnrollmentApp.enrollments.push(json[0])})
          .catch( err => {
            console.error('RECORD POST ERROR:');
            console.error(err);
          });
          this.handleReset();
        },

  handleReset() {
    this.recordenrollments = {
      enrollmentID: '',
      certificationID: '',
      memberID: '',
      certificationIsActive: '',
      certificationStartDate: '',
      certificationEndDate: ''
    }
  },
  handleRowClick(e) {
    editenrollment.recordenrollments = e;
  },

    deleteTransaction(e){
      fetch('api/records/enrollmentdelete.php', {
        method: 'POST',
        body: JSON.stringify(e),
        headers: {
          "Content-Type": "application/json; charset=utf-8"
        }
      })
      .then( response => response.json() )
      .then( json => {EnrollmentApp.enrollments = json})
    }
},
created() {
  this.handleReset();
  this.fetchEnrollments();
}
});
