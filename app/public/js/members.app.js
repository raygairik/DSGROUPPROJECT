var MemberRecordsApp = new Vue({
  el: '#MemberRecordsApp',
  data: {
    member: {}
  },
  methods: {
    handleSubmit() {
      fetch('api/waiting/post.php', {
        method: 'POST',
        body: JSON.stringify(this.member),
        headers: {
          "Content-Type": "application/json; charset=utf-8"
        }
      })
      .then( response => response.json() )
      .then( json => {waitingApp.patients = json})
      .catch( err => {
        console.error('TRIAGE POST ERROR:');
        console.error(err);
      })

      this.handleReset();
    },
    handleReset() {
      this.patient = {
        memberId: '',
        firstName: '',
        lastName: '',
        dob: '',
        sexAtBirth: '',
        visitDescription: '',
        // visitDateUtc
        priority: 'low'
      }
    }
  },
  created() {
    this.handleReset();
  }
});
