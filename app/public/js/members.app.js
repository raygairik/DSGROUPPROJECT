var MemberRecordsApp = new Vue({
  el: '#MemberRecordsApp',
  data: {
    members: [],
    recordMember: {}
  },
  methods: {
    fetchMembers() {
      fetch('api/records/member.php')
      .then(response => response.json())
      .then(json => { MemberRecordsApp.members = json})

    },

    handleSubmit(event) {
          fetch('api/records/memberpost.php', {
            method: 'POST',
            body: JSON.stringify(this.recordMember),
            headers: {
              "Content-Type": "application/json; charset=utf-8"
            }
          })
          .then( response => response.json() )
          .then( json => {MemberRecordsApp.members.push( json[0] )})
          .catch( err => {
            console.error('RECORD POST ERROR:');
            console.error(err);
          });
          this.handleReset();
        },
  handleReset() {
    this.recordMember = {
      memberID: '',
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
  },
  handleRowClick(members) {
    EditmemberApp.recordMember = Member;
  },
  deleteTransaction(m){
    fetch('api/records/memberDelete.php', {
      method: 'POST',
      body: JSON.stringify(m),
      headers: {
        "Content-Type": "application/json; charset=utf-8"
      }
    })
    .then( response => response.json() )
    .then( json => {MemberRecordsApp.members = json})
  }

}, // end methods
created() {
  this.handleReset();
  this.fetchMembers();
}
});
